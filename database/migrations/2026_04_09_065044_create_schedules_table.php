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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('study_club_id')->constrained()->cascadeOnDelete();
            $table->string('title'); // Contoh: Latihan Persiapan OSN
            $table->dateTime('schedule_time'); // Tanggal dan jam pelaksanaan
            $table->string('location')->nullable(); // Contoh: Lab Komputer 1
            $table->string('type')->default('rutin'); // Contoh: rutin, lomba, event
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
