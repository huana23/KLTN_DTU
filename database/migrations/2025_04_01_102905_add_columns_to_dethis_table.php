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
        Schema::table('dethis', function (Blueprint $table) {
            $table->dateTime('ngayKetThucThi')->nullable();
            $table->string('monThi')->nullable();
            $table->boolean('trangThai')->default(true)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dethis', function (Blueprint $table) {
            $table->dropColumn(['ngayKetThucThi', 'monThi', 'trangThai']);
        });
    }
};
