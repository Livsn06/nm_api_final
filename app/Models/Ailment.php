<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ailment extends Model
{
    /** @use HasFactory<\Database\Factories\AilmentFactory> */
    use HasFactory;

    public const TABLE_NAME = 'ailments';

    public const COLUMN_ID = 'id';
    public const COLUMN_NAME = 'name';
    public const COLUMN_TYPE = 'type';
    public const COLUMN_DESCRIPTION = 'description';

    protected $table = self::TABLE_NAME;

    protected $fillable = [
        self::COLUMN_NAME,
        self::COLUMN_TYPE,
        self::COLUMN_DESCRIPTION,
    ];
}
