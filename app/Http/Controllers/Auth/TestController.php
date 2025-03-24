<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TestController extends Controller
{
    public function index(){
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.test.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }
}
