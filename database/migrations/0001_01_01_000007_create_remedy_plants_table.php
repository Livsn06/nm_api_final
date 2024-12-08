<?php

use App\Models\Plant;
use App\Models\Remedy;
use App\Models\RemedyPlant;
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
        Schema::create(RemedyPlant::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(RemedyPlant::COLUMN_REMEDY_ID)->constrained(Remedy::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(RemedyPlant::COLUMN_PLANT_ID)->constrained(Plant::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(RemedyPlant::TABLE_NAME);
    }
};
