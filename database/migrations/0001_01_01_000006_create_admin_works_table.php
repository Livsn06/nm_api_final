<?php

use App\Models\AdminWork;
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
        Schema::create(AdminWork::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(AdminWork::COLUMN_NAME)->nullable(false);
            $table->string(AdminWork::COLUMN_LOCAL_NAME)->nullable();
            $table->string(AdminWork::COLUMN_SCIENTIFIC_NAME)->nullable();
            $table->text(AdminWork::COLUMN_DESCRIPTION)->nullable();
            $table->json(AdminWork::COLUMN_IMAGE)->nullable();
            $table->json(AdminWork::COLUMN_TREATMENT_ID)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(AdminWork::TABLE_NAME);
    }
};
