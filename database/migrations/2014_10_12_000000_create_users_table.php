<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
<<<<<<< HEAD
     */
    public function up(): void
=======
     *
     * @return void
     */
    public function up()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
<<<<<<< HEAD
            $table->enum('role', ['admin', 'manajer', 'supervisor', 'pegawai'])->default('pegawai');
=======
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
<<<<<<< HEAD
     */
    public function down(): void
=======
     *
     * @return void
     */
    public function down()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        Schema::dropIfExists('users');
    }
};
