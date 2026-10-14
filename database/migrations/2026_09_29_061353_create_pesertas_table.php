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
        Schema::create('skemas', function (Blueprint $table) {
            $table->id();
            $table->string('kode_skema')->unique()->nullable();
            $table->string('nama_skema');
            $table->string('deskripsi_skema')->nullable();
            $table->timestamps();
        });


        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('skema_id')->nullable()->constrained('skemas')->onDelete('cascade');
            $table->string('nama');
            $table->string('nik')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('no_hp')->nullable();
            $table->string('instansi')->nullable();
            $table->string('status')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
        Schema::dropIfExists('skemas');
    }
};
