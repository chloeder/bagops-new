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
    Schema::table('users', function (Blueprint $table) {
      $table->unsignedBigInteger('satker_id');

      $table->foreign('satker_id')->references('id')->on('satuan_kerjas');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::table('users', function (Blueprint $table) {
      $table->dropForeign('users_satker_id_foreign');
      $table->dropColumn('satker_id');
    });
  }
};
