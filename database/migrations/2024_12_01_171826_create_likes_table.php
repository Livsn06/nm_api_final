<?php

use App\Models\Like;
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
        Schema::create(Like::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger(Like::COLUMN_LIKE)->nullable(false);
            $table->foreignId(Like::COLUMN_USER_ID)->constrained(User::TABLE_NAME)->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Like::TABLE_NAME);
    }
};
