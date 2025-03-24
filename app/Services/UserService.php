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

    
    public function paginate($request)
    {

        $condition['keyword'] = addslashes($request->input('keyword')) ;
        $users =  $this->userRepository->pagination(['id', 'hoTen', 'email','diaChi','maThanhVien','img'], $condition); 
        return $users;
    }

   
    public function create($request) 
    {
        DB::beginTransaction(); 

        try {
            $payload = $request->except(['_token', 'send', 're_password']);

            
            $payload['password'] = Hash::make($payload['password']);
            
            
            $user = $this->userRepository->create($payload);

            
            if (!$user) {
                throw new \Exception('Failed to create user');
            }

            
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $destinationPath = public_path('uploads');
                $filename = time() . '_' . $file->getClientOriginalName(); 

                
                if ($file->move($destinationPath, $filename)) {
                    echo "File upload success";

                    
                    $path = 'uploads/' . $filename;
                    $user->img = $path;
                    $user->save();
                } else {
                    echo "File upload error";
                }
            }

            DB::commit(); 

            return $user;  
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

            
            if ($request->hasFile('img')) {
                $file = $request->file('img');
                $destinationPath = public_path('uploads');
                $filename = time() . '_' . $file->getClientOriginalName();

                
                if ($file->move($destinationPath, $filename)) {
                    echo "File upload success";

                   
                    $path = 'uploads/' . $filename;
                    $payload['img'] = $path;
                } else {
                    echo "File upload error";
                }
            }

            
            $user = $this->userRepository->update($id, $payload);

            DB::commit(); 

            return $user;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }

    public function destroy($id) {
        DB::beginTransaction(); 

        try {
            $user = $this->userRepository->delete($id);

            DB::commit(); 

            return $user;  
        } catch (\Exception $e) {
            DB::rollBack(); 
            Log::error('Error updating user: ' . $e->getMessage());
            return false; 
        }
    }
}

