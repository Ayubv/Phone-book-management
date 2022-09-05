<?php

namespace App\Http\Controllers;

use App\Models\Foder;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FoderController extends Controller
{

    function __construct(){
        $this->middleware('auth');
        }

       

    public function index()
    {   
      
        $foders = Foder::where('user_id',Auth::user()->id)->get();
        return view('/foders/index',compact('foders'));

        
        // $foders= Foder::leftJoin('users','users.id','=','foders.user_id')
        // ->select(
        //     'foders.*',
        //     'users.name as user_id'
        // )
        // ->latest()->paginate(10);


     
    } 
    
    public function createFoder()
    {
       
      
        $foders= Foder::select('id','name')->get();
        return view('foders.create',compact('foders'));
         
    }

    public function storeFoder(Request $request)
    {
        

        $rules=[
            'name'=>'required',
            'sell'=>'required',
            'eat'=>'required'

        ];

        $messages=[
            'name.required'=>'This name field is required',
            'sell.required'=>'This sell field is required',
            'eat.required'=>'This eat field is required'


        ];

        $request->validate($rules, $messages);
       
       
       $foders= new Foder();
       $foders->name=$request->name;
       $foders->sell=$request->sell;
       $foders->eat=$request->eat;
       $foders->user_id=Auth::user()->id;
       $foders->save();
       Session::flash('success','Data insert successfully...');
       return redirect('/foders/index');

    }
 
    
public function editFoder($id=null)
{ //$foders=new Foder();
    $editFoders=Foder::find($id);
    
    //$foders= Foder::select('id','name','sell','eat')->get();
    return view('foders.edit',compact('editFoders')); 
}
function updateFoder(Request $request,$id)
{

    $request->validate([
        'name'=>'required',
        'sell'=>'required',
        'eat'=>'required'
       
   ]);
   
   $foders= Foder::find($id);
   $foders->name=$request->name;
   $foders->sell=$request->sell;
   $foders->eat=$request->eat;
   $foders->user_id=Auth::user()->id;
   $foders->save();
   Session::flash('success','Data update successfully...');
   return redirect('/foders/index');

   
}

public function deleteFoder($id)
{
    $deleteFoder= Foder::find($id);
    $deleteFoder->delete();
    Session::flash('success','Data delete successfully');
          return redirect('/foders/index');  
}

}
