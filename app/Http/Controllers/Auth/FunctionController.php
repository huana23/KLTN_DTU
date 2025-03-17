<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FunctionController extends Controller
{
    public function index(Request $request)
    {
        $users = Auth::user();
        $template = $request->get('template','overview'); 

        
        switch ($template) {
            case 'overview':
                $templateView = 'layouts.admin.templates.overview';
                break;
            case 'class':
                $templateView = 'layouts.admin.templates.class';
                break;
            case 'question':
                $templateView = 'layouts.admin.templates.question';
                break;
            case 'user':
                $templateView = 'layouts.admin.templates.user';
                break;
            case 'subject':
                $templateView = 'layouts.admin.templates.subject';
                break;
            case 'test':
                $templateView = 'layouts.admin.templates.test';
                break;
            default:
                $templateView = 'layouts.admin.templates.overview';
                break;
        }
        return view('layouts.admin.dashboard', compact(
            'templateView',
            'users'
        ));
    }
}

