<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AlliedResource;
use App\Http\Resources\AlliedCollection;
use Illuminate\Database\Eloquent\Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Http;

class AllyController extends Controller
{

    public function menu()
    {
      return view('user.ally.menu');
    }

    public function list()
    { 
        $json_call = Http::get('http://xpn-games.tk/public/api/videogames');
        $videogames = $json_call->json();
        $datos = $videogames["data"];
        $productos = [];
        for($i = 0;$i<count($datos);$i++){
            $arreglo =[];
            array_push($arreglo, $datos[$i]["id"]);
            array_push($arreglo, $datos[$i]["title"]);
            array_push($arreglo, $datos[$i]["category"]);
            array_push($arreglo, $datos[$i]["details"]);
            array_push($arreglo, $datos[$i]["price"]);
            array_push($productos, $arreglo);
        }
        $data = []; //to be sent to the view
        $data["title"] = __('ally.list');
        $data["allies"] = $productos;
        return view('user.ally.list')->with("data",$data);
    }
    

}
