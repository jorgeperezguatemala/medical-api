<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Appoint;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointController extends Controller
{
    public function index (){
        $appoints = Appoint::all();
        return $appoints;
    }

    
    public function store (Request $request){
       $appoints = Appoint::create($request->all());
       return response()->json($appoints, 201);
    }

    public function update(Request $request, string $id){
        $appoints = Appoint::findOrFail($id);
        $appoints->update($request->all());
        return response()->json($appoints, 200);
    }

    public function showAll(){
        $appoints = Patient::with('Appoint')->get();
        return $appoints;
    }

    
    }

