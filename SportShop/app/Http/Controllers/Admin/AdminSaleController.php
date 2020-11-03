<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Sale;
use App\Item;
use App\Category;
use App\Exports\SalesExport;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminSaleController extends Controller
{
    protected $routes = [];
    protected $nameMenu = "Sales Controller";

    public function __construct()
    {
        $this->routes = [
            ["route" => "admin.sale.list", "title" => __('Sale.title')],
        ];
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if(Auth::user()->getRole()=="client"){
                return redirect()->route('home.index');
            }

            return $next($request);
        });
    }

    public function list()
    {
        $data = [];
        $data["title"] = __('Sale.title');
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        return view("admin.sale.dateForm")->with("data",$data);
    }

    public function menu()
    {
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        return view('admin.menu')->with("data",$data);
    }

    public function query1(Request $request)
    {
        $startDate=$request->input('startDate');
        $endDate=$request->input('endDate');
        $data = [];
        $data["title"] = __('Sale.title');
        $sales = Sale::all()->where('date','>=',$startDate)->where('date','<=',$endDate);
        $data["sales"] = $sales;
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        return view("admin.sale.list")->with("data",$data);
    }

    public function show($id)
    {
        $data = [];
        $data["routes"] = $this->routes;
        $data["nameMenu"] = $this->nameMenu;
        $items = Item::all()->whereIn('sale_id',$id);
        $data["items"] = $items;
        return view('admin.sale.show')->with("data",$data);
    }

    public function export()
    {
        return Excel::download(new SalesExport, 'sales.xlsx');
    }
}
