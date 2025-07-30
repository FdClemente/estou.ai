<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the projects table.
 *
 * This table stores all portfolio projects along with their metadata in both
 * Portuguese and English. The slug field allows user friendly URLs should
 * individual project pages be implemented in the future. Technology tags
 * should be stored as a comma separated list; alternative approaches like
 * pivot tables can be introduced later if needed.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title_pt');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->text('description_pt');
            $table->text('description_en');
            $table->date('date')->nullable();
            $table->string('technologies')->nullable();
            $table->string('image')->nullable();
            $table->string('link')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};