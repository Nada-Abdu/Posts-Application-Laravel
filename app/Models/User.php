<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserRoles;
use Illuminate\Console\Command;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        // 'user_image'
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

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function comments()
    {
        return $this->hasMany(Command::class);
    }

    public function isAdmin()
    {
        $user = auth()->user();
        $userRole = Role::where('name',  UserRoles::Admin)->first();
        $hasRole = $user->roles->where('id', $userRole->id);
        return !$hasRole->isEmpty();
    }

    public function isWebUser()
    {
        $user = auth()->user();
        $userRole = Role::where('name',  UserRoles::User)->first();
        $hasRole = $user->roles->where('id', $userRole->id);
        return !$hasRole->isEmpty();
    }
}
