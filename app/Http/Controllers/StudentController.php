<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Providers\AppServiceProvider; //for pagination
use Illuminate\Pagination\Paginator; //for pagination


class StudentController extends Controller
{
    // public function __construct(){
    //     $this->middleware('CustomAuth');
    // }
    
    function add(Request $req){
        $req->validate([
            'name'=>'required | max:15',
            'email'=>'required',
            'profilepic'=>'file|max:1024'
        ]);
        if($req->hasFile('profilepic')) {
            $file = $req->file('profilepic')->store('public/img'); 
        }
        $student = new Student();
        $student->name=$req->name;
        $student->email=$req->email;
        $student->class=$req->class;
        $student->gender=$req->gender;
        $student->profilepic=$req->hasfile('profilepic') ? $file : "";
        // $student->profilepic=$req->file('profilepic')->store('public/img');
        $student->save();
        $req->session()->flash('addstatus','Student Added Successfully');
        return redirect('studentlist');
        // return "added";
    }

    public static function getStudentImageURL($path){
        $pathname = Storage::url($path);
        return $pathname;
    }
    function list(){
        // $student = new Student();
        // return $student->all(); // 1st and this line is 1st way
        // $data = Student::all(); // 2nd way
        $data = Student::paginate(5);
        return view('studentlist',['studentlists'=>$data]);
        
    }

    function edit($id){
      $data = Student::find($id);  
      return view('studentedit',['studentdata'=>$data]);
    }

    function update(Request $req){
        if($req->hasFile('profilepic')) {
            $file = $req->file('profilepic')->store('public/img'); 
        }
        $student=Student::find($req->id);
        $student->name=$req->name;
        $student->email=$req->email;
        $student->class=$req->class;
        $student->gender=$req->gender;
        $student->profilepic=$req->hasFile('profilepic') ? $file : $req->profilepicold;       
        // $student->profilepic=$req->file('profilepic')->store('public/img');
        $student->save();
        $req->session()->flash('updatestatus','Student Updated Successfully');
        return redirect('studentlist');
    }

    function delete(Request $req, $id){
        $student = Student::find($id);
        $student->delete();
        $req->session()->flash("deletestatus","Student Deleted Successfully");
        return redirect('studentlist');
    }

}
