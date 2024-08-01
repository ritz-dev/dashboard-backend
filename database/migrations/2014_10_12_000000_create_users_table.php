<?php

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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('img_url')->nullable();
            $table->string('birth_datetime')->nullable();
            $table->string('birth_place')->nullable();
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->decimal('cash_amount', total: 10, places: 2)->nullable();
            $table->integer('follower')->nullable();
            $table->string('date_created')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
