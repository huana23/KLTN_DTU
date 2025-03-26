<?php

namespace App\Repository;

use App\Repository\Interfaces\SubjectRepositoryInterface;
use App\Models\Subject;
use App\Models\ClassSubject;


/**
 * Class SubjectRepository
 * @package App\Repository
 */
class SubjectRepository implements SubjectRepositoryInterface
{
    protected $model;
    public function __construct(
        Subject $model
    ){
        $this->model = $model;
        
    }

    public function getAllPaginate()
    {
        return Subject::all();
    }

    public function getAllClass() {
        return ClassSubject::all();
    }
    public function create(array $payload = [])
    {
        
        $subject = Subject::create($payload); 

        return $subject->fresh();
    } 

    public function findById($id) {
        
        return Subject::find($id);
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