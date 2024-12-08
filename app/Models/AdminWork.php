<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWork extends Model
{
    /** @use HasFactory<\Database\Factories\AdminWorkFactory> */
    use HasFactory;

    public const TABLE_NAME = 'admin_works';

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_LOCAL_NAME = 'local_name';
    public const COLUMN_DESCRIPTION = 'description';
    public const COLUMN_SCIENTIFIC_NAME = 'scientific_name';
    public const COLUMN_TREATMENT_ID = 'treatment_id';
    public const COLUMN_IMAGE = 'image_path';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_IMAGE,
        self::COLUMN_LOCAL_NAME,
        self::COLUMN_DESCRIPTION,
        self::COLUMN_SCIENTIFIC_NAME,
        self::COLUMN_TREATMENT_ID
    ];
}
