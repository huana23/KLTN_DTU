<?php

namespace App\Http\Controllers\Client;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SubmitTestRequest;
use App\Models\ChiTietBaiLam;
use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

class ClientController extends Controller
{

    public function __construct(UserService $userService, UserRepository $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
    }
    public function index() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.home';
        return view('layouts.client.index', compact('templateView','user'));
    }


    public function viewInformation() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.information';
        return view('layouts.client.index', compact('templateView','user'));
    }

    public function viewClass()
    {
        $classUser = $this->userRepository->classUser();
        $user = Auth::user();
        $templateView = 'layouts.client.templates.class.index';

        return view('layouts.client.index', compact('templateView','user','classUser'));
    }



    public function viewClassTest($id, $subject)
    {
        $user = Auth::user();

        
        $classTests = $this->userRepository->classTest($id);
        
        
        $filteredClassTests = $classTests->filter(function ($classTest) use ($subject) {
            return $classTest->monThi == $subject;
        });

        

       
        $templateView = 'layouts.client.templates.class.test';

        
        return view('layouts.client.index', compact('templateView', 'user', 'filteredClassTests'));
    }




    public function viewResultTest($id, $subject)
    {
        $user = Auth::user();

        $classTests = $this->userRepository->classTest($id);
        $filteredClassTests = $classTests->filter(function ($classTest) use ($subject) {
            return $classTest->monThi == $subject;
        });

        

        if (is_null($filteredClassTests)) {
            $classTestIds = collect();
        } else {
            $classTestIds = $filteredClassTests->pluck('id');
        }

        $results = Result::whereIn('maDeThi', $classTestIds)->get();
        

        $templateView = 'layouts.client.templates.class.testResult';

        return view('layouts.client.index', compact('templateView', 'user', 'results', 'classTestIds','id', 'subject'));
    }

    public function testStart($id){
        $test = $this->userRepository->findByIdTest($id);
        $user = Auth::user();
        $templateView = 'layouts.client.templates.class.testStart';
        return view('layouts.client.index', compact('templateView','user','test'));
    }


    public function takeTest($id)
    {
        
        $user = Auth::user();
        
        if (!session()->has('thoiGianVaoThi')) {
            session(['thoiGianVaoThi' => now()]);
        }

        
        $soLanLamBai = Result::where('maThanhVien', $user->maThanhVien)
            ->where('maDeThi', $id)
            ->count();

        
        if ($soLanLamBai >= 1) {
            return redirect()->back()->with('error', 'Bạn đã vượt quá số lần làm bài cho phép (1 lần).');
        }

       
        $test = $this->userRepository->findByIdTest($id);
        $questions = $this->userRepository->questionInTest($id);

        $templateView = 'layouts.client.templates.class.takeTest';
        return view('layouts.client.index', compact('templateView', 'user', 'test', 'questions'));
    }


    public function successTest($id) {
        $test = $this->userRepository->findByIdTest($id);



        $user = Auth::user();
        $templateView = 'layouts.client.templates.class.successTest';
        return view('layouts.client.index', compact('templateView','user','test'));
    }


    public function submitTest(Request $request, $id)
    {
        
        $result = $this->userRepository->submitTest($request, $id);
        
        
        
        if ($result) {
            return redirect()->route('user.class.test.success-test', [
                'id' => $id
            ])->with('success', 'Nộp bài thành công!');
        } else {
           
            return back()->with('error', 'Đã xảy ra lỗi khi nộp bài.');
        }
    }

    public function viewResult()
    {
        $user = Auth::user();

        
        $result = Result::with('deThi')
            ->where('maThanhVien', $user->maThanhVien)
            ->get();


        $templateView = 'layouts.client.templates.result';

        return view('layouts.client.index', compact('templateView', 'user', 'result'));
    }


    public function viewPremium() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.premium';
        return view('layouts.client.index', compact('templateView','user'));
    }

    public function viewPremiumFunction() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.premium-function.index';
        return view('layouts.client.index', compact('templateView','user'));
    }


    public function listTest() {
        $user = Auth::user();
        $templateView = 'layouts.client.templates.premium-function.list-test';
        return view('layouts.client.index', compact('templateView','user'));
    }

    public function resultListTest($idClass, $subject, $resultId) {
        $user = Auth::user();
        
        $test = $this->userRepository->findByIdTest($resultId);
        
        $questions = $this->userRepository->questionInTest($resultId);
        
        
        $resultIds = Result::where('maDeThi', $test->id)->pluck('id');
        
        
        $completedQuestions = ChiTietBaiLam::whereIn('ketqua_id', $resultIds)->get();
        
        
        $answers = [];
        foreach ($completedQuestions as $completedQuestion) {
            $answers[$completedQuestion->cauhoi_id] = [
                'selected_answer' => $completedQuestion->dapAnDaChon,
                'correct' => $completedQuestion->correct,
            ];
        }

        $templateView = 'layouts.client.templates.premium-function.test-review';
        return view('layouts.client.index', compact('templateView', 'user', 'test', 'questions', 'answers'));
    }



    public function resultListTestFalse() {
        $user = Auth::user();

        $userMaThanhVien = Auth::user()->maThanhVien;

        $results = Result::where('maThanhVien', $userMaThanhVien)->get()->pluck('id');
        $questions = ChiTietBaiLam::with('cauhoi')
                ->whereIn('ketqua_id', $results)
                ->where('correct', 0)
                ->get();
       
        

        
        $templateView = 'layouts.client.templates.premium-function.list-question-false';
        return view('layouts.client.index', compact('templateView', 'user', 'questions'));
        
    }




}
