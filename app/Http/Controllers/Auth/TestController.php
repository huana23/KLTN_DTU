<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\TestServiceInterface as TestService;
use App\Repository\Interfaces\TestRepositoryInterface as TestRepository;
use App\Http\Requests\StoreTestRequest;
use App\Models\Test;


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
    public function index(){
        $allTest = $this->testService->paginate();

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.test.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users','allTest'));
    }

    public function create(){

        $users = Auth::user();
        
        
        
        $templateView = 'layouts.admin.templates.test.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }

    public function store(StoreTestRequest $request) {
        
        
        

        if ($this->testService->create($request)) {
            return redirect()->route('admin.test')->with('success', 'Thêm mới bài kiểm tra thành công');
        }
        return redirect()->route('admin.test')->with('error', 'Thêm mới bài kiểm tra thất bại. Hãy thử lại!');
    }
    
    public function edit($id){

       
        $oneTest = $this->testRepository->findById($id);

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.test.edit';
        return view('layouts.admin.dashboard', compact('templateView', 'users','oneTest'));
    }

    public function update($id,StoreTestRequest $request) {
        if($this->testService->update($id ,$request)){
            return redirect()->route('admin.test')->with('success', 'Cập nhật bài kiểm tra thành công');
        }
        return redirect()->route('admin.test')->with('error', 'Cập nhật bài kiểm tra thất bại . Hãy thử lại !');
    }

    public function delete($id){
        $oneTest = $this->testRepository->findById($id);

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.test.delete';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneTest'));
    }

    public function destroy($id){
        if($this->testService->destroy($id)){
            return redirect()->route('admin.test')->with('success', 'Xoá bài kiểm tra thành công');
        }
        return redirect()->route('admin.test')->with('error', 'Xoá bài kiểm tra thất bại . Hãy thử lại !');
    }
}
