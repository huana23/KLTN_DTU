<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('ketquas', function (Blueprint $table) {
            // Thêm khóa ngoại cho cột maThanhVien
            $table->foreign('maThanhVien')
                  ->references('maThanhVien')->on('users')
                  ->onDelete('cascade'); // Khi xóa người dùng, kết quả cũng bị xóa

            // Thêm khóa ngoại cho cột maDeThi
            $table->foreign('maDeThi')
                  ->references('id')->on('dethis')
                  ->onDelete('cascade'); // Khi xóa đề thi, kết quả cũng bị xóa

            // Thêm khóa ngoại cho cột maCauHoi
            $table->foreign('maCauHoi')
                  ->references('id')->on('cauhois')
                  ->onDelete('cascade'); // Khi xóa câu hỏi, kết quả cũng bị xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketquas', function (Blueprint $table) {
            $table->dropForeign(['maThanhVien']);
            $table->dropForeign(['maDeThi']);
            $table->dropForeign(['maCauHoi']);
        });
    }
};
