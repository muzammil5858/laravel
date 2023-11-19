<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StudentController extends Controller
{
    public function getStudentInfo(Request $request){

        $sql=DB::select("select * from create_course left join create_exam on create_exam.subject = create_course.course_name 
        left join student_exam on create_exam.eid = student_exam.exam_id");
        
        return response()->json([
            'course'=> $sql,
            'message'=>'Student Courses'

        ]);

    }
}
