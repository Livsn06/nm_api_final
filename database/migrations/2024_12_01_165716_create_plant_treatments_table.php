<?php

use App\Models\Ailment;
use App\Models\Plant;
use App\Models\PlantTreatment;
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
        Schema::create(PlantTreatment::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(PlantTreatment::COLUMN_PLANT_ID)->constrained(Plant::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(PlantTreatment::COLUMN_TREATMENT_ID)->constrained(Ailment::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(PlantTreatment::TABLE_NAME);
    }
};
