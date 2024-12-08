<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @use HasFactory<\Database\Factories\RatingFactory> */
    use HasFactory;

    public const TABLE_NAME = 'ratings';
    public const COLUMN_ID = 'id';
    public const COLUMN_RATE = 'rate';
    public const COLUMN_REMEDY_ID = 'remedy_id';
    public const COLUMN_USER_ID = 'user_id';

    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_RATE,
        self::COLUMN_REMEDY_ID,
        self::COLUMN_USER_ID,
    ];

    public function user()
    {
        return $this->hasOne(User::class, self::COLUMN_USER_ID, User::COLUMN_ID);
    }

    public function remedy()
    {
        return $this->hasOne(Remedy::class, self::COLUMN_REMEDY_ID, Remedy::COLUMN_ID);
    }
}
