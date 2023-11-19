<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
class InstructorController extends Controller
{
     function profile(){
        $data = $request->session()->get('id');;

     }
     function feedback(){
       $data = DB::select("SELECT * from feedback left join users on users.id = feedback.stud_id");
        return response()->json($data);

     }
     function grades(){
        // select *,answers.course_id as course,answers.id as aid from answers left join user on answers.user_id = user.userid left join student_exam on student_exam.sid = answers.exam_id
        $data = DB::select("SELECT *,answers.course_id as course,answers.id as aid from answers left join users on answers.user_id = users.id left join questions on questions.id = answers.exam_id");

        return response()->json($data);
     }
     function  answers($id){

     }
     function editgrade($id){

     }
     function updategrade($id){

     }
}
