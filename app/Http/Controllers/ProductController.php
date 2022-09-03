<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

//for product page
public function product(){
    $products= Product::leftJoin('categories','categories.id','=','products.category_id')
    ->select(
        'products.*',
        'categories.name as category_name'
    )
    ->latest()->paginate(10);
    return view('product',compact('products'));

 

}
public function productAdd(){
    $country = "<script>alert('attack')</script>";
    $categories=Category::pluck('name','id')->toArray();
    return view('product-add-collective-form',compact('categories','country'));
}

  

public function productStore(Request $request){
    $rules = [
        'name'          => 'required',
        'description'   => 'required',
        'buy_price'     => 'required|numeric|gt:100',
        'discount'      => 'required',
        'discount_type' => 'in:%,flat',
        'sell_price'    => 'required|numeric|gt:150',
        'category_id'   => 'required'
    
    ];
    $messages = [
        'category_id.required'  => 'The category name is required.',
        'sell_price.required'   => 'Sell price daw.',
        'sell_price.numeric'    => 'Sell price dicho thik ache kintu number daw.',
        'sell_price.gt'         => '150 tk er niche bechbo na.',
        'discount_type.in'      => 'Hoy percentage daw na hoy koi tk kom niba seta daw'
    ];
    $request->validate($rules, $messages);
  
$prduct=new Product();
$prduct->name=$request->name;
$prduct->description=$request->description;
$prduct->buy_price= $request->buy_price;
$prduct->discount= $request->discount;
$prduct->discount_type= $request->discount_type;
$prduct->sell_price= $request->sell_price;
$prduct->category_id= $request->category_id;
$prduct->save();

Session::flash('success','Data stored successfully');
        return redirect('/product');
    
}

public function editProduct($id= null)
{
    $product=Product::find($id); 
    $categories= Category::pluck('name','id')->toArray();
    return view('edit-product',compact('product','categories'));
}

public function updateProduct(Request $request,$id)
{
    $request->validate([
        'name'          => 'required',
        'description'   => 'required',
        'buy_price'     => 'required|numeric|gt:100',
        'discount'      => 'required',
        'discount_type' => 'required:in:%,flat',
        'sell_price'    => 'required|numeric|gt:150',
        'category_id'   => 'required'
    
    ]);
  
$prduct= Product::find($id);
$prduct->name=$request->name;
$prduct->description=$request->description;
$prduct->buy_price= $request->buy_price;
$prduct->discount= $request->discount;
$prduct->discount_type= $request->discount_type;
$prduct->sell_price= $request->sell_price;
$prduct->category_id= $request->category_id;
$prduct->save();
Session::flash('success','Data Update successfully');
        return redirect('/product');
      
   
}
public function productDelete($id = null)
{
  $deletePrduct= Product::find($id);
  $deletePrduct->delete();
  Session::flash('success','Data delete successfully');
        return redirect('/product');
}


    
}
