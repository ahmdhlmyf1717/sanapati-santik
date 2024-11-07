<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('no_register')->unique();
            $table->date('tanggal_diterima');
            $table->string('asal_surat');
            $table->string('nomor_surat')->unique();
            $table->string('perihal');
            $table->string('ditujukan');
            $table->date('tanggal_diteruskan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('file_path')->nullable(); // Untuk path file surat yang diunggah
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
