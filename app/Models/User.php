<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'mobile',
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
    ];

    public static function adminDefaultPermissions()
    {
        return [
            'home',
            'news', 'show-blog',
            'create-news', 'store-news', 'news-list',
            'languages', 'create-languages',
            'add-category', 'show-category', 'delete-category',
            'contact-us', 'contact-uss', 'show-contactus', 'delete-contactus',
        ];
    }

    public static function repoterDefaultPermissions()
    {
        return [
            'home', 'create-news', 'news-list',
        ];
    }
}
