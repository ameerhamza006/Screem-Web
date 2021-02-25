<?php

namespace App\Models;

use App\Util\FileHandling;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use FileHandling;
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'f_name',
        'email',
        'password',
        'phone_no',
        'address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        return $this->getObject($value);
    }

    public function getOriginalImageAttribute()
    {
        return $this->attributes['image'];
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function statusList()
    {
        return $this->hasMany(Status::class);
    }

    public function transactions()
    {
        return $this->hasMany(Cradit::class);
    }

    public function hasMatchingTokens(string $token): bool
    {
        return $this->tokens()->filter(function ($value) use ($token) {
            return $token === $value;
        });
    }
}
