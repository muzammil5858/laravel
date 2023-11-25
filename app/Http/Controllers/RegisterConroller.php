<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;


use App\Models\User;
use DB;
use Mail;

class RegisterConroller extends Controller
{
    public function login(Request $request){
        
        $email = $request->email;
        $password = $request->password;

        $data = DB::select("SELECT * from users where email = '$email' and password = '$password'");

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
        $data = DB::select("SELECT * from user where email = '$email' ");
        $CheckUserInSystem = User::where('email', $email)->count();
        if ($CheckUserInSystem == 1) {
            $User = User::where('email', $email)->select('userid','name','email','user_type')->get();
            $data = $User;
            $status = 200;
            $message = 'Email Verified!';
            
            return response()->json([
                'Array'=>$data,
                'message'=>$message,
                'status' => $status
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
        $type = $request->type;
        $name = $request->name;
        // $count = DB::select("SELECT * from users"); 
        $record = DB::select("SELECT * from user where name = '$name' and email = '$email'");
        // $record = $count;
        if($record){
            $value = 'User Already Exist';
            return response()->json([
                'message'=> $value,
                'status' =>400
            ]);
        }
        else{

            // $data = User::all();
            $data = new User;
            // $data->userid = $count + 1;
            $data->name = $name;
            $data->email = $email;
            $data->password = $password;
            $data->user_type = $type;
            $data->save();
         
            // return response()->json($data->id);
            $dataa = ['name'=>$name, 'id'=>$data->id];
           
            $email = $data->email;

            // Mail::send('verify-email', $dataa, function($message)  use ($email) {
            //     $message->to($email, 'User Email Verification')->subject
            //         ('User Email Verification');
            //     // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            //     // $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            //     $message->from('usamaumer109@gmail.com','Learniverse');
            // });
            $value = 'SignUp Successfull';
            return response()->json([
                'message'=> $value,
                 'user' => $data,
                 'status' =>200
            ]);
            // $value = $data;
        }

       
    }


    public function verifyRegisterUser(Request $request){

        
        $id             = $request->id;
        $UserDetail     = User::where('id', $id)->update([
            'emailVerified'=>1,
        ]);

        return response()->json([
            
 
            'message' => 'User Account Verified Succesfully!',
        ]);
    }
    public function changePassword(Request $request){

        
        $id             = $request->id;
        $UserDetail     = User::where('id', $id)->update([
            'password'=>$request->password,
        ]);

        return response()->json([
            
            'status' =>200,
            'message' => 'Password Change Succesfully!',
        ]);
    }
}
