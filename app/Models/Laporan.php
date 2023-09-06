<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
  use HasFactory;

  protected $fillable = ['tanggapan', 'berkas_id', 'user_id'];

  /**
   * Get the berkas that owns the Laporan
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function berkas(): BelongsTo
  {
    return $this->belongsTo(Berkas::class, 'berkas_id', 'id');
  }

  /**
   * Get the user that owns the Laporan
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }
}
