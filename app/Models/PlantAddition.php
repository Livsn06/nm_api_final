<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantAddition extends Model
{
    /** @use HasFactory<\Database\Factories\PlantAdditionFactory> */
    use HasFactory;

    public const TABLE_NAME = 'plant_additions';
    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_SCIENTIFIC_NAME = 'scientific_name';
    public const COLUMN_DESCRIPTION = 'description';
    public const COLUMN_IMAGE = 'image';

    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_SCIENTIFIC_NAME,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_IMAGE,
    ];
}
