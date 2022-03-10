<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    function login(Request $request){
        $user = User::where(['email'=>$request->email])->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return "User and password not matched";
        }else{
            $request->session()->put('user',$user);
            return redirect('/');
        }
    }
  
}
