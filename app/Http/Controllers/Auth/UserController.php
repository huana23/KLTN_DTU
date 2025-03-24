<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use Illuminate\Http\Requests;

class UserController extends Controller
{
    protected $userService;
    protected $userRepository;


    public function __construct(
        UserService $userService,
        UserRepository $userRepository
    )
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;

    }
    public function index(Request $request)
    {
        $allUsers = $this->userService->paginate($request);
        
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.user.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allUsers'));
    }

    public function create(){
        $users = Auth::user();
        $config = 'create';

        $templateView = 'layouts.admin.templates.user.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'config'));
    }

    public function store(StoreUserRequest $request) {
        if($this->userService->create($request)){
            return redirect()->route('admin.user')->with('success', 'Thêm mới thành viên thành công');
        }
        return redirect()->route('admin.user')->with('error', 'Thêm mới thành viên thất bại . Hãy thử lại !');
        
    }

    public function edit($id){
        $oneUser = $this->userRepository->findById($id);
        $config = 'edit';
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.user.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneUser','config'));
    }


    public function update($id,UpdateUserRequest $request) {
        if($this->userService->update($id ,$request)){
            return redirect()->route('admin.user')->with('success', 'Cập nhật thành viên thành công');
        }
        return redirect()->route('admin.user')->with('error', 'Cập nhật thành viên thất bại . Hãy thử lại !');
    }

    public function delete($id){
        $oneUser = $this->userRepository->findById($id);
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.user.delete';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneUser'));
    }

    public function destroy($id){
        if($this->userService->destroy($id)){
            return redirect()->route('admin.user')->with('success', 'Xoá thành viên thành công');
        }
        return redirect()->route('admin.user')->with('error', 'Xoá thành viên thất bại . Hãy thử lại !');
    }
}
