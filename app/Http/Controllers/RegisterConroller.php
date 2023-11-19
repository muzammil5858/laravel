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

        $data = DB::select("SELECT * from users where email = '$email' and password = '$password'");
        // // $some = json_encode($data);
        if($data){
            $data = $data[0]->Role; 
            // $request->session()->put('id','this is me');
        }
        else{
            $data = 'user does not exists';
        }

        return response()->json($data);
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
