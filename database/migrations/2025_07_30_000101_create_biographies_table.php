<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Create the biographies table.
 *
 * The biography table stores the developer's biography in multiple languages.
 * It is expected to hold a single row, but the model allows multiple records
 * should future requirements emerge (for example, versioning different
 * biographies). Administrators can update this content via Filament.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('biographies', function (Blueprint $table) {
            $table->id();
            $table->text('biography_pt');
            $table->text('biography_en');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('biographies');
    }
};