<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\TestServiceInterface as TestService;
use App\Repository\Interfaces\TestRepositoryInterface as TestRepository;
use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;

use App\Models\CauHoiDeThi;
use App\Models\GiaoDeThi;
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
        
        $allSubject = $this->testRepository->allSubject();
        
        $templateView = 'layouts.admin.templates.test.store';
        return view('layouts.admin.dashboard', compact('templateView', 'users','allSubject'));
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

    public function update($id,UpdateTestRequest $request) {
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

    public function listQuestion($id) {
        $oneTest = $this->testRepository->findById($id);
        $allQuestion = CauHoiDeThi::where('dethi_id', $id)
                               ->with('question.monHoc', 'question.mucDo')
                               ->paginate(10);
        $users = Auth::user();
        
        
        $templateView = 'layouts.admin.templates.test.questionList';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneTest', 'allQuestion'));
    }


    public function addQuestionToTest($id){
        $questions = $this->testRepository->getAllQuestion();
        $test = $this->testRepository->findById($id);
    
        $questionsInTest = CauHoiDeThi::where('dethi_id', $id)->pluck('cauhoi_id')->toArray();
    
        
        $addedQuestionsCount = CauHoiDeThi::where('dethi_id', $id)->count();
    
        $templateView = 'layouts.admin.templates.test.addQuestionToTest';
        return view('layouts.admin.dashboard', compact(
            'templateView',
            'questions',
            'test',
            'questionsInTest',
            'addedQuestionsCount'
        ));
    }

    public function storeQuestionToTest(Request $request)
    {
        $testId = $request->dethi_id;
        $test = Test::find($testId);

        
        $currentCount = CauHoiDeThi::where('dethi_id', $testId)->count();

        if ($currentCount >= $test->soLuongCauHoi) {
            return redirect()->back()->with('error', 'Bài kiểm tra đã đủ số lượng câu hỏi. Không thể thêm nữa.');
        }

        
        $payload = $request->only(['cauhoi_id', 'dethi_id']);
        CauHoiDeThi::create($payload);

        return redirect()->route('admin.test.list-test', $testId)
                        ->with('success', 'Thêm câu hỏi vào bài thi thành công');
    }

    public function removeQuestionById($id)
    {
        
        $question = CauHoiDeThi::where('cauhoi_id', $id)->delete();
        if ($question) {
            return redirect()->back()->with('success', 'Đã xóa câu hỏi có mã câu hỏi: ');
        }

        return redirect()->back()->with('error', 'Không tìm thấy câu hỏi này.');
    }
    

    public function assignExam($id) {
        $test = $this->testRepository->findById($id);
        $allClasses = $this->testRepository->getAllClass();

        $allQuestionsTest = Test::where('id', $id)->pluck('soLuongCauHoi')->first();
        $questionsTest = CauHoiDeThi::where('dethi_id', $test->id)->count();
        



        if ($allQuestionsTest == $questionsTest) {
            // Nếu số lượng câu hỏi trùng khớp, cho phép giao bài kiểm tra
            $assignedExams = GiaoDeThi::where('maDeThi', $test->id)->pluck('maKhoi')->toArray();
    
            $templateView = 'layouts.admin.templates.test.assignExam';
            return view('layouts.admin.dashboard', compact('templateView', 'test', 'allClasses', 'assignedExams'));
        } else {
            // Nếu số lượng câu hỏi không khớp, trả về thông báo lỗi hoặc thông báo yêu cầu thêm câu hỏi
            return redirect()->back()->with('error', 'Số lượng câu hỏi trong bài kiểm tra không đủ. Hãy thêm câu hỏi vào bài kiểm tra trước khi giao bài thi.');
        }

    }


    public function addAssignExamToUser(Request $request)
    {
        $validated = $request->validate([
            'maKhoi' => 'required|exists:khois,id',
            'maDeThi' => 'required|exists:dethis,id',
        ]);
    
        GiaoDeThi::create($validated);
    
        return redirect()->route('admin.test.assign-exam', $request->maDeThi)
                         ->with('success', 'Thêm bài kiểm tra vào lớp thành công');
    }
    



}
