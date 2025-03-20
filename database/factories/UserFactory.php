<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Bắt đầu giao dịch
        DB::beginTransaction();

        try {
            $maThanhVien = fake()->randomNumber(3, true);

            
            $user = [
                'email' => fake()->unique()->safeEmail(),
                'maThanhVien' => $maThanhVien,  // Mã thành viên theo số thứ tự
                'password' => Hash::make('password'), // Mã hóa mật khẩu
                'hoTen' => $this->faker->name(),  // Tên giả
                'dienThoai' => $this->faker->phoneNumber(), // Số điện thoại giả
                'gioiTinh' => $this->faker->boolean(), // Giới tính ngẫu nhiên
                'ngaySinh' => $this->faker->date(), // Ngày sinh giả
                'diaChi' => $this->faker->address(), // Địa chỉ giả
                'is_admin' => $this->faker->boolean(0), // Mặc định `is_admin` là 0
            ];

            // Chèn bản ghi người dùng vào cơ sở dữ liệu
            DB::table('users')->insert($user);

            // Commit giao dịch nếu không có lỗi
            DB::commit();

            return $user; // Trả về dữ liệu người dùng đã tạo
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback giao dịch để đảm bảo dữ liệu không bị hỏng
            DB::rollBack();
            throw $e; // Ném lại ngoại lệ để có thể xử lý lỗi
        }
    }

    

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}

