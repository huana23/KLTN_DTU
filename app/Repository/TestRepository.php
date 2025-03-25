<?php

namespace App\Repository;

use App\Repository\Interfaces\TestRepositoryInterface;
use App\Models\Test;

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
    public function pagination(array $columns, $perPage = 5)
    {
        return Test::select($columns)->paginate($perPage);
    }

    public function create(array $payload = [])
    {
        $test = Test::create($payload); 
        
        return $test->fresh();
    } 

    public function findById($id) {
        return $this->model->findOrFail($id); 
    }

    
}