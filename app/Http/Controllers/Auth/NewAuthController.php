<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class NewAuthController extends Controller
{
    public function index() {
        if (Session::get('user'))
          {
            return back()->withInput();
          }
          else 
          {
            Auth::logout();
            return view('admin-login');
          }
    }

    public function admin_register() {
      return view('admin-reigster');
    }

    

    public function register(Request $request) {
      $name = $request->name;
      $email = $request->email;
      $password = Hash::make($request->password);

      $res = User::where('email', $email)->first();
      if(!is_null($res)) {
        return response()->json(['data' => '0']);
      }
      else {
        $userData = [
          'name' => $name,
          'email' => $email,
          'password' => $password,
          'role' => "1"
        ];
       
        $usernew = User::create($userData);
        return response()->json(['data' => '1']);
      }
      
    }

    public function login(Request $request) {
      $credentials  = $request->only('email', 'password', 'role');
     
        if (Auth::attempt($credentials )) {
          $request->session()->regenerate();
          
          Session::put('user', $credentials);
          return response()->json(['data'=> '1']);
        }
        else {
          return response()->json(['data' => '0']);
        }
    }

    public function logout(Request $request) {
      Auth::logout();

      $request->session()->invalidate();
  
      $request->session()->regenerateToken();
      return Redirect::to('/login');
    }
}
