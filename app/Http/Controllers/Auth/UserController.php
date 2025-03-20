<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Requests;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index(Request $request)
    {
        $allUsers = $this->userService->paginate();
        
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.user.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allUsers'));
    }

    public function create(){
        $users = Auth::user();

        $templateView = 'layouts.admin.templates.user.create';
        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }

    public function store(StoreUserRequest $request) {
        if($this->userService->create($request)){
            return redirect()->route('admin.user')->with('success', 'Thêm mới thành viên thành công');
        }
        return redirect()->route('admin.user')->with('error', 'Thêm mới thành viên thất bại . Hãy thử lại !');
        
    }
}
