<?php

use App\Models\Ingredient;
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
        Schema::create(Ingredient::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Ingredient::COLUMN_NAME)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Ingredient::TABLE_NAME);
    }
};
