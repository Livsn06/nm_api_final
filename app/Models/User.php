<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    public const TABLE_NAME = 'users';

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_EMAIL = 'email';
    public const COLUMN_PASSWORD = 'password';
    public const COLUMN_ROLE = 'role';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_AVATAR = 'avatar';
    public const COLUMN_PHONE = 'phone';
    public const COLUMN_ADDRESS = 'address';
    public const COLUMN_GENDER = 'gender';
    public const COLUMN_BIRTHDAY = 'birthday';
    public const COLUMN_EMAIL_VERIFIED_AT = 'email_verified_at';
    public const COLUMN_REMEMBER_TOKEN = 'remember_token';


    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_EMAIL,
        self::COLUMN_PASSWORD,
        self::COLUMN_ROLE,
        self::COLUMN_STATUS,
        self::COLUMN_AVATAR,
        self::COLUMN_PHONE,
        self::COLUMN_ADDRESS,
        self::COLUMN_GENDER,
        self::COLUMN_BIRTHDAY
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::COLUMN_PASSWORD,
        self::COLUMN_REMEMBER_TOKEN,
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            self::COLUMN_EMAIL_VERIFIED_AT => 'datetime',
            self::COLUMN_PASSWORD => 'hashed',
        ];
    }
}
