<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;


class SettingController extends Controller
{
    public function index() {
      $user_info = array();
      $user_info =  Auth::user();
    
      return view('setting')->with([
        'user' => $user_info
      ]);
    }

    public function resetinfo(Request $request) {
      $email = $request->re_email;
      $password = Hash::make($request->re_password);
      
      $res = User::where('email', $email)->update(['password'=>$password]);
      if($res == "1") {
        return response()->json(['data'=>'1']);
      }
    }
}
