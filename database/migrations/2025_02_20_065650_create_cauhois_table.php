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
        Schema::create('cauhois', function (Blueprint $table) {
            $table->id();
            $table->string('cauHoi')->nullable();
            $table->string('dapAnA')->nullable();
            $table->string('dapAnB')->nullable();
            $table->string('dapAnC')->nullable();
            $table->string('dapAnD')->nullable();
            $table->string('dapAn')->nullable();
            $table->string('ghiChu')->nullable();

            $table->unsignedBigInteger('maMonHoc')->nullable();  
            $table->unsignedBigInteger('maMucDo')->nullable();   

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauhois');
    }
};
