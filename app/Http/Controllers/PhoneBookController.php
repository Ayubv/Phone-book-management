<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PhoneBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Client\Request as ClientRequest;

class PhoneBookController extends Controller
{
    


public function index()
{
 
  
$phones=PhoneBook::where('user_id',Auth::user()->id)
->latest('name','phone_number_one','email','image','description')->get();
return view('phone.index',compact('phones'));

}

public function profile()
{

    $phones=PhoneBook::select(
        "users.id", 
        "users.name",
        "users.username",
        "users.email", 
        "users.division", 
        "users.district", 
        "users.upazela", 
        "users.uPorisod", 
        "phone_books.phone_number_one",
        "phone_books.image",
        "phone_books.description",
        
        )->leftJoin("users", "users.id", "=", "phone_books.user_id")->where('user_id',Auth::user()->id)->get();
    return view('phone.profile',compact('phones'));
    
}

public function editProfile($id = null)
{

    $users=User::find($id); 
    //$editprofile= PhoneBook::select('id','phone_number_one','image','description')->get();
    return view('phone.edit-profile',compact('users'));
    

return $users;


}



public function create(){

$phones= PhoneBook::select('id','name','phone_number_one','email','image','description')->get();   
return view('phone.create',compact('phones'));
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
    $completeImageName = $request->file('image')->getClientOriginalName(); // khan two.jpg full image name
    $fileNameOnly=pathinfo($completeImageName,PATHINFO_FILENAME); // khan two
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
$phones->user_id = Auth::user()->id;
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
if($request->file('image')){
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
}
else{
    $path = $request->old_image;
}

$phones =  PhoneBook::find($id);
$phones->name=$request->name;
$phones->phone_number_one=$request->phone_number_one;
$phones->email=$request->email;
$phones->image=$path;
$phones->user_id=Auth::user()->id;
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
