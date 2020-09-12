<?php 

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AdminCategoryController extends Controller
{
    protected $routes = [];

    public function __construct()
    {
        $this->routes = [
            ["route" => "admin.category.create", "title" => "Create Category"],
            ["route" => "admin.category.list", "title" => "Category List"]
        ];
    }

    public function menu()
    {
        $data = [];
        $data["routes"] = $this->routes;
        return view('admin.menu')->with("data",$data);
    }

    public function list()
    {
        $data = []; 
        $data["title"] = "List of categories";
        $data["categories"] = Category::all();
        $data["routes"] = $this->routes;
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
        $data["routes"] = $this->routes;
        return view('admin.category.show')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Create Category";
        $data["routes"] = $this->routes;
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