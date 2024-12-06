<?php

use App\Models\Remedy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(Remedy::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Remedy::COLUMN_NAME)->nullable(false);
            $table->string(Remedy::COLUMN_TYPE)->nullable();
            $table->string(Remedy::COLUMN_DESCRIPTION)->nullable();
            $table->string(Remedy::COLUMN_STATUS)->nullable();
            $table->json(Remedy::COLUMN_STEP)->nullable();
            $table->json(Remedy::COLUMN_USAGE)->nullable();
            $table->json(Remedy::COLUMN_SIDE_EFFECT)->nullable();
            $table->json(Remedy::COLUMN_IMAGE)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Remedy::TABLE_NAME);
    }
};
