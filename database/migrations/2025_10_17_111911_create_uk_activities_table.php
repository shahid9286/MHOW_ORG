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
        Schema::create('uk_activities', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('city')->nullable();
            $table->string('events')->nullable();
            $table->string('locations')->nullable();
            $table->string('people')->nullable();
            $table->integer('order')->default(0);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uk_activities');
    }
};
