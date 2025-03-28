<?php

namespace App\Services;
use App\Services\Interfaces\QuestionServiceInterface;

use App\Repository\Interfaces\QuestionRepositoryInterface as QuestionRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Question;


/**
 * Class QuestionService
 * @package App\Services
 */
class QuestionService implements QuestionServiceInterface
{
    protected $questionRepository;

   
    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }


    public function paginate()
    {
        $questions =  $this->questionRepository->getAllPaginate(); 
        return $questions;
    }

    public function classNameSubject() {
        $allNameSubjects = $this->questionRepository->getAllNameSubjects();
        return $allNameSubjects;
    }

    public function allLevel() {
        $allLevel = $this->questionRepository->allLevel();
        return $allLevel;
    }

    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send']);

            
            
            $question = Question::create($payload); 
            
            

            
            

            DB::commit(); 

            return $question->fresh(); 
            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error creating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function allQuestion() {
        return Question::all();
    }

    public function update($id, $request) 
    {
        DB::beginTransaction(); 

        try {
            

            $payload = $request->except(['_token', 'send']);
            
            $question = $this->questionRepository->update($id, $payload);
            
            DB::commit(); 

            return $question;

            
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function destroy($id) {
        DB::beginTransaction(); 

        try {
            $question = $this->questionRepository->delete($id);

            DB::commit(); 

            return $question;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }
}