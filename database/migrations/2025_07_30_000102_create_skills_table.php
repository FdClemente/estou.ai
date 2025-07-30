<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the skills table.
 *
 * Each record in this table represents a particular technology or competency
 * the developer wants to showcase on the portfolio. The name and optional
 * description fields are stored in both Portuguese and English. An optional
 * icon can be specified to visually represent the skill. Icons can be a
 * FontAwesome class, a Heroicon identifier or the filename of an uploaded
 * asset stored in the public/images directory.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name_pt');
            $table->string('name_en');
            $table->text('description_pt')->nullable();
            $table->text('description_en')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};