<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemedyPlant extends Model
{
    /** @use HasFactory<\Database\Factories\RemedyPlantFactory> */
    use HasFactory;

    public const TABLE_NAME = 'remedy_plant';
    public const COLUMN_ID = 'id';
    public const COLUMN_REMEDY_ID = 'remedy_id';
    public const COLUMN_PLANT_ID = 'plant_id';


    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_REMEDY_ID,
        self::COLUMN_PLANT_ID
    ];


    public function remedy()
    {
        return $this->hasMany(Remedy::class, Remedy::COLUMN_ID, RemedyPlant::COLUMN_REMEDY_ID);
    }

    public function plant()
    {
        return $this->hasMany(Plant::class, Plant::COLUMN_ID, RemedyPlant::COLUMN_PLANT_ID);
    }
}