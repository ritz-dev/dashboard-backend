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
        Schema::create('astrologers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable();
            $table->string('password');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('img_url')->nullable();
            $table->integer('experience_years')->nullable();
            $table->string('specialization')->nullable();
            $table->string('bio')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->decimal('cash_amount', total: 10, places: 2)->nullable();
            $table->string('date_created')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrologers');
    }
};
