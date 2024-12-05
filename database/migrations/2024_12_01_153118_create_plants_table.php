<?php

use App\Models\Plant;
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
        Schema::create(Plant::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Plant::COLUMN_NAME)->nullable();
            $table->string(Plant::COLUMN_SCIENTIFIC_NAME)->nullable();
            $table->string(Plant::COLUMN_LOCAL_NAME)->nullable();
            $table->text(Plant::COLUMN_DESCRIPTION)->nullable();
            $table->string(Plant::COLUMN_STATUS)->nullable();
            $table->json(Plant::COLUMN_IMAGE)->nullable();
            $table->foreignId(Plant::COLUMN_ADMIN)->nullable()->constrained(User::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Plant::TABLE_NAME);
    }
};
