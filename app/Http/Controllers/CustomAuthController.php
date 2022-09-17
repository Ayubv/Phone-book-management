<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class CustomAuthController extends Controller
{



public function admin()
{
return view('layouts.admin');
}

public function index()
{
return view('auth.login');
}  

public function customLogin(Request $request)
{
$request->validate([
'email' => 'required',
'password' => 'required',
]);

$credentials = $request->only('email', 'password');
if (Auth::attempt($credentials)) {
return redirect()->intended('dashboard')
->withSuccess('Signed in');
}

return redirect("login")->withSuccess('Login details are not valid');
}

public function registration()
{
   $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
   return view('auth.registration',compact('countries'));
   



}

public function customRegistration(Request $request)
{  
$request->validate([
'name' => 'required',
'username' => 'required',
'email' => 'required|email|unique:users',
'password' => 'required|min:4',
'country' => 'nullable',
'division' => 'nullable',
'district' => 'nullable',
'upazila' => 'nullable',
'address' => 'nullable'

]);
$data = $request->all();
$user = new User();
$user->name = $request->name;
$user->username =$request->username ;
$user->username =$request->username ;
$user->email =$request->email ;
$user->password =$request->password ;
$user->country =$request->country ;
$user->division =$request->division ;
$user->district =$request->district ;
$user->upazila =$request->upazila ;
$user->address =$request->address ;
$user->save();



return redirect("dashboard")->withSuccess('You have signed-in');

}

public function create(array $data)
{
return User::create([
'name' => $data['name'],
'username' => $data['username'],
'email' => $data['email'],
'password' => Hash::make($data['password']),
'country' => $data['country'],
'division' => $data['division'],
'district' => $data['district'],
'upazila' => $data['upazila'],
'address' => $data['address']

]);
}    

public function dashboard()
{
if(Auth::check()){
return view('dashboard');
}

return redirect("login")->withSuccess('You are not allowed to access');
}

public function signOut() {
Session::flush();
Auth::logout();

return Redirect('login');
}

public function profile()
{
return view('profiles.profile');
}

public function pro_file()
{

   $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
   return view('auth.profile',compact('countries'));
   
}




public function update_profile(Request $request)
{

$user=User::where('email',Auth::user()->email)->first();
 if($request->hasfile('image')) {
   if($request->hasfile('image')){
      $completeImageName = $request->file('image')->getClientOriginalName(); // khan two.jpg full image name
      $fileNameOnly=pathinfo($completeImageName,PATHINFO_FILENAME); // khan two
      $image_name = str_replace(' ','_',$fileNameOnly);
      $file_extension = $request->file('image')->getClientOriginalExtension(); 
      $modified_image_name = $image_name.'-'.time().'.'.$file_extension;
      $path=$request->file('image')->storeAs('public/user', $modified_image_name);
      $path = Storage::url($path);
   }
   else{
      $path ='';
   }
 }else{
   $path=$request->old_image;
 }
$user->image=$path;
$user->country = $request->country;
$user->division = $request->division;
$user->district = $request->district;
$user->upazila = $request->upazila;
$user->address = $request->address;
$user->save();
Session::flash('success','Data update successfully...');
   return redirect('/profile');
}


public function getDivisions($country_id)
{
   $divisions = Division::where('country_id',$country_id)->pluck('bn_name','id')->toArray();
   return response()->json(['success'=>true,'divisions'=>$divisions]);
}
public function getDistricts($division_id)
{
   $districts = District::where('division_id',$division_id)->pluck('bn_name','id')->toArray();
   return response()->json(['success'=>true,'districts'=>$districts]);
}

public function getUpazilas($district_id)
{
   $upazilas = Upazila::where('district_id',$district_id)->pluck('bn_name','id')->toArray();
   return response()->json(['success'=>true,'upazilas'=>$upazilas]);
}

public function createUsers(Request $request)
{  
$request->validate([
'name' => 'required',
'country' => 'nullable',
'division' => 'nullable',
'district' => 'nullable',
'upazila' => 'nullable',
//'address' => 'nullable'

]);
$data = $request->all();
$user = new User();
$user->name = $request->name;
//$user->username =$request->username ;
//$user->username =$request->username ;
//$user->email =$request->email ;
//$user->password =$request->password ;
$user->country =$request->country ;
$user->division =$request->division ;
$user->district =$request->district ;
$user->upazila =$request->upazila ;
//$user->address =$request->address ;
$user->save();



return redirect("dashboard")->withSuccess('You have signed-in');

}
 

public function createUser()
{

   $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
   return view('createUser',compact('countries')); 

  
   
}

public function storeUser(Request $request)
{

   $request->validate([
      'name' => 'required',
      //'username' => 'required',
      //'email' => 'required|email|unique:users',
      //'password' => 'required|min:4',
      'country' => 'nullable',
      'division' => 'nullable',
      'district' => 'nullable',
      'upazila' => 'nullable',
      'address' => 'nullable'
      
      ]); 
    
$newUser = new User();
$newUser->name = $request->name;
//$newUser->email =$request->email;
//$newUser->username =$request->username;
//$newUser->password =$request->password;
$newUser->country =$request->country ;
$newUser->division =$request->division ;
$newUser->district =$request->district ;
$newUser->upazila =$request->upazila ;

$newUser->save();

return redirect("dashboard")->withSuccess('You have signed-in');

  
}

public function showUser(Request $request)
{
  
  $users= User::all();
   $users->status=$request->status;
   


   return view('showusers',compact('users'));

}
public function changeStatus($id,$status)
{
   $user=User::where('id',$id)->first();
   $user->status = !$status;
   $user->save();
   return redirect()->back();
  
}



}