<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\ClassServiceInterface as ClassService;
use App\Repository\Interfaces\ClassRepositoryInterface as ClassRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\UpdateClassRequest;
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository;
use App\Repository\UserRepository as RepositoryUserRepository;
use App\Models\ClassDetail;
use Illuminate\Support\Facades\DB;


class ClassController extends Controller
{
    protected $classService;
    protected $classRepository;
    protected $userRepository;

    public function __construct(
        ClassService $classService,
        ClassRepository $classRepository,
        UserRepository $userRepository
    )
    {
        $this->classService = $classService;
        $this->classRepository = $classRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        
        $allClass = $this->classService->paginate();

        $studentCounts = DB::table('chitietkhoi')->select('maKhoi', DB::raw('count(*) as count'))->groupBy('maKhoi')->pluck('count', 'maKhoi'); 
        $users = Auth::user();

        
        $templateView = 'layouts.admin.templates.class.index';

        
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'allClass', 'studentCounts'));
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

    public function update($id,UpdateClassRequest $request) {

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

    public function listUser($id){
        $oneClass = $this->classRepository->findById($id);
        $allUser = ClassDetail::where('maKhoi', $id)->with('user')->get();
        $users = Auth::user();
        $templateView = 'layouts.admin.templates.class.classList';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'oneClass', 'allUser'));
    }
    public function addStudentToClass($id){
        $users =  $this->userRepository->getAll();
        $class = $this->classRepository->findById($id);
        
        
        $studentsInClass = ClassDetail::where('maKhoi', $id)->pluck('maThanhVien')->toArray();
        
        $templateView = 'layouts.admin.templates.class.addUserToClass';
        return view('layouts.admin.dashboard', compact('templateView', 'users', 'class', 'studentsInClass'));
    }
    

    public function storeStudentToClass(Request $request){
        $payload = $request->all();
        ClassDetail::create($payload);
        
        return redirect()->route('admin.class.list-class', $request->maKhoi)->with('success', 'Thêm thành viên thành công');
    }

    public function removeStudent($maKhoi, $maThanhVien)
    {
        $deleted = ClassDetail::where('maKhoi', $maKhoi)
                            ->where('maThanhVien', $maThanhVien)
                            ->delete();

        if ($deleted) {
            return redirect()->back()->with('success', 'Đã xóa thành viên khỏi lớp.');
        }

        return redirect()->back()->with('error', 'Không tìm thấy thành viên trong lớp này.');
    }







}
