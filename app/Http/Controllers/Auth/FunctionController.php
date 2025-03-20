<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class FunctionController extends Controller
{
    public function index(Request $request)
    {
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.overview';

        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }




}

