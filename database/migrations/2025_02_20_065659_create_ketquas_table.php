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
        Schema::create('ketquas', function (Blueprint $table) {
            $table->id();
            $table->string('maThanhVien');
            $table->unsignedBigInteger('maDeThi');
            $table->unsignedBigInteger('maCauHoi');
            $table->string('dapAn')->nullable();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ketquas');
    }
};
