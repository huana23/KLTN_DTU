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

    public function getAllPaginate()
    {
        return User::where('is_admin', 0)->paginate(15);
    }

    public function create(array $payload = [])
    {
        
        $user = User::create($payload); 
        return $user->fresh();
    }  
}
