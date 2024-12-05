<?php

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
        Schema::create(User::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string(User::COLUMN_NAME)->nullable(false);
            $table->string(User::COLUMN_EMAIL)->unique();
            $table->timestamp(User::COLUMN_EMAIL_VERIFIED_AT)->nullable();
            $table->string(User::COLUMN_PASSWORD);
            $table->string(User::COLUMN_ROLE)->default('user');
            $table->string(User::COLUMN_STATUS)->default('active');
            $table->string(User::COLUMN_AVATAR)->nullable();
            $table->string(User::COLUMN_PHONE)->nullable();
            $table->string(User::COLUMN_ADDRESS)->nullable();
            $table->string(User::COLUMN_GENDER)->nullable();
            $table->dateTime(User::COLUMN_BIRTHDAY)->nullable();

            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(User::TABLE_NAME);
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
