<?php

namespace App\Services;
use App\Services\Interfaces\TestServiceInterface;

use App\Repository\Interfaces\TestRepositoryInterface as TestRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Test;

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

    public function paginate()
    {
        $tests =  $this->testRepository->getAllPaginate(); 
        return $tests;
    }
    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send']);

            $test = Test::create($payload); 
                 
            

            DB::commit(); 

            return $test->fresh(); 
            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error creating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function update($id, $request) 
    {
        DB::beginTransaction(); 

        try {
            

            $payload = $request->except(['_token', 'send']);
            
            $test = $this->testRepository->update($id, $payload);
            
            DB::commit(); 

            return $test;

            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function destroy($id) {
        DB::beginTransaction(); 
    
        try {
            
            $test = $this->testRepository->findById($id);
    
           
            if (!$test) {
                throw new \Exception("Bài kiểm tra không tồn tại."); 
            }
    
            
            DB::table('ketquas')->where('maDeThi', $id)->delete();
    
            
            $test->delete();
    
            DB::commit();
    
            return true; 
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting test: ' . $e->getMessage());
            return false; 
        }
    }
    

    

}