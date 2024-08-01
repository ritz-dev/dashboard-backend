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
        Schema::create('astrologer_tools', function (Blueprint $table) {
            $table->id();
            $table->integer('astrologer_id')->nullable();
            $table->integer('astrological_tool_id')->nullable();
            $table->enum('charge',['Free','Paid'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrologer_tools');
    }
};
