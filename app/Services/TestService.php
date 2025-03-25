<?php

namespace App\Services;
use App\Services\Interfaces\TestServiceInterface;
use App\Repository\Interfaces\TestRepositoryInterface as TestRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class TestService
 * @package App\Services
 */
class TestService implements TestServiceInterface
{
    
    protected $testRepository;

   
    public function __construct(TestRepository $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function paginate($request)
    {
        
        $columns = ['ngayThi', 'thoiGianThi', 'soLuongCauHoi','tenBaiThi','id'];

        
        $paginatedResults = $this->testRepository->pagination($columns);

        
        $paginatedResults->getCollection()->transform(function ($item) {
            
            if (!empty($item->ngayThi)) {
                $item->ngayThi = Carbon::parse($item->ngayThi)->format('d-m-Y');
            }
            return $item;
        });

        return $paginatedResults;
    }


    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send']);

            if (isset($payload['ngayThi'])) {
                $payload['ngayThi'] = Carbon::createFromFormat('Y-m-d', $payload['ngayThi'])->format('d/m/Y');
            }
    
            
            // dd($payload);

            $test = $this->testRepository->create($payload);
        

            
            

            DB::commit(); 

            return $test;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error creating user: ' . $e->getMessage());
            return false; 
        }
    }

    
}
