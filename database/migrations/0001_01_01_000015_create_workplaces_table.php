<?php

use App\Models\AdminWork;
use App\Models\Plant;
use App\Models\PlantAddition;
use App\Models\User;
use App\Models\Workplace;
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
        Schema::create(Workplace::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(Workplace::COLUMN_WORKPLACE_NAME)->nullable();
            $table->foreignId(Workplace::COLUMN_PLANT_ADDITION_ID)->nullable()->constrained(PlantAddition::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(Workplace::COLUMN_WORK_ID)->nullable()->constrained(AdminWork::TABLE_NAME)->onDelete('cascade');
            $table->foreignId(Workplace::COLUMN_ADMIN_ID)->nullable()->constrained(User::TABLE_NAME)->onDelete('cascade');
            $table->string(Workplace::COLUMN_STATUS)->nullable(false)->default('accepted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(Workplace::TABLE_NAME);
    }
};
