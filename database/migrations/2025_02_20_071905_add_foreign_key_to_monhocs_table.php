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
        Schema::table('monhocs', function (Blueprint $table) {
            $table->foreign('maKhoi')
                  ->references('id')->on('khois')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('monhocs', function (Blueprint $table) {
            $table->dropForeign(['maKhoi']);
        });
    }
};
