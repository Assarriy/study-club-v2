<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_club_id')->constrained()->cascadeOnDelete();
            $table->string('title'); // Nama lomba/prestasi
            $table->year('year'); // Tahun juara
            $table->string('rank')->nullable(); // Juara 1, 2, Harapan, dll
            $table->string('image')->nullable(); // Foto penyerahan piala
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('achievements');
    }
};
