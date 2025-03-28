<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Interfaces\QuestionServiceInterface as QuestionService;
use App\Repository\Interfaces\QuestionRepositoryInterface as QuestionRepository;
use App\Http\Requests\StoreQuestionRequest;


class QuestionController extends Controller
{
    protected $questionService;
    protected $questionRepository;

    public function __construct(
        QuestionService $questionService,
        QuestionRepository $questionRepository
    )
    {
        $this->questionService = $questionService;
        $this->questionRepository = $questionRepository;
    }
    public function index()
    {

        $allQuestion = $this->questionService->paginate();
        

        $users = Auth::user();

        
        $templateView = 'layouts.admin.templates.question.index';

        
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allQuestion' ));
    }

    public function create(){

        $users = Auth::user();
        
        $allNameSubjects = $this->questionService->classNameSubject();
        $allLevel = $this->questionService->allLevel();
        
        $templateView = 'layouts.admin.templates.question.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allNameSubjects','allLevel'));
    }


    public function store(StoreQuestionRequest $request) {
        if($this->questionService->create($request)){
            return redirect()->route('admin.question')->with('success', 'Thêm mới câu hỏi thành công');
        }
        return redirect()->route('admin.question')->with('error', 'Thêm mới câu hỏi thất bại . Hãy thử lại !');
        
    }

    public function edit($id){

       
        $oneQuestion = $this->questionRepository->findById($id);
        $allNameSubjects = $this->questionService->classNameSubject();
        $allLevel = $this->questionService->allLevel();




        $users = Auth::user();
        $templateView = 'layouts.admin.templates.question.edit';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneQuestion','allNameSubjects','allLevel'));
    }


    public function update($id,StoreQuestionRequest $request) {
        if($this->questionService->update($id ,$request)){
            return redirect()->route('admin.question')->with('success', 'Cập nhật câu hỏi thành công');
        }
        return redirect()->route('admin.question')->with('error', 'Cập nhật câu hỏi thất bại . Hãy thử lại !');
    }

    public function delete($id){
        $oneQuestion = $this->questionRepository->findById($id);
        $allNameSubjects = $this->questionService->classNameSubject();
        $allLevel = $this->questionService->allLevel();

        $users = Auth::user();
        $templateView = 'layouts.admin.templates.question.delete';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneQuestion','allNameSubjects','allLevel'));
    }

    public function destroy($id){
        if($this->questionService->destroy($id)){
            return redirect()->route('admin.question')->with('success', 'Xoá câu hỏi thành công');
        }
        return redirect()->route('admin.question')->with('error', 'Xoá câu hỏi thất bại . Hãy thử lại !');
    }
}
