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
        Schema::table('study_clubs', function (Blueprint $table) {
            $table->text('about')->nullable()->after('description');
            $table->text('vision')->nullable()->after('about');
            $table->text('mission')->nullable()->after('vision');
            $table->json('social_links')->nullable()->after('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('study_clubs', function (Blueprint $table) {
            $table->dropColumn(['about', 'vision', 'mission', 'social_links']);
        });
    }
};
