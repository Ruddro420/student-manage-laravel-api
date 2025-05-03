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
        Schema::create('present_models', function (Blueprint $table) {
            $table->id();
            $table->string('s_id')->nullable();
            $table->string('date')->nullable();
            $table->string('status')->nullable();
            $table->string('ex_1')->nullable();
            $table->string('ex_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('present_models');
    }
};
