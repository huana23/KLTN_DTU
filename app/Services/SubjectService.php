<?php

namespace App\Services;
use App\Services\Interfaces\SubjectServiceInterface;

use App\Repository\Interfaces\SubjectRepositoryInterface as SubjectRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Subject;

/**
 * Class SubjectService
 * @package App\Services
 */
class SubjectService implements SubjectServiceInterface
{
    protected $subjectRepository;

   
    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }
    public function paginate()
    {
        $tests =  $this->subjectRepository->getAllPaginate(); 
        return $tests;
    }

    public function classSubject() {
        $classes =  $this->subjectRepository->getAllClass(); 
        return $classes;
    }
    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send']);

            
            
            
            $subject = Subject::create($payload); 
            
            

            
            

            DB::commit(); 

            return $subject->fresh(); 
            
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
            
            $subject = $this->subjectRepository->update($id, $payload);
            
            DB::commit(); 

            return $subject;

            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function destroy($id) {
        DB::beginTransaction(); 

        try {
            $subject = $this->subjectRepository->delete($id);

            DB::commit(); 

            return $subject;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }
}
