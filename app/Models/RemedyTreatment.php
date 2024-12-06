<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemedyTreatment extends Model
{
    /** @use HasFactory<\Database\Factories\RemedyTreatmentFactory> */
    use HasFactory;

    public const TABLE_NAME = 'remedy_treatments';

    public const COLUMN_ID = 'id';
    public const COLUMN_REMEDY_ID = 'remedy_id';
    public const COLUMN_TREATMENT_ID = 'treatment_id';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_REMEDY_ID,
        self::COLUMN_TREATMENT_ID,
    ];

    public function remedy()
    {
        return $this->belongsTo(Remedy::class);
    }
}
