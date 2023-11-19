<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\Instructor;
use App\Models\QAOfficer;
use App\Models\Admin;


use DB;
class AdminController extends Controller
{
    function screate(Request $req){
        // $res = 'created Successfulu';
        $name = $req->name;
        $email = $req->email;
        $record = DB::select("SELECT * from students where name = '$name' and email = '$email'");
        // $record = $count;
        // $record = '';

        if($record){
            $value = 'Student Already Exist';
        }
        else{
            
            // $data = User::all();
            $data = new Students;
            
            $data->name = $name;
            $data->email = $req->email;
            $data->course = $req->course;
            $data->percentage = $req->percentage;
            $data->stud_id = $req->stud_id;
            $data->save();
            $value = 'SignUp Successfull';
            // $value = $data;
        }
        // $res = $req->all();
        return response()->json($value);
    }
    function sedit($id){

        $res = DB::select("SELECT * from students where id = '$id'");
        return response()->json($res);
        
    }
    function supdate(Request $req,$id){
    
        $data = Students::find($id);
            $data->name = $req->name;
            $data->email = $req->email;
            $data->course = $req->course;
            $data->percentage = $req->percentage;
            $data->stud_id = $req->stud_id;
            $data->update();


      return response()->json('Data Updated');
    }
    
    function sindex(){
        $res =  Students::all();

        return response()->json($res);
        
    }function sdelete($id){

        // return response()->json($id);
         $dat = Students::find($id)->delete();
         return response()->json('Deleted Successfully');
    }
    function qcreate(Request $req){
        // $res = 'created Successfulu';
        $name = $req->name;
        $email = $req->email;
        $record = DB::select("SELECT * from q_a_officers where name = '$name' and email = '$email'");
        // $record = $count;
        // $record = '';
        $value = 'creaed';
        if($record){
            $value = 'Instructor Already Exist';
        }
        else{
            
            // $data = User::all();
            $data = new QAOfficer;
            
            $data->name = $name;
            $data->email = $req->email;
            $data->course = $req->course;
            $data->percentage = $req->percentage;
            $data->qa_id = $req->stud_id;
            $data->save();
            $value = 'Created Successfully';
            // $value = $data;
        }
        // $res = $req->all();
        return response()->json($value);
    }
    function qedit($id){

        $res = DB::select("SELECT * from q_a_officers where id = '$id'");
        return response()->json($res);
        
    }
    function qupdate(Request $req,$id){
    
        $data = QAOfficer::find($id);
            $data->name = $req->name;
            $data->email = $req->email;
            $data->course = $req->course;
            $data->percentage = $req->percentage;
            $data->qa_id = $req->stud_id;
            $data->update();


      return response()->json('Data Updated');
    }
    
    function qindex(){
        $res =  QAOfficer::all();

        return response()->json($res);
        
    }function qdelete($id){

        // return response()->json($id);
         $dat = QAOfficer::find($id)->delete();
         return response()->json('Deleted Successfully');
    }
    function adminrole(Request $req){
        $data = new Admin; 
        $data->name = $req->name;
        $data->email = $req->email;
        $data->user_type = $req->type;
        $data->save();
        
        
        $value = 'Created Successfully';
        // $value = $req->all();
        return response()->json('created');
    }
}
