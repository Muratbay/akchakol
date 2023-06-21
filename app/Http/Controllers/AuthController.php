<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('admin.login');  
    }
    public function login(Request $request){
        $check = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

    //    $admin=Admin::where('email',$request->email)->where('phone',$request->phone)->where('password',$request->password)->count();
        $admin = Auth::attempt($check);
        if($admin){
            $request->session()->regenerate();
            return view('admin.admin');
        }
        else{
            return redirect('/');
        }
        // if($admin->email==$check=['email'] ){
            // $r->session()->regenerate();
            // return view('admin.admin');
        // } 

    }
    public function logout(){
       Auth::logout();
        return redirect('/');
    }
}
