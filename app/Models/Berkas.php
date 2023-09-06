<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Berkas extends Model
{
  use HasFactory;

  protected $fillable = [
    'kode_berkas',
    'judul',
    'lokasi',
    'pemimpin_lapangan',
    'tanggal_laporan',
    'keterangan',
    'file',
    'user_id',
    'kategori_id'
  ];

  /**
   * Get the kategori that owns the Berkas
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function kategori(): BelongsTo
  {
    return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
  }

  /**
   * Get the user that owns the Berkas
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_id', 'id');
  }

  /**
   * Get all of the laporan for the Berkas
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function laporan(): HasMany
  {
    return $this->hasMany(Laporan::class, 'berkas_id', 'id');
  }
}
