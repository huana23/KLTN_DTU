<?php

namespace App\Repository;

use App\Repository\Interfaces\UserRepositoryInterface;
use App\Models\User;
use App\Models\ClassDetail;
use App\Models\GiaoDeThi;
use App\Models\CauHoiDeThi;
use App\Models\Test;
use App\Models\Question;
use App\Models\Result;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\ChiTietBaiLam;

use Carbon\Carbon;
/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(
        User $model
    ){
        $this->model = $model;
        
    }
    public function getAll()
    {
        return User::where('is_admin', 0)->paginate(10);
    }
    public function getAllPaginate()
    {
        return User::where('is_admin', 0)->paginate(15);
    }

    public function pagination(array $column = ['*'],array $condition = [],array $join = [],int $perpage =10) {
        $query = User::where('is_admin', 0)->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('hoTen', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('maThanhVien', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('diaChi', 'LIKE', '%'.$condition['keyword'].'%');
            }
        });


        if(!empty($join)){
            $query->$join(...$join);
        }
        return $query->paginate($perpage);
    }

    public function create(array $payload = [])
    {
        
        $user = User::create($payload); 

        return $user->fresh();
    }  

    public function findById($id) {
        if ($id == 1) {
            return null;
        }
    
        
        return $this->model->findOrFail($id); 
    }


    public function update(int $id, array $payload) {
        $model = $this->findById($id);
        if ($model) {
            return $model->update($payload);
        }
        return false;
    }

    public function delete(int $id = 0)  {
        return $this->findById($id)->delete($id);
    }
    
    public function classUser() {
        $user = Auth::user(); 
        
        
        $userClasses = ClassDetail::where('maThanhVien', $user->maThanhVien)
                        ->with(['subject', 'khoi'])
                        ->get();

        
        $maKhoiList = $userClasses->pluck('maKhoi')->unique();

        
        $monHocs = Subject::whereIn('maKhoi', $maKhoiList)->get();
        

        return $monHocs;
    }



    public function classTest($id)
    {
        
        $maKhois = GiaoDeThi::pluck('maKhoi'); 

        
        $matchingMaDeThi = GiaoDeThi::whereIn('maKhoi', $maKhois)->get();
        

        
        $filteredTests = $matchingMaDeThi->filter(function($item) use ($id) {
            return $item->maKhoi == $id;
        });

        
        if ($filteredTests->isNotEmpty()) {
            
            $maDeThi = $filteredTests->pluck('maDeThi');

            
            $dethiData = Test::whereIn('id', $maDeThi)->get();

            return $dethiData;
        }
    }



    public function findByIdTest($id) {
        return Test::find($id);
        
    }
    

    public function questionInTest($testId) {
        return CauHoiDeThi::with('question')->where('dethi_id', $testId)->paginate(10);


    }

    

    public function submitTest(Request $request, $id)
    {
        DB::beginTransaction();

        try {
            
            $payload = $request->except(['_token', 'send']);
            $correct = 0;
            $allAnswers = [];

            
            foreach ($payload['answers'] as $questionId => $answer) {
                $question = Question::find($questionId);

                
                $isCorrect = $question && $question->dapAn == $answer;
                if ($isCorrect) {
                    $correct++;
                }

                
                $allAnswers[] = [
                    'question_id' => $questionId,
                    'answer' => $answer,
                    'correct' => $isCorrect,
                ];
            }

            
            $totalQuestions = CauHoiDeThi::where('dethi_id', $id)->count();
            $score = round(($correct / max($totalQuestions, 1)) * 10, 2);

           
            $thoiGianVaoThi = session('thoiGianVaoThi', Carbon::now());
            $thoiGianVaoThi = Carbon::parse($thoiGianVaoThi)->timezone('Asia/Ho_Chi_Minh');

            
            $thoiGianLamBai = $request->input('thoiGianLamBai');

            
            $payload['maThanhVien'] = Auth::user()->maThanhVien;
            $payload['maDeThi'] = $id;
            $payload['thoiGianLamBai'] = $thoiGianLamBai;
            $payload['soCauDung'] = $correct;
            $payload['diemThi'] = $score;
            $payload['thoiGianVaoThi'] = $thoiGianVaoThi->toDateTimeString();

            
            $request->merge([
                'thoiGianVaoThi' => $thoiGianVaoThi,
                'thoiGianLamBai' => $thoiGianLamBai,
            ]);

            
            $result = Result::create($payload);

            foreach ($allAnswers as $item) {
            ChiTietBaiLam::create([
                'ketqua_id'     => $result->id, 
                'cauhoi_id'     => $item['question_id'],
                'dapAnDaChon'   => $item['answer'],
                'correct'       => $item['correct'],
            ]);
        }
            
            session()->forget('thoiGianVaoThi');
            
            DB::commit();

           
            return $result;
        } catch (\Exception $e) {
            
            DB::rollBack();
            Log::error('Lỗi lưu kết quả: ' . $e->getMessage());
            return false;
        }
    }



    
}
