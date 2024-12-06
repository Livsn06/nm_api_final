<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remedy extends Model
{
    /** @use HasFactory<\Database\Factories\RemedyFactory> */
    use HasFactory;

    public const TABLE_NAME = 'remedies';

    public const COLUMN_ID = 'id';
    public const COLUMN_TYPE = 'type';
    public const COLUMN_NAME = 'name';
    public const COLUMN_DESCRIPTION = 'description';
    public const COLUMN_STEP = 'step';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_USAGE = 'usage_remedy';
    public const COLUMN_SIDE_EFFECT = 'side_effect';
    public const COLUMN_IMAGE = 'image';


    protected $table = self::TABLE_NAME;
    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_TYPE,
        self::COLUMN_STEP,
        self::COLUMN_STATUS,
        self::COLUMN_SIDE_EFFECT,
        self::COLUMN_USAGE,
        self::COLUMN_IMAGE
    ];

    public function treatments()
    {
        return $this->hasMany(RemedyTreatment::class);
    }
}
