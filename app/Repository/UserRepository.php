<?php

namespace App\Repository;

use App\Repository\Interfaces\UserRepositoryInterface;
use App\Models\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(
        User $model
    ){
        $this->model = $model;
        
    }
    public function getAllPaginate()
    {
        return User::where('is_admin', 0)->paginate(15);
    }

    public function pagination(array $column = ['*'],array $condition = [],array $join = [],int $perpage =10) {
        $query = User::where('is_admin', 0)->select($column)->where(function($query) use ($condition){
            if(isset($condition['keyword']) && !empty($condition['keyword'])) {
                $query->where('hoTen', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('maThanhVien', 'LIKE', '%'.$condition['keyword'].'%')
                        ->orWhere('diaChi', 'LIKE', '%'.$condition['keyword'].'%');
            }
        });


        if(!empty($join)){
            $query->$join(...$join);
        }
        return $query->paginate($perpage);
    }

    public function create(array $payload = [])
    {
        
        $user = User::create($payload); 

        return $user->fresh();
    }  

    public function findById($id) {
        if ($id == 1) {
            return null;
        }
    
        
        return $this->model->findOrFail($id); 
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
