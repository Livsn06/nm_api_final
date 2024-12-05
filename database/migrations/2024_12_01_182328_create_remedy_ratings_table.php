<?php

use App\Models\Rating;
use App\Models\Remedy;
use App\Models\RemedyRating;
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
        Schema::create(RemedyRating::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->foreignId(RemedyRating::COLUMN_REMEDY_ID)->constrained(Remedy::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(RemedyRating::COLUMN_RATING_ID)->constrained(Rating::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(RemedyRating::TABLE_NAME);
    }
};
