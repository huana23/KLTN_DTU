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
        Schema::create('cauhoi_dethi', function (Blueprint $table) {
            $table->unsignedBigInteger('cauhoi_id');
            $table->unsignedBigInteger('dethi_id');

            $table->foreign('cauhoi_id')->references('id')->on('cauhois')->onDelete('cascade');
            $table->foreign('dethi_id')->references('id')->on('dethis')->onDelete('cascade');

            $table->primary(['cauhoi_id', 'dethi_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cauhoi_dethi');
    }
};
