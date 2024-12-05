<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemedyRating extends Model
{
    /** @use HasFactory<\Database\Factories\RemedyRatingFactory> */
    use HasFactory;

    public const TABLE_NAME = 'remedy_ratings';

    public const COLUMN_ID = 'id';
    public const COLUMN_REMEDY_ID = 'remedy_id';
    public const COLUMN_RATING_ID = 'rating_id';


    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_REMEDY_ID,
        self::COLUMN_RATING_ID,
    ];
}
