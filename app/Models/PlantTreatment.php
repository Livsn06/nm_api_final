<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantTreatment extends Model
{
    /** @use HasFactory<\Database\Factories\PlantTreatmentFactory> */
    use HasFactory;

    public const TABLE_NAME = 'plant_treatments';

    public const COLUMN_ID = 'id';
    public const COLUMN_PLANT_ID = 'plant_id';
    public const COLUMN_TREATMENT_ID = 'treatment_id';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_PLANT_ID,
        self::COLUMN_TREATMENT_ID
    ];

    public function ailment()
    {
        return $this->belongsTo(Ailment::class, PlantTreatment::COLUMN_TREATMENT_ID,  Ailment::COLUMN_ID);
    }
}
