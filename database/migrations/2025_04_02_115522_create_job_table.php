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
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->text('job_summary')->nullable();
            $table->string('industry')->nullable();
            $table->string('employment_category')->nullable();
            $table->string('workplace')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->nullable();
            $table->string('job_type')->nullable();
            $table->string('pay_type')->nullable();
            $table->string('currency')->nullable();
            $table->double('salary_from')->default(0);
            $table->double('salary_to')->default(0);
            $table->integer('confidential')->default(0);
            $table->string('start_date')->nullable();
            $table->string('end_date')->nullable();
            $table->integer('employer_id')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job');
    }
};
