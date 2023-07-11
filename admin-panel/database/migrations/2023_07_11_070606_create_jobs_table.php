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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('company');
            $table->text('description');
            $table->string('location');
            $table->string('requirement');
            $table->string('employment_type');
            $table->string('education')->nullable();
            $table->string('skills')->nullable();
            $table->integer('experience_years')->nullable();
            $table->integer('experience_months')->nullable();
            $table->string('salary')->nullable();
            $table->dateTime('deadline');
            $table->text('benefits')->nullable();
            $table->string('contact_email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
