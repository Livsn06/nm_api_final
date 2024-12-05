<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{

    /** @use HasFactory<\Database\Factories\PlantFactory> */
    use HasFactory;


    // Define column names as constants
    public const TABLE_NAME = 'plants';

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_IMAGE = 'image_path';
    public const COLUMN_STATUS = 'status';
    public const COLUMN_ADMIN = 'uploader_id';
    public const COLUMN_LOCAL_NAME = 'local_name';
    public const COLUMN_DESCRIPTION = 'description';
    public const COLUMN_SCIENTIFIC_NAME = 'scientific_name';

    // Use constants in the fillable property
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_SCIENTIFIC_NAME,
        self::COLUMN_LOCAL_NAME,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_IMAGE,
        self::COLUMN_STATUS,
        self::COLUMN_ADMIN
    ];
}
