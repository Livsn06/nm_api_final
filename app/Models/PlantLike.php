<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantLike extends Model
{
    /** @use HasFactory<\Database\Factories\PlantLikeFactory> */
    use HasFactory;

    public const TABLE_NAME = 'plant_likes';

    public const COLUMN_ID = 'id';
    public const COLUMN_PLANT_ID = 'plant_id';
    public const COLUMN_LIKE_ID = 'like_id';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_LIKE_ID,
        self::COLUMN_PLANT_ID,
    ];
}
