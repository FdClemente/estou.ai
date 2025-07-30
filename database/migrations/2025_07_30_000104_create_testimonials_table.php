<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the testimonials table.
 *
 * This table stores feedback from clients. Comments are stored in both
 * Portuguese and English. The optional image field may hold a path to the
 * client's photo if provided. If the site owner collects new testimonials
 * through Filament, ensure uploaded images are stored in the `storage` or
 * `public` directory according to your filesystem configuration.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position')->nullable();
            $table->text('comment_pt');
            $table->text('comment_en');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonials');
    }
};