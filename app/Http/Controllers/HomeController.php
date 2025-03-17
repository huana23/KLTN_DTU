<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {

        return view('home'); 
    }

    // public contact() {
    //     // Mail::to()->send(new class(ád))
    // }
}
