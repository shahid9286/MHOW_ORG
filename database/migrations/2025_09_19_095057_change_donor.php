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
        Schema::table('donors', function (Blueprint $table) {
            $table->string('account_name')->nullable()->unique(false)->change();

            if (!Schema::hasColumn('donors', 'date_of_birth')) {
                $table->date('date_of_birth')->nullable()->after('account_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donors', function (Blueprint $table) {
            $table->string('account_name')->unique(true)->nullable(false)->change();
        });
    }
};
