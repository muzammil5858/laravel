<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\ProgramCordStudent;
use App\Models\ProgramcprdReport;

class ProgramCordinatorController extends Controller
{
    function getStudent(){
        $data = DB::select("SELECT * from program_cord_students");
        return response()->json($data);
    }
    function getIns(){
        $data = DB::select("SELECT * from programcprd_reports where role = 'instructor'");
        return response()->json($data);
    }
    function getqo(){
        // $data = DB::select("SELECT * from program_cord_students");
        $data = DB::select("SELECT * from programcprd_reports where role = 'officer'");

        return response()->json($data);
    }function getadmin(){
        // $data = DB::select("SELECT * from program_cord_students");
        $data = DB::select("SELECT * from programcprd_reports where role = 'admin'");

        return response()->json($data);
    }
    function deladmin($id){
        // $data = DB::select("SELECT * from program_cord_students");
        ProgramcprdReport::find($id)->delete();

        return response()->json('deleted');
    }function delqo($id){
        // $data = DB::select("SELECT * from program_cord_students");
        $data = DB::select("SELECT * from programcprd_reports where role = 'admin'");

        return response()->json($data);
    }function addnew($id){
        // $data = DB::select("SELECT * from program_cord_students");
        // $data = DB::select("SELECT * from programcprd_reports where role = 'admin'");
        $data = new ProgramcordStudent;
        $data->name = $req->role;
        $data->performance = $req->file;
        $data->save();
        return response()->json('created Successfully');
    }
    
    function delstu($id){
        // $data = DB::select("SELECT * from program_cord_students");
        ProgramCordStudent::find($id)->delete();

        return response()->json('Deleted');
    }
    function addStudent(Request $req){
        // $data = $req->all();
        $data = new ProgramCordStudent;
        $data->name = $req->name;
        $data->performance = $req->per;
        $data->save();

        return response()->json('studend added');
    }
    function addreport(Request $req){
        // $data = $req->all();
        $data = new ProgramCordStudent;
        $data->name = $req->name;
        $data->performance = $req->per;
        $data->save();

        return response()->json('studend added');
    }
}
