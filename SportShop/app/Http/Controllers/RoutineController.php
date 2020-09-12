<?php

namespace App\Http\Controllers;
use App\Routine;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Exception;

class RoutineController extends Controller
{


    public function menu()
    {
      return view('util.user.routine.menu');
    }


    public function list()
    {
        $data = []; //to be sent to the view
        $data["title"] = "List Routines";
        $data["routines"] = Routine::all();

        return view('user.routine.list')->with("data",$data);
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
        return view('user.routine.show')->with("data",$data);
    }

    public function recommend()
    {
      return view('user.routine.recommend');
    }

    public function calculate(Request $request)
    {
        Routine::validateBMI($request);
        $weight = doubleval($request->input('weight'));
        $height = doubleval($request->input('height'))/100; 
        $bodyMI = $weight/($height*$height);
        $data =[];
        $data['bodyMI'] = $bodyMI;
        $stateBody="";

        switch ($bodyMI) {
        	case ($bodyMI<=15.9):
        		$stateBody = "Very severe thinness";
        		break;
        	case ($bodyMI>=16.0 && $bodyMI<=18.4):
        		$stateBody = "Thinness";
        		break;
        	case ($bodyMI>=18.5 && $bodyMI<=24.9):
        		$stateBody = "Healthy weight";
        		break;
        	case ($bodyMI>=25.0 && $bodyMI<=29.9):
        		$stateBody = "Overweight";
        		break;
            case ($bodyMI>=30.0):
        		$stateBody = "Obesity";
        		break;
        }
        
        $data['stateBody'] = $stateBody;
        $routine = Routine::where('minMasa','<=',$bodyMI)->where('maxMasa','>=',$bodyMI)->first();

        if($routine != null)
        {
        	$data['bmiRoutine'] = $routine;
            return view('user.routine.calculate')->with("data",$data);
        }else{
        	 return view('user.routine.notFounded');
        }
       
    }

}