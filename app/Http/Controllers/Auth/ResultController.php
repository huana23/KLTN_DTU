<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ClassSubject;
use App\Models\Test;
use App\Models\Result;
use App\Models\Subject;

class ResultController extends Controller
{
    public function index()
    {

        

        $users = Auth::user();

        $classes = Subject::all();
        $templateView = 'layouts.admin.templates.result.index';

        
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'classes' ));
    }


    public function resultClassTest($id, $subject) 
    {
        $user = Auth::user();
        $class = Subject::find($subject);
        $subjects = Subject::all();
       
        $filteredSubjects = $subjects->filter(function ($subjectItem) use ($subject) {
            return $subjectItem->id == $subject;
        });
        

        $subjectIds = $filteredSubjects->pluck('id');

        $classTestIds = Test::whereIn('monThi', $subjectIds)->pluck('id');
        
        $results = Result::whereIn('maDeThi', $classTestIds)->get();
        
        $templateView = 'layouts.admin.templates.result.resultClass';

        
        return view('layouts.admin.dashboard', compact('templateView', 'user', 'results', 'filteredSubjects',  'id', 'subject'));
    }

}
