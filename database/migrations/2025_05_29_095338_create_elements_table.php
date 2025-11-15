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
        Schema::create('elements', function (Blueprint $table) {
          
            $table->id();
            $table->string('element_name');
            $table->string('title');                   // {"en": "Great service!", "ar": "خدمة رائعة!"}
            $table->string('subtitle')->nullable();    // {"en": "Great service!", "ar": "خدمة رائعة!"}
            $table->text('description')->nullable(); // {"en": "Great service!", "ar": "خدمة رائعة!"}
            $table->string('image')->nullable();
            $table->string('icon')->nullable();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_elements');
    }
};
