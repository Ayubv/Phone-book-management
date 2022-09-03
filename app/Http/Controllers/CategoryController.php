<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{

public function index()
{
$catagory=new Category();
$catagory=Category::all();
return view('catagory.index',compact('catagory'));
}

public function create()
{
return view('catagory.create');

}

public function store(Request $request)
{

$request->validate([
'name' => 'required',
'type' => 'required',
'description' => 'required',
]);
$catagory=new Category();
$catagory->name=$request->name;
$catagory->type=$request->type;
$catagory->description=$request->description;
$catagory->save();
Session::flash('success', 'Task successfully added!');
return redirect('catagory/index');
}
public function editCategory($id =null)
{
$catagory=Category::find($id);
return view('catagory.edit',compact('catagory'));
}

public function updateCatagory(Request $request,$id)
{

$ruls=[
'name' => 'required',
'type' => 'required',
'description' => 'required'

];

$message=[
'name.required'=>'Enter your name',
'type.required'=>'Must be type',
'description.required'=>'Description must be 100 characters'


];
$request->validate($ruls,$message);
$catagory= Category::find($id);
$catagory->name=$request->name;
$catagory->type=$request->type;
$catagory->description=$request->description;
$catagory->save();
Session::flash('msg','Data update successfully');
Session::save();
return redirect()->back();
//return redirect('catagory/index');


}


public function categoryDelete($id = null)
{
$deleteCategory= Category::find($id);
$deleteCategory->delete();
Session::flash('msg','Data delete successfully');
return redirect('catagory/index');
}



}
