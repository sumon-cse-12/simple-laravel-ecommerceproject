<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function authenticate(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password' => $request->password], $request->get('remember'))){
            $admin = Auth::guard('admin')->user();
            if($admin->role == 1){
                return redirect()->route('admin.dashboard');
            }else{
                $admin = Auth::guard('admin')->logout();
            }
          
        }else{
            return redirect()->route('admin.login')->withErrors(['message'=>'Invalid email or password. Please try again.']);
        }
        
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
