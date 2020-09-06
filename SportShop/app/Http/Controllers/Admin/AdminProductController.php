<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;


class AdminProductController extends Controller
{
    public function list(){
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        return view("admin.product.list")->with("data",$data);
    }

    public function menu(){
        return view('util.product.menu');
    }

    public function create(){
        return view('admin.product.create');
    }

    public function save(Request $request){
        /*$request->validate([
            "name" => "required",
            "description" => "required",
            "quantity" => "required|numeric",
            "price" => "required|numeric|gt:0",
            "size" => "",
            "image" => "required"
        ]);*/

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
        }
        $product = new Product();
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setQuantity($request->input('quantity'));
        $product->setPrice($request->input('price'));
        $product->setSize($request->input('size'));
        $product->setImage($nameImage);
        $product->save();
        return back()->with('success','Item created successfully!');
    }

    public function show($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = "Product Information";
        $data["product"] = $product;
        return view('admin.product.show')->with("data",$data);
    }

    public function update_form($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = $product->getName();
        $data["product"] = $product;
        return view('admin.product.update')->with("data",$data);
    }

    public function update(Request $request){
        $product = Product::find($request->input('id'));
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setQuantity($request->input('quantity'));
        $product->setPrice($request->input('price'));
        $product->setSize($request->input('size'));
        $old_image_name = $request->input('image_name');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
            $product->setImage($nameImage);
            $old_name=public_path().'/img/'.$old_image_name;
            File::delete($old_name);
        }else{
            $product->setImage($old_image_name);
        }
        
        $product->save();
        return redirect()->route('admin.product.list');
    }

    public function delete($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $product->delete();
        return redirect()->route('admin.product.list');
    }
}
