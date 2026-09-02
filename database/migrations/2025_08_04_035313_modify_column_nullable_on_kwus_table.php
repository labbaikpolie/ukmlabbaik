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
        Schema::table('kwus', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable()->change();
            $table->string('departement')->nullable()->change();
            $table->string('foto')->nullable()->change();
            $table->string('angkatan')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kwus', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable(false)->change();
            $table->string('departement')->nullable(false)->change();
            $table->string('foto')->nullable(false)->change();
            $table->string('angkatan')->nullable(false)->change();
        });
    }
};