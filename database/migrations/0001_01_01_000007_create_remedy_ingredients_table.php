<?php

use App\Models\Ingredient;
use App\Models\Remedy;
use App\Models\RemedyIngredient;
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
        Schema::create(RemedyIngredient::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(RemedyIngredient::COLUMN_REMEDY_ID)->constrained(Remedy::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(RemedyIngredient::COLUMN_INGREDIENT_ID)->constrained(Ingredient::TABLE_NAME)->onDelete('cascade');
            $table->text(RemedyIngredient::COLUMN_DESCRIPTION)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(RemedyIngredient::TABLE_NAME);
    }
};
