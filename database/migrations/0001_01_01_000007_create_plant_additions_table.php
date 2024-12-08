<?php

use App\Models\PlantAddition;
use App\Models\User;
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
        Schema::create(PlantAddition::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(PlantAddition::COLUMN_NAME)->nullable(false);
            $table->string(PlantAddition::COLUMN_SCIENTIFIC_NAME)->nullable(false);
            $table->text(PlantAddition::COLUMN_DESCRIPTION)->nullable(false);
            $table->string(PlantAddition::COLUMN_IMAGE)->nullable();
            $table->foreignId(PlantAddition::COLUMN_USER_ID)->nullable()->constrained(User::TABLE_NAME)->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(PlantAddition::TABLE_NAME);
    }
};
