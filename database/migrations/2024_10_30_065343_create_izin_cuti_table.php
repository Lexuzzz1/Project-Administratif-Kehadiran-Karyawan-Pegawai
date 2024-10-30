<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('izin_cuti', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('department');
        $table->string('position');
        $table->string('alasan_izin');
        $table->date('tanggal_awal');
        $table->date('tanggal_akhir');
        $table->string('berkas')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izin_cuti');
    }
};
