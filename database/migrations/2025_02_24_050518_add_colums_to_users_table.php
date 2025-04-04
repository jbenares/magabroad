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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('approved')->nullable()->default(0)->after('usertype_id');
            $table->string('logo')->nullable()->after('business_name');
            $table->text('about')->nullable()->after('business_name');
            $table->string('company_size')->nullable()->after('business_name');
            $table->integer('industry_id')->nullable()->default(0)->after('business_name');
            $table->string('website')->nullable()->after('business_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
