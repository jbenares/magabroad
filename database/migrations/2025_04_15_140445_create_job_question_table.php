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
        Schema::create('job_question', function (Blueprint $table) {
            $table->id();
            $table->integer('employer_id')->default(0);
            $table->integer('job_id')->default(0);
            $table->string('question')->nullable();
            $table->string('question_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_question');
    }
};
