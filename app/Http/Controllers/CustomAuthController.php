<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
return view('auth.registration');
}

public function customRegistration(Request $request)
{  
$request->validate([
'name' => 'required',
'username' => 'required',
'email' => 'required|email|unique:users',
'password' => 'required|min:4',
'division' => 'required',
'district' => 'required',
'upazela' => 'required',
'uPorisod' => 'required'

]);

$data = $request->all();
$check = $this->create($data);

return redirect("dashboard")->withSuccess('You have signed-in');
}

public function create(array $data)
{
return User::create([
'name' => $data['name'],
'username' => $data['username'],
'email' => $data['email'],
'password' => Hash::make($data['password']),
'division' => $data['division'],
'district' => $data['district'],
'upazela' => $data['upazela'],
'uPorisod' => $data['uPorisod'],
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
}