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
        Schema::create('submit_assingments', function (Blueprint $table) {
            $table->id();
            $table->string('s_name')->nullable();
            $table->string('s_id')->nullable();
            $table->string('c_name')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('s_phone')->nullable();
            $table->string('a_name')->nullable();
            $table->string('a_link')->nullable();
            $table->string('m_name')->nullable();
            $table->string('sub_date')->nullable();
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
        Schema::dropIfExists('submit_assingments');
    }
};
