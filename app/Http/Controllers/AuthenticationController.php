<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function destroy(){


        auth()->logout();
       // redirect()->route('users.index')
        return redirect()->route('login')->with('success','Goodbye');
    }
    public function login(){
        
        return view('users.login');
    }

    public function Post_login(Request $request){
        $credentials = $request->validate([
            'user_name' => ['required'],
            'password' => ['required'],
        ]);
 
        $user = User::where('user_name',$request->uname);
        if (Auth::attempt($credentials)) {
            
           // $request->session()->regenerate();
            // auth()->login($user);
          //  dd('this is a test');
 
            return redirect()->route('home');
           // dd('this is a test');
        }
 
      
    }
        
    



}
