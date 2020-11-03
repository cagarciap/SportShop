<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Category;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class AdminCategoryController extends Controller
{
    protected $routes = [];

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
            ["route" => "admin.category.create", "title" => __('category.title.create')],
            ["route" => "admin.category.list", "title" => __('category.title.list')],
        ];
    }

    public function menu()
    {
        $data = [];
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('category.title.controller');
        return view('admin.menu')->with("data",$data);
    }

    public function list()
    {
        $category = Category::all();
        $data = [];
        $data["title"] = "List of categories";
        $data["categories"] = $category;
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('category.title.controller');
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
        $data["routes"] = $this->routes();
        $data["nameMenu"] =__('category.title.controller');
        return view('admin.category.show')->with("data",$data);
    }

    public function create()
    {
        $data = [];
        $data["title"] = "Create Category";
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('category.title.controller');
        return view('admin.category.create')->with("data",$data);
    }

    public function save(Request $request)
    {
        Category::validate($request);
        Category::create($request->only(["name","description"]));
        return back()->with('success',__('category.holder.success'));
    }

    public function update_form($id)
    {
        try{
            $category = Category::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = $category->getName();
        $data["category"] = $category;
        $data["routes"] = $this->routes();
        $data["nameMenu"] = __('category.title.controller');
        return view('admin.category.update')->with("data",$data);
    }

    public function update(Request $request)
    {
        $category = Category::find($request->input('id'));
        $category->setName($request->input('name'));
        $category->setDescription($request->input('description'));
        $category->save();
        return redirect()->route('admin.category.list');
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
