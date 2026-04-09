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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke siswa yang mendaftar
            $table->foreignId('study_club_id')->constrained()->cascadeOnDelete(); // Relasi ke club yang dituju
            $table->text('motivation'); // Alasan/motivasi mendaftar
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending'); // Status lamaran
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
