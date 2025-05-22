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
        Schema::create('chi_tiet_bai_lam', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('ketqua_id');

            
            $table->unsignedBigInteger('cauhoi_id');

            
            $table->string('dapAnDaChon');

            
            $table->boolean('correct')->default(false);


            
            $table->foreign('ketqua_id')->references('id')->on('ketquas')->onDelete('cascade');
            $table->foreign('cauhoi_id')->references('id')->on('cauhois')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_bai_lam');
    }
};
