<?php

namespace App\Http\Controllers;

use App\Models\PhoneBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Storage;

class PhoneBookController extends Controller
{
public function index()
{
$phones=PhoneBook::latest('name','phone_number_one','email','image','description')->get();
return view('phone.index',compact('phones'));
}


public function create(){
return view('phone.create');
} 

public function store(Request $request)
{
$request->validate([
'name'=>'required',
'phone_number_one'=>'required',
'email'=>'nullable',
'image'=>'nullable',
'description'=>'nullable'

]);

if($request->file('image')){
    $completeImageName = $request->file('image')->getClientOriginalName(); //full image name
    $fileNameOnly=pathinfo($completeImageName,PATHINFO_FILENAME);
    $image_name = str_replace(' ','_',$fileNameOnly);
    $file_extension = $request->file('image')->getClientOriginalExtension(); 
    $modified_image_name = $image_name.'-'.time().'.'.$file_extension;
    $path=$request->file('image')->storeAs('public/phone-user', $modified_image_name);
    $path = Storage::url($path);
}
else{
    $path ='';
}

$phones = new PhoneBook();
$phones->name=$request->name;
$phones->phone_number_one=$request->phone_number_one;
$phones->email=$request->email;
$phones->image=$path;
$phones->description=$request->description;
$phones->save();
Session::flash('success','Data stored successfully');
return redirect('/phone/index');

}

public function editPhone($id=null)
{
    $editphone= PhoneBook::find($id);
    return view('phone.edit-phone',compact('editphone'));
  
}


public function updatePhone(Request $request,$id)
{
$request->validate([
'name'=>'required',
'phone_number_one'=>'required',
'email'=>'nullable',
'image'=>'nullable',
'description'=>'nullable'

]);

$phones =  PhoneBook::find($id);
$phones->name=$request->name;
$phones->phone_number_one=$request->phone_number_one;
$phones->email=$request->email;
$phones->image=$request->image;
$phones->description=$request->description;
$phones->save();
Session::flash('success','Data update successfully');
return redirect('/phone/index');

}

public function deletePhone($id = null)
{
   $deletephone=PhoneBook::find($id);
   $deletephone->delete();
  Session::flash('msg','Data delete successfully');
        return redirect('/phone/index');
}

}
