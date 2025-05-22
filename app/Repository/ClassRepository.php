<?php

namespace App\Repository;

use App\Repository\Interfaces\ClassRepositoryInterface;
use App\Models\ClassSubject;
use App\Models\ClassDetail;



/**
 * Class ClassRepository
 * @package App\Repository
 */
class ClassRepository implements ClassRepositoryInterface
{
    protected $model;
    public function __construct(
        ClassSubject $model
    ){
        $this->model = $model;
        
    }

    public function getAllPaginate()
    {
        return ClassSubject::paginate(10);
    }
    public function findById($id) {
        
        return ClassSubject::find($id);
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

    public function allUserClass() {
        return ClassDetail::with('user')->get();
    }
}