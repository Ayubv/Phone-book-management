<?php


use App\Models\Cow;
use App\Models\Foder;
use App\Models\Country;
use App\Models\Product;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CowController;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PhoneBookController;
use App\Http\Controllers\CustomAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
// Route::get('showusers', function () {
   
//     $users= User::all();
//     return view('showusers',compact('users'));
// });
Route::get('layouts/createUser', function () {

    $users= User::all();
    return view('layouts.createUser',compact('users'));
});


//users table
Route::get('/showusers', [CustomAuthController::class, 'showUser']);
Route::get('/createUser', [CustomAuthController::class, 'createUser']); 
Route::post('/storeUser', [CustomAuthController::class, 'storeUser']); 
Route::get('/change-status/{stauts}/{id}', [CustomAuthController::class, 'changeStatus']); 




// Route::get('layouts/charts', function () {
//     return view('layouts.charts');
// });

// Route::get('layouts/tables', function () {
//     return view('layouts/tables');
// });

 
Route::get('layouts/admin', [CustomAuthController::class, 'admin']); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//product details
Route::get('/product',[ProductController::class,'product']);
Route::get('/product-add',[ProductController::class,'productAdd'])->name('product-add');
Route::post('/product-store',[ProductController::class,'productStore'])->name('product-store');
Route::get('/edit-product/{id}',[ProductController::class,'editProduct']);
Route::post('/update-product/{id}',[ProductController::class,'updateProduct']);
Route::get('/update-product/{id}',[ProductController::class,'productDelete']);
//category details

Route::get('/catagory/index',[CategoryController::class,'index']);
Route::get('/catagory/create',[CategoryController::class,'create']);
Route::post('/catagory/create',[CategoryController::class,'store']);
Route::get('/catagory/edit/{id}',[CategoryController::class,'editCategory']);
Route::post('/catagory/update/{id}',[CategoryController::class,'updateCatagory']);
Route::get('/catagory/delete/{id}',[CategoryController::class,'categoryDelete']);

//foders details
Route::get('/foders/index', [App\Http\Controllers\FoderController::class, 'index']);
Route::get('/foders/create', [App\Http\Controllers\FoderController::class, 'createFoder']);
Route::post('/foders/store', [App\Http\Controllers\FoderController::class, 'storeFoder']);
Route::get('/foders/edit/{id}', [App\Http\Controllers\FoderController::class, 'editFoder']);
Route::post('/foders/update/{id}', [App\Http\Controllers\FoderController::class, 'updateFoder']);
Route::get('/foders/delete/{id}', [App\Http\Controllers\FoderController::class, 'deleteFoder']);

// Route::get('/foders/index',function(){
//     $foders=Foder::where('user_id',Auth::user()->id)->get();
//     return view('/foders/index',compact('foders'));
// })->middleware('auth');

//cows route
Route::get('/cows/index',[CowController::class,'index']);
Route::get('/cows/create',[CowController::class,'createCow']);
Route::post('/cows/store',[CowController::class,'storeCow']);
Route::get('/cows/edit/{id}',[CowController::class,'editCow']);
Route::post('/cows/update/{id}',[CowController::class,'updateCow']);
Route::get('/cows/delete/{id}',[CowController::class,'deleteCow']);

    


Route::get('/max',function(){

     $result= Foder::max('sell');
     return $result;

});
Route::get('/min',function(){

    $result= Foder::min('sell');
    return $result;

});

Route::get('/avg',function(){

    $result= Foder::select('sell')->get();
    return $result;
    $result = max($result);
    return $result;

});

Route::get('/count',function(){

    $result= Foder::count('sell');
    return $result;

});


Route::get('/para',function(){
    return Foder::where('name','para')->pluck('name')->toArray();
});


Route::get('/m',function(){
    Session::flash('success','I am ok.');
    return view('m');
});

// phone
Route::group(['middleware' => 'auth'], function () {
Route::group(['prefix'=>'phone'],function(){
    Route::get('/index',[PhoneBookController::class,'index']);
    Route::get('/create',[PhoneBookController::class,'create']);
    Route::post('/store',[PhoneBookController::class,'store']);
    Route::get('/edit-phone/{id}',[PhoneBookController::class,'editPhone']);
    Route::post('/update-phone/{id}',[PhoneBookController::class,'updatePhone']);
    Route::get('/delete-phone/{id}',[PhoneBookController::class,'deletePhone']);
    
    
});
});

Route::group(['middleware'=>'auth'],function(){
Route::get('/profile',[CustomAuthController::class, 'pro_file']);
Route::post('/update-profile/{id}',[CustomAuthController::class, 'update_profile']);

});
Route::get('/get-division/{country_id}',[CustomAuthController::class,'getDivisions']);
Route::get('/get-district/{division_id}',[CustomAuthController::class,'getDistricts']);
Route::get('/get-upazila/{district_id}',[CustomAuthController::class,'getUpazilas']);
// Route::get('/query',function(){

// $re=Product::whereNotIn('buy_price',[200,140,500])->get();
// return $re;
// });



//address
Route::get('/address/index', [App\Http\Controllers\AddressController::class, 'index']);
Route::get('/address/create', [App\Http\Controllers\AddressController::class, 'create']);
Route::post('/address/store', [App\Http\Controllers\AddressController::class, 'storeAddress']);
Route::get('/address/edit/{id}', [App\Http\Controllers\AddressController::class, 'editAddress']);
Route::post('/address/update/{id}', [App\Http\Controllers\AddressController::class, 'updateAddress']);
Route::get('/address/delete/{id}', [App\Http\Controllers\AddressController::class, 'deleteAddress']);

Route::get('/address/get-division/{country_id}',[App\Http\Controllers\AddressController::class,'getDivisions']);
Route::get('/address/get-district/{division_id}',[App\Http\Controllers\AddressController::class,'getDistricts']);
Route::get('/address/get-upazila/{district_id}',[App\Http\Controllers\AddressController::class,'getUpazilas']);
// students

Route::group(['prefix'=>'students','middleware' => 'auth'],function(){
    Route::get('/manage',[App\Http\Controllers\StudentController ::class,'manage']);
    Route::get('/create',[App\Http\Controllers\StudentController ::class,'createStudent']);
    Route::post('/store/{id?}',[App\Http\Controllers\StudentController ::class,'storeStudent']);
    Route::get('/edit/{id}',[App\Http\Controllers\StudentController ::class,'editStudent']);
    Route::post('/update/{id}',[App\Http\Controllers\StudentController ::class,'updateStudent']);
    Route::get('/delete/{id}',[App\Http\Controllers\StudentController ::class,'deleteStudent']);
});

Route::get('/customer/{id?}',function($id=''){
    if($id){
        return "Customer er id ache";
    }
    return "Customer er id nai";
});
