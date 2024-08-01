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
        Schema::create('astrological_tools', function (Blueprint $table) {
            $table->id();
            $table->text('tool_name')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('price',total:8,places:2)->nullable();
            $table->integer('developer_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('astrological_tools');
    }
};
