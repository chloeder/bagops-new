<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
  ];

  /**
   * Get the role that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function role(): BelongsTo
  {
    return $this->belongsTo(Role::class, 'role_id', 'id');
  }

  /**
   * Get the satker that owns the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function satker(): BelongsTo
  {
    return $this->belongsTo(SatuanKerja::class, 'satker_id', 'id');
  }

  /**
   * Get all of the berkas for the User
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function berkas(): HasMany
  {
    return $this->hasMany(Berkas::class, 'user_id', 'id');
  }
}
