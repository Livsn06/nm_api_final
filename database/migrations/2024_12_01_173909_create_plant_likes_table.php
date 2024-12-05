<?php

use App\Models\Like;
use App\Models\Plant;
use App\Models\PlantLike;
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
        Schema::create(PlantLike::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(PlantLike::COLUMN_PLANT_ID)->constrained(Plant::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(PlantLike::COLUMN_LIKE_ID)->constrained(Like::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(PlantLike::TABLE_NAME);
    }
};
