<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use Symfony\Contracts\Service\Attribute\Required;

class PatientController extends Controller
{
    public function index (){
        $patients = Patient::all();
        return $patients;
    }

    //el Request es el objeto que recibimos (Json) $request = {"name": Jorge, "age":32}
    public function store (Request $request){
      //Laravel 8 o menor 
      /*  $patient = new Patient();
       $patient->name = $request->name;
       $patient->age = $request->age;
       $patient->num_afi = $request->num_afi;
       $patient->adress =$request->adress;

       $patient->save();
       */

//Eloquent

    
       $patient = Patient::create($request->all());
       return response()->json($patient, 201);
    }

    public function update(Request $request, string $id){

       //Laravel 8 o menor 
       /*  $patient = Patient::findOrFail($id);
       $patient->name = $request->name;
       $patient->age = $request->age;
       $patient->num_afi = $request->num_afi;
       $patient->adress =$request->adress;

       $patient->save();
       */

//Eloquent


      $patient = Patient::findOrFail($id);
      $patient->update($request->all());
      return response()->json($patient, 200);
    }


}
