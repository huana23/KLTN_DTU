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
        Schema::create('giaodethi', function (Blueprint $table) {
            $table->unsignedBigInteger('maKhoi'); // Khóa ngoại từ bảng khois
            $table->unsignedBigInteger('maDeThi'); // Khóa ngoại từ bảng dethis
            $table->timestamps();

            // Thiết lập khóa chính là cặp (maKhoi, maDeThi)
            $table->primary(['maKhoi', 'maDeThi']);

            // Thiết lập khóa ngoại
            $table->foreign('maKhoi')->references('id')->on('khois')->onDelete('cascade');
            $table->foreign('maDeThi')->references('id')->on('dethis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('giaodethi');
    }
};
