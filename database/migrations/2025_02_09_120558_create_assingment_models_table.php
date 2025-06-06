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
        Schema::create('assingment_models', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('module_name')->nullable();
            $table->string('course_id')->nullable();
            $table->string('assing_name')->nullable();
            $table->string('deadline')->nullable();
            $table->string('imLink')->nullable();
            $table->string('details')->nullable();
            $table->string('ex_1')->nullable();
            $table->string('ex_2')->nullable();
            $table->string('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assingment_models');
    }
};
