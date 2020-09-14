<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{

    public function list(Request $request)
    {
        $data = [];
        $categories = Category::all();
        $data["title"] = "List of products";
        $data["categories"] = $categories;
        $category_selected = $request->input('category');
        if($category_selected != null){
            if ($category_selected == "all"){
                $data["products"] = Product::all();
            }else{
                $data["products"] = Product::all()->whereIn('category_id',$category_selected);
            }
        }else{
            $data["products"] = Product::all();
        }
        return view("user.list")->with("data",$data);
        
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
        return view('user.show')->with("data",$data);
    }
}




