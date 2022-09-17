<?php

namespace App\Http\Controllers;

use App\Models\Addres;
use App\Models\Country;
use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    
    public function index()
    {
       
       $address = Addres::leftJoin('countries','countries.id','=','addres.country')
       ->leftJoin('divisions','divisions.id','=','addres.division')
       ->leftJoin('districts','districts.id','=','addres.district')
       ->leftJoin('upazilas','upazilas.id','=','addres.upazila')
       ->get([
        'addres.*',
        'countries.name as country_name',
        'divisions.bn_name as division_name',
        'districts.bn_name as district_name',
        'upazilas.bn_name as upazila_name',

      ]);
      

    //   return $address;

      $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
      return view('address.index',compact('countries','address'));

     
    }
public function create()
{
    $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
   $creates= new Addres();
   return view('address.create',compact('creates','countries'));
}

public function storeAddress(Request $request)
{

    $request->validate([
        'name'=>'required',
        'country'=>'nullable',
        'division'=>'nullable',
        'district'=>'nullable',
        'upazila'=>'nullable'
        
        ]);
        $address= new Addres();
        $address->name=$request->name;
        $address->country=$request->country;
        $address->division=$request->division;
        $address->district=$request->district;
        $address->upazila=$request->upazila;
       
        $address->save();
        Session::flash('success','data added');
        return redirect('/address/index');
         

   
}

public function editAddress($id=null)
{
   $countries=[''=>'select country']+Country::pluck('name','id')->toArray();
    $editAddress = Addres::find($id);
    return view('address.edit',compact('editAddress','countries')); 

// $editAddress->country = $request->country;
// $editAddress->division = $request->division;
// $editAddress->district = $request->district;
// $editAddress->upazila = $request->upazila;
// $editAddress->address = $request->address;
// $editAddress->save();
// Session::flash('success','Data update successfully...');
//    return redirect('/address/index');
    

}

public function updateAddress(Request $request,$id)
{
   $request->validate([
      'name'=>'required',
      'country'=>'nullable',
      'division'=>'nullable',
      'district'=>'nullable',
      'upazila'=>'nullable'
      
      ]);
      $address=  Addres::find($id);
      $address->name=$request->name;
      $address->country=$request->country;
      $address->division=$request->division;
      $address->district=$request->district;
      $address->upazila=$request->upazila;
     
      $address->save();
      Session::flash('success','data added');
      return redirect('/address/index');
       


   
}

public function deleteAddress($id)
{
   $delereAdd= Addres::find($id);
   $delereAdd->delete();
Session::flash('success','data delete');
return redirect('/address/index');
  
}


//country div dis up

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
 


}
