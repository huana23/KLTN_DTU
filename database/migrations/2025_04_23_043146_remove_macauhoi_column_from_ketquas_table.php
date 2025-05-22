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
            $table->dropForeign(['maCauHoi']);

            
            $table->dropColumn('maCauHoi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ketquas', function (Blueprint $table) {
            $table->unsignedBigInteger('maCauHoi')->nullable();

            $table->foreign('maCauHoi')
                  ->references('id')->on('cauhois')
                  ->onDelete('cascade');
        });
    }
};

