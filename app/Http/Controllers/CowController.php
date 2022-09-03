<?php

namespace App\Http\Controllers;

use App\Models\Cow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CowController extends Controller
{

function __construct(){
$this->middleware('auth');
}


public function index()
{
$cows=Cow::where('user_id',Auth::user()->id)->get();
return view('/cows/index',compact('cows'));

}

public function createCow()
{
$cows= new Cow();
//$cows= Cow::select('id','cowType','color','age','milk','milk_days','milk_total','mark')->get();
return view('cows.create',compact('cows'));


}

public function storeCow(Request $request)
{
$request->validate([
'cowType'=>'required',
'color'=>'required',
'age'=>'required',
'milk'=>'required',
'milk_days'=>'required',
'milk_total'=>'required',
'mark'=>'required'
]);
$cows= new Cow();
$cows->cowType=$request->cowType;
$cows->color=$request->color;
$cows->age=$request->age;
$cows->milk=$request->milk;
$cows->milk_days=$request->milk_days;
$cows->milk_total=$request->milk_total;
$cows->user_id = Auth::user()->id;
$cows->mark=$request->mark;
$cows->save();
Session::flash('success','data added');
return redirect('/cows/index');

}

public function editCow($id=null)
{
$editCow= Cow::find($id);
return view('cows.edit',compact('editCow'));
}

public function updateCow(Request $request,$id)
{
$request->validate([
'cowType'=>'required',
'color'=>'required',
'age'=>'required',
'milk'=>'required',
'milk_days'=>'required',
'milk_total'=>'required',
'mark'=>'required'
]);
$cows= Cow::find($id);
$cows->cowType=$request->cowType;
$cows->color=$request->color;
$cows->age=$request->age;
$cows->milk=$request->milk;
$cows->milk_days=$request->milk_days;
$cows->milk_total=$request->milk_total;
$cows->user_id = Auth::user()->id;
$cows->mark=$request->mark;
$cows->save();
Session::flash('success','data update');
return redirect('/cows/index');
}
public function deleteCow($id)
{
$deleteCow= Cow::find($id);
$deleteCow->delete();
Session::flash('success','data delete');
return redirect('/cows/index');
}
}
