<?php

use App\Models\Ailment;
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
        Schema::create(Ailment::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Ailment::COLUMN_NAME)->nullable(false);
            $table->text(Ailment::COLUMN_DESCRIPTION)->nullable();
            $table->string(Ailment::COLUMN_TYPE)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Ailment::TABLE_NAME);
    }
};
