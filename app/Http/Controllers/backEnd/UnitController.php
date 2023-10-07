<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use App\Models\backEnd\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    //Unit
    public function Unit(){
        $unit = Unit::latest()->get();
        return view('backEnd.unit.unit',compact('unit'));
    }
    //addUnit
    public function addUnit(){
        return view('backEnd.unit.add-unit');
    }
    //saveUnit
    public function saveUnit(Request $request){
        $request->validate([
            'unit_name'=>'required'
         ]);
        $unit = new Unit();
        $unit->unit_name = $request->unit_name;
        $unit->save();
        $unit = array(
            'message'=>'Unit Create Successfully',
            'alert-type'=>'success'
        );
        return redirect('/unit')->with($unit);
    }
    //editUnit
    public function editUnit($id){
        $unit = Unit::find($id);
        return view('backEnd.unit.edit-unit',compact('unit'));
    }
    //updateUnit
    public function updateUnit(Request $request){
        $request->validate([
           'unit_name'=>'required'
        ]);
        $unit = Unit::find($request->unit_id);
        $unit->unit_name = $request->unit_name;
        $unit->save();
        $unit = array(
            'message'=>'Unit updated Successfully',
            'alert-type'=>'success'
        );
        return redirect('/unit')->with($unit);
    }
    //deleteUnit
    public function deleteUnit($id){
        $unit = Unit::find($id);
        $unit->delete();
        $unit = array(
            'message'=>'Unit Deleted Successfully',
            'alert-type'=>'success'
        );
        return back()->with($unit);
    }
}
