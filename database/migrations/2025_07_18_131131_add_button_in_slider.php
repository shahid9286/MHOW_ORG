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
        Schema::table('sliders', function (Blueprint $table) {
            if (!Schema::hasColumn('sliders', 'button_title')) {
                $table->string('button_title')->nullable()->after('status');
            }

            if (!Schema::hasColumn('sliders', 'button_url')) {
                $table->string('button_url')->nullable()->after('button_title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            if (Schema::hasColumn('sliders', 'button_title')) {
                $table->dropColumn('button_title');
            }
            if (Schema::hasColumn('sliders', 'button_url')) {
                $table->dropColumn('button_url');
            }
        });
    }
};
