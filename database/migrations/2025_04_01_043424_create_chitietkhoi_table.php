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
        Schema::create('chitietkhoi', function (Blueprint $table) {
            $table->string('maThanhVien'); 
            $table->unsignedBigInteger('maKhoi'); 
            $table->timestamps();

            
            $table->primary(['maThanhVien', 'maKhoi']);

           
            $table->foreign('maThanhVien')->references('maThanhVien')->on('users')->onDelete('cascade');
            $table->foreign('maKhoi')->references('id')->on('khois')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chitietkhoi');
    }
};
