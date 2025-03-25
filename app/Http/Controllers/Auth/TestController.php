<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\TestServiceInterface as TestService;
use App\Repository\Interfaces\TestRepositoryInterface as TestRepository;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;


class TestController extends Controller
{
    protected $testService;
    protected $testRepository;

    public function __construct(
        TestService $testService,
        TestRepository $testRepository
    )
    {
        $this->testService = $testService;
        $this->testRepository = $testRepository;
    }

    public function index(Request $request)
    {
        
        $allTests = $this->testService->paginate($request);

       
        $users = Auth::user();

       
        $templateView = 'layouts.admin.templates.test.index';

       
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allTests'));
    }

    public function create() {
        $users = Auth::user();
        $config = 'create';
    
        $templateView = 'layouts.admin.templates.test.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'config'));
    }
    
    public function store(StoreTestRequest $request) {
        if ($this->testService->create($request)) {
            return redirect()->route('admin.test')->with('success', 'Thêm mới bài kiểm tra thành công');
        }
        return redirect()->route('admin.test')->with('error', 'Thêm mới bài kiểm tra thất bại. Hãy thử lại!');
    }

    // public function edit($id){
    //     $oneTest = $this->testRepository->findById($id);
    //     $config = 'edit';
    //     $users = Auth::user();
    //     $templateView = 'layouts.admin.templates.test.store';
    //     return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneTest','config'));
    // }
    // public function update($id,UpdateTestRequest $request) {
    //     if($this->testService->update($id ,$request)){
    //         return redirect()->route('admin.test')->with('success', 'Cập nhật bài kiểm tra thành công');
    //     }
    //     return redirect()->route('admin.test')->with('error', 'Cập nhật bài kiểm tra thất bại . Hãy thử lại !');
    // }

    // public function delete($id){
    //     $oneTest = $this->testRepository->findById($id);
    //     $users = Auth::user();
    //     $templateView = 'layouts.admin.templates.test.delete';
    //     return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneTest'));
    // }

    // public function destroy($id){
    //     if($this->testService->destroy($id)){
    //         return redirect()->route('admin.user')->with('success', 'Xoá thành viên thành công');
    //     }
    //     return redirect()->route('admin.user')->with('error', 'Xoá thành viên thất bại . Hãy thử lại !');
    // }
}

