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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('maThanhVien')->unique();
            $table->string('hoTen')->nullable();
            $table->string('dienThoai')->nullable();
            $table->boolean('gioiTinh')->nullable();
            $table->dateTime('ngaySinh')->nullable();
            $table->string('diaChi')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('img')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
