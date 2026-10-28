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
        Schema::dropIfExists('rapats');
    }

    /**
     * Reverse the migrations.
     *
     * Data rapat tidak dikembalikan (down kosong sengaja).
     */
    public function down(): void
    {
        // Data rapat tidak dikembalikan.
    }
};