<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use  App\Http\Requests\AuthRequest;

class LoginController extends Controller
{
    public function showForm(){
        return view('layouts.auth.login');
    }

    public function login(AuthRequest $request) {
        
        $email = $request->email;
        $password = $request->password;
        $status = Auth::attempt(['email'=>$email, 'password'=>$password]);
        
        if ($status) {
            $user = Auth::user();
        
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard')->with('success', 'Hi admin');
            }
        
            return redirect()->route('client.index')->with('success', 'Hi user');
        }

        return redirect()->route('auth.login')->with('error', 'Email hoặc Mật khẩu sai .');
    }
}
