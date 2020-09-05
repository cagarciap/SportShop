<?php 

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
	/*public function create(){
		return view('product.create');
	}

    public function save(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "quantity" => "required|numeric",
            "price" => "required|numeric|gt:0",
            "size" => "",
            "image" => "required"
        ]);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
        }
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');
        $product->size = $request->input('size');
        $product->image = $nameImage;
        $product->save();

        //Product::create($request->only(["name","description","quantity","price", "size"]));

        return back()->with('success','Item created successfully!');
        //return back();
    }
*/
    //--------------------------------------------------------------------------------------
    // CONTROLADORES SEPARADOS!!!!!!!!!
    /*public function list(){
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();

        //Range list
        //$data["first_products"] = Product::all()->skip(0)->take(2);
        //$data["second_products"] = Product::all()->skip(2);
        //return view("product.list")->with("data",$data)->with('success','Item created successfully!');
        return view("product.list")->with("data",$data);

    }*/

    public function list(){
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        //Range list
        //$data["products"] = Product::all()->skip(0)->take(2);
        //$data["second_products"] = Product::all()->skip(2);
        //return view("product.list")->with("data",$data)->with('success','Item created successfully!');
        return view("product.list")->with("data",$data);

    }

    //--------------------------------------------------------------------------------------

    public function show($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["product"] = $product;
        /*$data["title"] = $product->getName();
        $data["id"] = $id;
        $data["name"] = $product->getName();
        $data["description"] = $product->getDescription();
        $data["quantity"] = $product->getQuantity();
        $data["price"] = $product->getPrice();
        $data["size"] = $product->getSize();
        $data["image"] = $product->getImage();*/
        return view('product.show')->with("data",$data);
    }

    /*
    public function update_form($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        // enviar $product
        // 
        // // reglas: si se envian datos a una vista se debe enviar por un arreglo .. ejemplo 
        $data = [];
        $data["title"] = $product->getName();
        $data["product"] = $product;
        //$data["id"] = $id;
        //$data["name"] = $product->getName();
        //$data["description"] = $product->getDescription();
        //$data["quantity"] = $product->getQuantity();
        //$data["price"] = $product->getPrice();
        //$data["size"] = $product->getSize();
        //$data["image"] = $product->getImage();
        return view('product.update')->with("data",$data);
    }

    public function update(Request $request,$id){
        $request->validate([
            "name" => "required",
            "description" => "required",
            "quantity" => "required|numeric",
            "price" => "required|numeric|gt:0",
            "size" => "",
        ]); // Modelo

        // metodo update
        $product = Product::find($id);
        $product->setName($request->input('name'));
        $product->setDescription($request->input('description'));
        $product->setQuantity($request->input('quantity'));
        $product->setPrice($request->input('price'));
        $product->setSize($request->input('size'));
        //$product->update(['description' => $request->input('description')]);
        //$product->update(['quantity' => $request->input('quantity')]);
        //$product->update(['price' => $request->input('price')]);
        //$product->update(['size' => $request->input('size')]); 

        if($request->hasFile('image')){
            $file = $request->file('image');
            $nameImage = time().$file->getClientOriginalName();
            $file->move(public_path().'/img/',$nameImage);
            //$product->update(['image' => $nameImage]); 
            $product->setImage($nameImage);
        }else{
            $product->setImage($request->input('image_name'));
            //$product->update(['image' => $request->input('image_name')]);
        }
        
        $product->save();
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        return view("product.list")->with("data",$data);
    }

    public function delete($id){
        try{
            $product = Product::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        //$product = Product::find($id);
        $product->delete();
        $data = [];
        $data["title"] = "List of products";
        $data["products"] = Product::all();
        //$data["first_products"] = Product::all()->skip(0)->take(2);
        //$data["second_products"] = Product::all()->skip(2);
        //return view('product.list')->with('data',$data)->with('success','Item deleted successfully!');
        return view('product.list')->with('data', $data);


    }*/
}