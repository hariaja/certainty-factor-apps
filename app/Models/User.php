<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Uuid;
use App\Helpers\Enums\RoleType;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasApiTokens,
    HasFactory,
    Notifiable,
    HasRoles,
    Uuid;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'uuid',
    'name',
    'email',
    'password',
    'avatar',
    'status',
  ];

  /**
   * Get the route key for the model.
   */
  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

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
   * Cek if user have avatar or not.
   *
   * @return bool
   */
  public function userHasAvatar(): bool
  {
    if ($this->avatar) {
      return true;
    }

    return false;
  }

  /**
   * Get user default user avatar.
   *
   * @return void
   */
  public function getUserAvatar()
  {
    if (!$this->userHasAvatar()) {
      return asset('assets/images/placeholders/default-avatar.png');
    }

    return Storage::url($this->avatar);
  }

  /**
   * Get the user role name.
   */
  public function getRoleName(): string
  {
    return $this->roles->implode('name');
  }

  /**
   * Get the user role id.
   */
  public function getRoleId(): int
  {
    return (int) $this->roles->implode('id');
  }

  /**
   * Get all user except :value
   *
   * @param  mixed $query
   * @return void
   */
  public function scopeWhereNotAdmin($query)
  {
    return $query->whereDoesntHave('roles', function ($row) {
      $row->where('name', RoleType::ADMIN->value);
    });
  }

  /**
   * Define badge type roles.
   *
   * @return string
   */
  public function getRoleBadge(): string
  {
    $roleName = $this->getRoleName();

    switch ($roleName) {
      case RoleType::ADMIN->value:
        $badgeClass = 'badge text-smooth';
        break;
      case RoleType::OFFICER->value:
        $badgeClass = 'badge text-info';
        break;
      case RoleType::USER->value:
        $badgeClass = 'badge text-warning';
        break;
      default:
        $badgeClass = 'badge';
        break;
    }

    return "<span class='{$badgeClass}'>{$roleName}</span>";
  }

  /**
   * Relation to client model.
   *
   * @return HasOne
   */
  public function client(): HasOne
  {
    return $this->hasOne(Client::class, 'user_id');
  }
}
