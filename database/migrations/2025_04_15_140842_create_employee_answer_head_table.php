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
        Schema::create('employee_answer_head', function (Blueprint $table) {
            $table->id();
            $table->integer('employer_id')->default(0);
            $table->integer('job_id')->default(0);
            $table->integer('employee_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_answer_head');
    }
};
