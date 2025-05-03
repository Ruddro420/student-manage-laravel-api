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
            $table->string('course_name')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('student_name')->nullable();
            $table->string('admission_slip_no')->nullable();
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
