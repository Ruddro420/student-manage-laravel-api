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
        Schema::create('studens', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('course_name')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('admission_slip_no')->nullable();
            $table->string('password')->nullable();
            $table->string('status')->default(0);
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
        Schema::dropIfExists('studens');
    }
};
