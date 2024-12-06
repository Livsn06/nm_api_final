<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemedyIngredient extends Model
{
    /** @use HasFactory<\Database\Factories\RemedyIngredientFactory> */
    use HasFactory;

    public const TABLE_NAME = 'remedy_ingredients';
    public const COLUMN_ID = 'id';
    public const COLUMN_REMEDY_ID = 'remedy_id';
    public const COLUMN_INGREDIENT_ID = 'ingredient_id';
    public const COLUMN_DESCRIPTION = 'description';

    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_REMEDY_ID,
        self::COLUMN_INGREDIENT_ID,
        self::COLUMN_DESCRIPTION
    ];

    public function remedy()
    {
        return $this->belongsTo(Remedy::class, Remedy::COLUMN_ID, RemedyIngredient::COLUMN_REMEDY_ID);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class,  Ingredient::COLUMN_ID, RemedyIngredient::COLUMN_INGREDIENT_ID);
    }
}
