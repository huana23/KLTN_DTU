<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Test;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Test>
 */
class TestFactory extends Factory
{
    protected $model = Test::class;

    public function definition(): array
    {
        DB::beginTransaction();

        try {
            
            $test = [
                'ngayThi' => $this->faker->date(),
                'thoiGianThi' => $this->faker->numberBetween(10, 100),  
                'soLuongCauHoi' => $this->faker->numberBetween(10, 100),
                'tenBaiThi' => $this->faker->sentence(),
            ];

            // Chèn bản ghi vào cơ sở dữ liệu
            DB::table('dethis')->insert($test);

            // Commit giao dịch nếu không có lỗi
            DB::commit();

            return $test; // Trả về dữ liệu người dùng đã tạo
        } catch (\Exception $e) {
            // Nếu có lỗi, rollback giao dịch để đảm bảo dữ liệu không bị hỏng
            DB::rollBack();
            throw $e; // Ném lại ngoại lệ để có thể xử lý lỗi
        }
    }
}
