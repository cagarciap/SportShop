<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Http;

class ProductController extends Controller
{

    public function list(Request $request)
    {
        $json_call = Http::get('http://api.openweathermap.org/data/2.5/weather?id=3674962&appid=b7a3324cc69cfcab437687bea7cd0c3a');
        $weather = $json_call->json();
        $temp = $weather['main']['temp'];
        $temp = $temp - 273.15 + 6;
        $data = [];
        $categories = Category::all();
        $data["title"] = __('Product.title_list');
        $data["categories"] = $categories;
        $data["temperature"] = $temp;
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
        return view("user.product.list")->with("data",$data);
        
    }

    public function show($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = __('Product.info');
        $data["product"] = $product;
        return view('user.product.show')->with("data",$data);
    }
}




