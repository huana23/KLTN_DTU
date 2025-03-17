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
        Schema::table('cauhois', function (Blueprint $table) {
            $table->foreign('maMonHoc')
                  ->references('id')->on('monhocs')
                  ->onDelete('cascade'); 

            
            $table->foreign('maMucDo')
                  ->references('id')->on('mucdokhos')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cauhois', function (Blueprint $table) {
            $table->dropForeign(['maMonHoc']);
            $table->dropForeign(['maMucDo']);
        });
    }
};
