<?php

namespace App\Repository;

use App\Repository\Interfaces\QuestionRepositoryInterface;
use App\Models\Question;
use App\Models\Level;
use App\Models\Subject;



/**
 * Class QuestionRepository
 * @package App\Repository
 */
class QuestionRepository implements QuestionRepositoryInterface
{
    protected $model;
    public function __construct(
        Question $model
    ){
        $this->model = $model;
        
    }
    public function getAllPaginate()
    {

        $questions = Question::with(['mucDo', 'monHoc'])->paginate(10);
        return $questions;
    }

    public function getAllNameSubjects(){
        return Subject::select('id', 'tenMonHoc')->get();
    }

    public function allLevel() {
        return Level::select('id', 'tenMucDo')->get();
        
    }

    public function findById($id) {
        
        return Question::find($id);
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
    
}