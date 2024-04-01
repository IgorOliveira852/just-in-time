<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
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
    protected $guarded = [];

    protected $fillable = [
        'name',
        'phone',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'login_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'role' => UserRoleEnum::class,
    ];

    public function routeNotificationForTwilio()
    {
        return $this->phone;
    }

    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    public function isAdminOrAttendant(): bool
    {
        return in_array($this->role, [UserRoleEnum::ADMIN->value, UserRoleEnum::ATTENDANT->value]);
    }

    public function isClient(): bool
    {
        return $this->role === UserRoleEnum::CLIENT->value;
    }
}
