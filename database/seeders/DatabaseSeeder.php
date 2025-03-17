<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $user = new User;
        $user->hoTen = 'admin';
        $user->gioiTinh = true;
        $user->email = 'admin@gmail.com';
        $user->maThanhVien = '001';
        $user->dienThoai = '0905775301';
        $user->password = bcrypt('123456');
        $user->is_admin = true;
        $user->save();

        $user = new User;
        $user->hoTen = 'user';
        $user->gioiTinh = false;
        $user->maThanhVien = '002';
        $user->dienThoai = '0905775301';
        $user->gioiTinh = true;
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('123456');
        $user->is_admin = false;
        $user->save();


    }
}
