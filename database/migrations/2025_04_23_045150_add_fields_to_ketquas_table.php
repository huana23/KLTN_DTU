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
        Schema::table('ketquas', function (Blueprint $table) {
            $table->float('diemThi')->nullable()->after('maDeThi');
            $table->dateTime('thoiGianVaoThi')->nullable()->after('diemThi');
            $table->integer('thoiGianLamBai')->nullable()->after('thoiGianVaoThi');
            $table->integer('soCauDung')->nullable()->after('thoiGianLamBai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketquas', function (Blueprint $table) {
            $table->dropColumn(['diemThi', 'thoiGianVaoThi', 'thoiGianLamBai', 'soCauDung']);
        });
    }
};
