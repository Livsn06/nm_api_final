<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workplace extends Model
{
    /** @use HasFactory<\Database\Factories\WorkplaceFactory> */
    use HasFactory;

    public const TABLE_NAME = 'workplaces';

    public const COLUMN_ID = 'id';
    public const COLUMN_WORKPLACE_NAME = 'workplace_name';
    public const COLUMN_PLANT_ADDITION_ID = 'plant_addition_id';
    public const COLUMN_WORK_ID = 'work_id';
    public const COLUMN_ADMIN_ID = 'admin_id';
    public const COLUMN_STATUS = 'status';



    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_WORKPLACE_NAME,
        self::COLUMN_PLANT_ADDITION_ID,
        self::COLUMN_WORK_ID,
        self::COLUMN_ADMIN_ID,
        self::COLUMN_STATUS
    ];
}
