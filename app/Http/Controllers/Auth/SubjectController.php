<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\SubjectServiceInterface as SubjectService;
use App\Repository\Interfaces\SubjectRepositoryInterface as SubjectRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubjectRequest;

use App\Models\Subject;

class SubjectController extends Controller
{
    protected $subjectService;
    protected $subjectRepository;


    public function __construct(
        SubjectService $subjectService,
        SubjectRepository $subjectRepository
    )
    {
        $this->subjectService = $subjectService;
        $this->subjectRepository = $subjectRepository;

    }
    public function index(){
        $allSubjects = $this->subjectService->paginate();
        $allClass = $this->subjectService->classSubject();
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.subject.index';

        return view('layouts.admin.dashboard', compact('templateView', 'users','allSubjects','allClass'));
    }

    public function create(){

        $users = Auth::user();
        $allClass = $this->subjectService->classSubject();
        

        $templateView = 'layouts.admin.templates.subject.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users','allClass'));
    }


    public function store(StoreSubjectRequest $request) {
        if($this->subjectService->create($request)){
            return redirect()->route('admin.subject')->with('success', 'Thêm mới môn học thành công');
        }
        return redirect()->route('admin.subject')->with('error', 'Thêm mới môn học thất bại . Hãy thử lại !');
        
    }


    public function edit($id){

       
        $oneSubject = $this->subjectRepository->findById($id);
        $allClass = $this->subjectService->classSubject();

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.subject.edit';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneSubject', 'allClass'));
    }


    public function update($id,StoreSubjectRequest $request) {
        if($this->subjectService->update($id ,$request)){
            return redirect()->route('admin.subject')->with('success', 'Cập nhật môn học thành công');
        }
        return redirect()->route('admin.subject')->with('error', 'Cập nhật môn học thất bại . Hãy thử lại !');
    }

    public function delete($id){
        $oneSubject = $this->subjectRepository->findById($id);
        $allClass = $this->subjectService->classSubject();

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.subject.delete';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneSubject', 'allClass'));
    }

    public function destroy($id){
        if($this->subjectService->destroy($id)){
            return redirect()->route('admin.subject')->with('success', 'Xoá thành viên thành công');
        }
        return redirect()->route('admin.subject')->with('error', 'Xoá thành viên thất bại . Hãy thử lại !');
    }
}
