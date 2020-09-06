<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminCategoryController extends Controller
{

    public function menu()
    {
        return view('util.category.menu');
    }

    public function list()
    {
        $data = []; 
        $data["title"] = "List of categories";
        $data["categories"] = Category::all();
        return view('admin.category.list')->with("data",$data);
    }

    public function show($id)
    {
        try{
            $category = Category::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["category"] = $category;
        return view('admin.category.show')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Create Category";
        return view('admin.category.create')->with("data",$data);
    }

    public function save(Request $request)
    {
        Category::validate($request);
        Category::create($request->only(["name","description"]));
        return back()->with('success','Item created successfully!');
    }

 
    
    public function delete($id)
    {
        try{
            $category = Category::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $category->delete();
        return redirect('/admin/category/list');

    }
}