<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class AdminRoutineController extends Controller
{

    protected $routes = [];
    protected $nameMenu = "Routine Controller";


    public function __construct()
    {
        $this->routes = [
            ["route" => "admin.routine.create", "title" => "Create Routine"],
            ["route" => "admin.routine.list", "title" => "List Routine"]
        ];
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

    public function menu()
    {
      $data = [];
      $data["routes"] = $this->routes;
      $data["nameMenu"] = $this->nameMenu;
      return view('admin.menu')->with("data",$data);
    }

    public function create()
    {
      $data = []; //to be sent to the view
      $data["title"] = "Create Routine";
      $data["routes"] = $this->routes;
      $data["nameMenu"] = $this->nameMenu;
      return view('admin.routine.create')->with("data",$data);
    }

    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "List Routines";
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        $data["routines"] = Routine::all();

        return view('admin.routine.list')->with("data",$data);
    }

    public function save(Request $request)
    {
      Routine::validate($request);
      Routine::create($request->only(["name","description","minMasa","maxMasa"]));

      return back()->with('success','item created successfully!');
    }

    public function show($id)
    {
      
      try{
            $routine = Routine::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["routine"] = $routine;
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        return view('admin.routine.show')->with("data",$data);
    }

    public function update_form($id)
    {
        try{
            $routine = Routine::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $data = [];
        $data["title"] = $routine->getName();
        $data["routine"] = $routine;
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        return view('admin.routine.update')->with("data",$data);
    }
    
    public function update(Request $request)
    {
        $routine = Routine::find($request->input('id'));
        $routine->setName($request->input('name'));
        $routine->setDescription($request->input('description'));
        $routine->setMinMasa($request->input('minMasa'));
        $routine->setMaxMasa($request->input('maxMasa'));
        $routine->save();
        return redirect()->route('admin.routine.list');
    }

    public function delete($id)
    {
       try{
            $routine = Routine::findOrFail($id);
        }catch(ModelNotFoundException $e){
            return redirect()->route('home.index');
        }
        $routine->delete();
        return redirect('/admin/routine/list');
    }
}
