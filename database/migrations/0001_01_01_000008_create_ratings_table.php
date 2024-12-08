<?php

use App\Models\Rating;
use App\Models\Remedy;
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
        Schema::create(Rating::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->decimal(Rating::COLUMN_RATE, 2, 1)->nullable(false);
            $table->foreignId(Rating::COLUMN_REMEDY_ID)->constrained(Remedy::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(Rating::COLUMN_USER_ID)->constrained(User::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Rating::TABLE_NAME);
    }
};
