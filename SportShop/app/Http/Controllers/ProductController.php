<?php 

namespace App\Http\Controllers;
use App\Product;
use App\Item;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{

    public function list()
    {
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        return view("client.list")->with("data",$data);
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
            return view("client.show_cart")->with("data",$data);
        }
    }

    public function show($id,$status=False){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = "Product Information";
        $data["product"] = $product;
        if ($status==True){
            $data["status"] = True;
        }else{
            $data["status"] = False;
        }
        return view('client.show')->with("data",$data);
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

    public function buy(){
        //$rejectedProducts = [];
        //$data = [];
        $sale = new Sale();
        $sale->setDate(date('Y-m-d'));
        $sale->setTotal_to_pay(0);
        $sale->setUserId("cesar");
        $sale->save();
        $total = 0;
        $cart = session()->get("products");
        $products_id = array_keys($cart);
        for ($i = 0; $i < count($products_id); $i++){
            $quantity = $cart[$products_id[$i]];
            $product = Product::find($products_id[$i]);
            $price = $product->getPrice();
            $productQuantity = $product->getQuantity();
            if ($quantity > $productQuantity){
                break;
                //array_push($rejectedProducts,$product->getId());
            }else{
                $item = new Item();
                $item->setQuantity($quantity); 
                $totalProduct = $price*$quantity;
                $total = $total+$totalProduct;
                $item->setTotal($totalProduct);
                $item->setProductId($products_id[$i]);
                $item->setSaleId($sale->getId());
                $item->save();
                $product->setQuantity($productQuantity-$quantity);
                $product->save();
            }
            
        }
        $sale->setTotal_to_pay($total);
        $sale->save();

        if (count($rejectedProducts) != 0){
        }

        /*$mess = session()->get("success");
        $mess = "Your purchase was successful";
        session()->put("success",$mess);
        $mess = session()->get("success");*/
        $cart = session()->forget('products');
        return redirect()->route('client.list');
    }

}