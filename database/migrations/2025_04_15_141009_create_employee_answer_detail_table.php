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
        Schema::create('employee_answer_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('job_question_id')->default(0);
            $table->string('job_question')->nullable();
            $table->string('employee_answer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_answer_detail');
    }
};
