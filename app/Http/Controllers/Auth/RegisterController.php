<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function showForm(){
        return view('layouts.auth.register');
    }


    public function register(RegisterRequest $request)
    {

        $maThanhVien = $this->generateMaThanhVien();

        $user = User::create([
            'hoTen' => $request->hoTen,
            'maThanhVien' => $maThanhVien,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('client.index')->with('success', 'Đăng ký thành công! Chào bạn');
    }

    private function generateMaThanhVien()
    {
        return 'TV' . time();
    }
}
