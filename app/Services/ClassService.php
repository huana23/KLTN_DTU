<?php

namespace App\Services;
use App\Services\Interfaces\ClassServiceInterface;

use App\Repository\Interfaces\ClassRepositoryInterface as ClassRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\ClassSubject;


/**
 * Class ClassService
 * @package App\Services
 */
class ClassService implements ClassServiceInterface
{
    protected $classRepository;

   
    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function paginate()
    {
        $tests =  $this->classRepository->getAllPaginate(); 
        return $tests;
    }
    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send']);


            $class = ClassSubject::create($payload); 
                 
            

            DB::commit(); 

            return $class->fresh(); 
            
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
            
            $class = $this->classRepository->update($id, $payload);
            
            DB::commit(); 

            return $class;

            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function destroy($id) {
        DB::beginTransaction(); 

        try {
            $class = $this->classRepository->delete($id);

            DB::commit(); 

            return $class;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }



}
