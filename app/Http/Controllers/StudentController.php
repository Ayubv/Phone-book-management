<?php

namespace App\Http\Controllers;

use App\Models\Stuedent;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function manage()
    {
        $viewStud=Stuedent::all();

        return view('students.manage',compact('viewStud'));
       
    }

    public function createStudent()
    {

       return view('students.create');

    }


    public function storeStudent(Request $request)

    {
       
        
        $std=new Stuedent();    
        $std->name=$request->name;
        $std->email=$request->email;
        $std->address=$request->address;
        $std->save();
       

        return response()->json(['success'=>true]);
       
    }

    public function editStudent($id=null)
    {


        $editSt= Stuedent::find($id);
        return view('students.edit',compact('editSt'));
       
    }


public function updateStudent(Request $request,$id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'address'=>'required'
            ]);
            $upstd= Stuedent::find($id);
            $upstd->name=$request->name;
            $upstd->email=$request->email;
            $upstd->address=$request->address;
            $upstd->save();
            return response()->json(['success'=>true]);
       
    }

    public function deleteStudent($id)
    {
      
        $stDelete= Stuedent::where('id',$id)->delete();
        return redirect()->back();
    }

}
