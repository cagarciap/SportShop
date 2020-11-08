<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\Item;
use App\Sale;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
//use App\Interfaces\Bill;
use App\Interfaces\BillWay;
use PDF;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()==null){
                $cart = session()->forget('products');
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function add_cart($id)
    {
        $cart = session()->get("products");
        if ($cart == null){
            $cart[$id] = 1;
        }elseif(!array_key_exists($id,$cart)){
            $cart[$id] = 1;
        }else{
            $cart[$id] = $cart[$id]+1;
        }
        session()->put("products",$cart);
        return redirect()->route('client.list');
    }

    public function show_cart()
    {
        $data = [];
        $cart = session()->get("products");
        if ($cart != null){
            $products_id = array_keys($cart);
            $products = Product::whereIn('id',$products_id)->get();
            foreach ($products as $product) {
                $product->setQuantity($cart[$product->getId()]);
            }
            $data["products"] = $products;  
        }else{
            $data["products"] = null;
        }
        return view("user.product.show_cart")->with("data",$data);
        
    }

    public function delete($id){
        $cart = session()->get("products");
        unset($cart[$id]);
        session()->put("products",$cart);
        return redirect()->route('client.show_cart');
    }

    public function modify_quantity(Request $request,$id){
        $cart = session()->get("products");
        $cart[$id] = $request->input('quantity');
        session()->put("products",$cart);
        return redirect()->route('client.show_cart');
    }

    public function buy($credits){
        $sale = new Sale();
        $sale->setDate(date('Y-m-d'));
        $sale->setTotal_to_pay(0);
        $sale->setUserId(Auth::user()->getId());
        $sale->save();
        $total = 0;
        $check = False;
        $checkStock = False;
        $cart = session()->get("products");
        $products_id = array_keys($cart);
        for ($i = 0; $i < count($products_id); $i++){
            $quantity = $cart[$products_id[$i]];
            $product = Product::find($products_id[$i]);
            $productQuantity = $product->getQuantity();
            if ($productQuantity <= 0){
                $checkStock = True;
                unset($cart[$products_id[$i]]);
            }elseif($quantity > $productQuantity){
                $check = True;
                $cart[$products_id[$i]] = $productQuantity;
            }
            session()->put("products",$cart);
            $carrito = session()->get("products");
            if ($check == True){
                $sale->delete();
                return redirect()->route('client.show_cart');
            }elseif ($checkStock == True){
                $sale->delete();
                $mess = __('Sale.outStock', ['product' => $product->getName()]);
                return redirect()->route('client.list')->with('success',$mess);
            }else{
                $item = new Item();
                $item->setQuantity($quantity);
                $totalProduct = $product->getPrice()*$quantity;
                $total = $total+$totalProduct;
                $item->setTotal($totalProduct);
                $item->setProductId($products_id[$i]);
                $item->setSaleId($sale->getId());
                $item->save();
                if ($productQuantity-$quantity < 0){
                    $product->setQuantity(0);
                }else{
                    $product->setQuantity($productQuantity-$quantity);
                }
                $product->save();
            }
        }
        if($total != 0){
            if($credits == "True"){
                $descuento = (5*$total)/100;
                $total = $total - $descuento;
                $sale->setTotal_to_pay($total);
                $subtract_credit = Auth::user()->getCredit()-20;
                if ($subtract_credit < 0){
                    $subtract_credit = 0;
                }
                Auth::user()->setCredit($subtract_credit);
            }else{
                $sale->setTotal_to_pay($total);
            }
            $sale->save();
            //$cart = session()->forget('products');
            if($total > 1000){
                Auth::user()->setCredit((Auth::user()->getCredit())+5);
            }
            Auth::user()->save();
            $mess = __('Sale.success', ['total' => $total]);
            $arrayBill = [$sale->getId(),$sale->getDate(),$total,Auth::user()->getName()];
            $billSession = session()->get("bill");
            $billSession[0] = $arrayBill;
            session()->put("bill",$billSession);
            $billSessionId = session()->get("idBill");
            $billSessionId[0] = $sale->getId();
            session()->put("idBill",$billSessionId);
            return view("user.product.download")->with('success',$mess);
            //return redirect()->route('client.list')->with('success',$mess);
        }else{
            $sale->delete();
            return redirect()->route('client.show_cart');
        }
    }

    public function bill(Request $request){
        $bill = $request->input('billWay');
        $billWayInterface = app()->makeWith(BillWay::class, ['arrayBill' => $bill]);
        $arrayBill = session()->get("bill");
        return $billWayInterface->store($arrayBill);
    }

    public function delete_cart()
    {
        $cart = session()->forget('products');
        return redirect()->route('client.list');
    }
}




