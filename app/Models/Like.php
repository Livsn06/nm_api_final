<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /** @use HasFactory<\Database\Factories\LikeFactory> */
    use HasFactory;

    public const TABLE_NAME = 'likes';

    public const COLUMN_ID = 'id';
    public const COLUMN_LIKE = 'like';
    public const COLUMN_PLANT_ID = 'plant_id';
    public const COLUMN_USER_ID = 'user_id';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_ID,
        self::COLUMN_LIKE,
        self::COLUMN_PLANT_ID,
        self::COLUMN_USER_ID,
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function plant()
    {
        return $this->belongsTo(Plant::class, Like::COLUMN_PLANT_ID, Plant::COLUMN_ID);
    }
}
