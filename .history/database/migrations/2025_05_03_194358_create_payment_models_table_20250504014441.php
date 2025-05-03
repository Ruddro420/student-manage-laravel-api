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
        Schema::create('payment_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('s_id')->nullable();
            $table->string('date')->nullable();
            $table->string('payment')->nullable();
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
        Schema::dropIfExists('payment_models');
    }
};
