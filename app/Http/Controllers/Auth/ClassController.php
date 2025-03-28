<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\ClassServiceInterface as ClassService;
use App\Repository\Interfaces\ClassRepositoryInterface as ClassRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassRequest;


class ClassController extends Controller
{
    protected $classService;
    protected $classRepository;

    public function __construct(
        ClassService $classService,
        ClassRepository $classRepository
    )
    {
        $this->classService = $classService;
        $this->classRepository = $classRepository;
    }

    public function index()
    {
        
        $allClass = $this->classService->paginate();

        
        $users = Auth::user();

        
        $templateView = 'layouts.admin.templates.class.index';

        
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allClass'));
    }

    public function create(){

        $users = Auth::user();
        
        
        
        $templateView = 'layouts.admin.templates.class.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users'));
    }

    public function store(StoreClassRequest $request) {
        
        
        

        if ($this->classService->create($request)) {
            return redirect()->route('admin.class')->with('success', 'Thêm mới bài kiểm tra thành công');
        }
        return redirect()->route('admin.class')->with('error', 'Thêm mới bài kiểm tra thất bại. Hãy thử lại!');
    }

    public function edit($id){

       
        $oneClass = $this->classRepository->findById($id);

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.class.edit';
        return view('layouts.admin.dashboard', compact('templateView', 'users','oneClass'));
    }

    public function update($id,StoreClassRequest $request) {

        if($this->classService->update($id ,$request)){
            return redirect()->route('admin.class')->with('success', 'Cập nhật lớp học thành công');
        }
        return redirect()->route('admin.class')->with('error', 'Cập nhật lớp học thất bại . Hãy thử lại !');
    }

    public function delete($id){
        $oneClass = $this->classRepository->findById($id);

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.class.delete';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneClass'));
    }

    public function destroy($id){
        if($this->classService->destroy($id)){
            return redirect()->route('admin.class')->with('success', 'Xoá lớp học tra thành công');
        }
        return redirect()->route('admin.class')->with('error', 'Xoá lớp học tra thất bại . Hãy thử lại !');
    }
}
