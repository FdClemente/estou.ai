<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the settings table.
 *
 * This table stores global configuration for the portfolio, such as the
 * tagline in multiple languages. Adding additional fields here allows
 * administrators to manage high‑level site configuration from the Filament
 * backoffice without changing code.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            // Main tagline to display on the hero section of the site (Portuguese)
            $table->string('tagline_pt');
            // English translation of the tagline
            $table->string('tagline_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};