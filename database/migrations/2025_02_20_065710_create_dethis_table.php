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
        Schema::create('dethis', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ngayThi')->unique();
            $table->integer('thoiGianThi')->unique();
            $table->integer('soLuongCauHoi')->unique();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dethis');
    }
};
