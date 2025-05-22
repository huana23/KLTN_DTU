<?php

namespace App\Repository;

use App\Repository\Interfaces\TestRepositoryInterface;
use App\Models\Test;
use App\Models\Subject;
use App\Models\Question;
use App\Models\ClassSubject;




/**
 * Class TestRepository
 * @package App\Repository
 */
class TestRepository implements TestRepositoryInterface
{
    protected $model;
    public function __construct(
        Test $model
    ){
        $this->model = $model;
        
    }

    public function getAllPaginate()
    {
        
        return Test::paginate(10);
    }

    public function create(array $payload = [])
    {
        
        $subject = Test::create($payload); 

        return $subject->fresh();
    } 
    public function findById($id) {
        
        return Test::find($id);
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

    public function allSubject(){
        return Subject::all();
    }

    public function getAllQuestion() {
        return Question::all();
    }

    public function getAllClass(){
        return ClassSubject::all();
    }

}