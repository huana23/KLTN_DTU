<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.subject.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }
}
