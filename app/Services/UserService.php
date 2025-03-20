<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\UserServiceInterface;
use App\Repository\Interfaces\UserRepositoryInterface as UserRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;

   
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    
    public function paginate()
    {
        return $this->userRepository->getAllPaginate();
    }

   
    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send', 're_password']);


            
            $payload['password'] = Hash::make($payload['password']);
            
            
            $user = $this->userRepository->create($payload);


            $file = $payload['img'];
            $destinationPath = public_path('uploads');
            $filename = time() . '_' . $file->getClientOriginalName(); 

            
            if ($file->move($destinationPath, $filename)) {
                echo "File upload success";

                
                $path = 'uploads/' . $filename ;

                
                $user->img = $path;
                $user->save();

               

            } else {
                echo "File upload error";
            }

            DB::commit(); 

            return $user;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error creating user: ' . $e->getMessage());
            return false; 
        }
    }

}

