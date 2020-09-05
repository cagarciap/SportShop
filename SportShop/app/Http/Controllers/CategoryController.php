<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function list()
    {
        $data = []; //to be sent to the view
        $data["first_categories"] = Category::all()->slice(0)->take(2);
        $data["second_categories"] = Category::all()->slice(2);
        return view('category.list')->with("data",$data);
    }

    public function show($id){
        try{
        $category = Category::findOrFail($id);
        }catch(ModelNotFoundException $e){
        return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = $category->getName();
        $data["id"] = $id;
        $data["name"] = $category->getName();
        $data["description"] = $category->getDescription();
        return view('category.show')->with("data",$data);
    }

    public function create()
    {
        $data = []; //to be sent to the view
        $data["title"] = "Create Category";
        

        return view('category.create')->with("data",$data);
    }

    public function save(Request $request){
        $request->validate([
            "name" => "required",
            "description" => "required"

        ]);

        Category::create($request->only(["name","description"]));
        return back()->with('success','Item created successfully!');
    }

 
    
    public function delete($id){
        try{
            $category = Category::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $category = Category::find($id);
        $category->delete();
        return redirect('/category/list');

}

}
