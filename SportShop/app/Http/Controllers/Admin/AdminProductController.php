<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\ImageStorage;


class AdminProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                return redirect()->route('home.index');
            }
            return $next($request);
        });
    }

    public function routes(){
        return [
            ["route" => "admin.product.create", "title" => __('Product.menu.create')],
            ["route" => "admin.product.list", "title" => __('Product.menu.list')]
        ];
    }

    public function list()
    {
        $data = [];
        $data["title"] = __('Product.title_list');
        $data["products"] = Product::all();
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('Product.menu.title');
        return view("admin.product.list")->with("data",$data);
    }

    public function menu()
    {
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('Product.menu.title');
        return view('admin.menu')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["categories"] = Category::all();
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('Product.menu.title');
        return view('admin.product.create')->with("data",$data);
    }

    public function save(Request $request){
        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
        }
        Product::validate($request);
        $product = new Product();
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setQuantity($request->input('quantity'));
        $product->setPrice($request->input('price'));
        $product->setSize($request->input('size'));
        $product->setImage($nameImage);
        $product->setCategoryId($request->input('category'));
        $product->save();
        return back()->with('success',__('Product.success_create'));
    }

    public function show($id)
    {
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = __('Product.info');
        $data["product"] = $product;
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('Product.menu.title');
        return view('admin.product.show')->with("data",$data);
    }

    public function update_form($id)
    {
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $categories = Category::all();
        $data = [];
        $data["title"] = $product->getName();
        $data["product"] = $product;
        $data["categories"] = $categories;
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('Product.menu.title');
        return view('admin.product.update')->with("data",$data);
    }

    public function update(Request $request)
    {
        $product = Product::find($request->input('id'));
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setQuantity($request->input('quantity'));
        $product->setPrice($request->input('price'));
        $product->setSize($request->input('size'));
        $product->setCategoryId($request->input('category'));
        $old_image_name = $request->input('image_name');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
            $product->setImage($nameImage);
            unlink(public_path()."/img/".$old_image_name);
        }else{
            $product->setImage($old_image_name);
        }

        $product->save();
        return redirect()->route('admin.product.list');
    }

    public function delete($id)
    {
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $nameImage = $product->getImage();
        unlink(public_path()."/img/".$nameImage);
        $product->delete();
        return redirect()->route('admin.product.list');
    }
}

