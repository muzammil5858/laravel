<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QualityCourse;
use App\Models\QualityProgram;
use App\Models\QualityReport;
use DB;
class QAController extends Controller
{
    function manageProgram(){
        $data = DB::select("SELECT * from quality_programs");
        return response()->json($data);
    }
    function addprogram(Request $req){

        $data = new QualityProgram;
        $data->proname = 'this is me';

        // $data->decrp = $rerq->desc;
        $data->save();

        $value = $req->all();

        return response()->json($value);
    }
    function approve($id){
        $data = QualityProgram::find($id);
        $data->status = 1;
        $data->update();

        $value = 'Accepted Successfully';
        return response()->json($value);
    }
    function reject($id){
        $data = QualityProgram::find($id);
        $data->status = 0;
        $data->update();

        $value = 'Rejected Successfully';
        return response()->json($value);
    }
    function delete($id){
        $data = QualityProgram::find($id)->delete();
        return response()->json('Deleted Succrssfully');
    }
    function managecourse(){
        $data = DB::select("SELECT * from quality_courses");
        return response()->json($data);
    }
    function addcourse(Request $req){

        $data = new QualityCourse;
        $data->couurse_name = $req->name;
        $data->decrp = $req->desc;


        // $data->decrp = $rerq->desc;
        $data->save();

        $value = 'Added Succcessfully';

        return response()->json($value);
    }
    function getreport(){

    //    $value = DB::select("SELECT * from ")
    $value = QualityReport::all();
        return response()->json($value);
    }
    function addreport(Request $req){

        $data = new QualityReport;
        $data->stud_name = $req->name;
        $data->stud_id = $req->stud_id;
        $data->course = $req->course;
        $data->percentage = $req->percentage;
        $data->comment = $req->comment;


        // $data->decrp = $rerq->desc;
        $data->save();

        $value = 'Added Succcessfully';

        return response()->json($value);
    }
    function capprove($id){
        $data = QualityCourse::find($id);
        $data->status = 1;
        $data->update();

        $value = 'Accepted Successfully';
        return response()->json($value);
    }
    function creject($id){
        $data = QualityCourse::find($id);
        $data->status = 0;
        $data->update();

        $value = 'Rejected Successfully';
        return response()->json($value);
    }
    function cdelete($id){
        $data = QualityCourse::find($id)->delete();
        return response()->json('Deleted Succrssfully');
    }
}
