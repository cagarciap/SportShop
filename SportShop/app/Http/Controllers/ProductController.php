<?php 

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{

    public function list()
    {
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        return view("product.list")->with("data",$data);

    }


    public function show($id)
    {
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["product"] = $product;
        return view('product.show')->with("data",$data);
    }
}