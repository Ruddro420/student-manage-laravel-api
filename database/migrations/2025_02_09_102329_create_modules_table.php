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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('module_name')->nullable();
            $table->string('study_plan')->nullable();
            $table->string('course_id')->nullable();
            $table->string('status')->default(1);
            // $table->foreignId('course_id')->constrained()->restrictOnDelete()->cascadeOnUpdate();
            // $table->foreign('course_id')->references('id')->on('addcourses')->restrictOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
