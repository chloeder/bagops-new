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
    Schema::create('berkas', function (Blueprint $table) {
      $table->id();
      $table->string('kode_berkas');
      $table->string('judul');
      $table->string('lokasi');
      $table->string('pemimpin_lapangan');
      $table->string('tanggal_laporan');
      $table->string('keterangan');
      $table->string('file');
      $table->string('status')->default('Diproses');

      $table->unsignedBigInteger('kategori_id');
      $table->unsignedBigInteger('user_id');
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('kategori_id')->references('id')->on('kategoris');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('berkas');
  }
};
