<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;


use App\Models\User;
use DB;

class RegisterConroller extends Controller
{
     function login(Request $request){

        $email = $request->email;
        $password = $request->password;

        $data = DB::select("SELECT * from user where email = '$email' and password = '$password'");

        if($data != []){


            $data = $data[0];
            $status = 200;
            return response()->json([
                'Array'=>$data,
                'status' => $status,
            ]);
        }
        else{
            $message = 'user does not exists';
            $status = 400;

            return response()->json([
                'Array'=>$message,
                'status' => $status,
            ]);
        }


    }

    function forgetpassword(Request $request)
    {
        $email = $request->email;
        $data = DB::select("SELECT * from users where email = '$email' ");
        $CheckUserInSystem = User::where('email', $email)->count();
        if ($CheckUserInSystem == 1) {
            $User = User::where('email', $email)->select('id','name','email','Role')->get();
            $data = $User;
            $status = 200;
            return response()->json([
                'Array'=>$data,
                'status' => $status,
            ]);
        }
        else {
            $message = 'Email does`nt matched in our system..!';
            $status = 400;
            return response()->json([
                'Array'=>$data,
                'message'=>$message,
                'status' => $status,
            ]);
        }
    }

    function register(Request $request){

        $email = $request->email;
        $password = $request->password;
        $user = $request->type;
        $name = $request->name;
        // $count = DB::select("SELECT * from users");
        $record = DB::select("SELECT * from users where name = '$name' and email = '$email'");
        // $record = $count;
        if($record){
            $value = 'user Already Exist';
        }
        else{

            // $data = User::all();
            $data = new User;
            // $data->userid = $count + 1;
            $data->name = $name;
            $data->email = $email;
            $data->password = $password;
            $data->Role = $user;
            $data->save();
            $value = 'SignUp Successfull';
            // $value = $data;
        }

        return response()->json($value);
    }
}
