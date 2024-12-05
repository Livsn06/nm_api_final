<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /** @use HasFactory<\Database\Factories\IngredientFactory> */
    use HasFactory;

    public const TABLE_NAME = 'ingredients';

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
    ];
}
