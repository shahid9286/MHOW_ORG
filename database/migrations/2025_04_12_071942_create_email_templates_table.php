<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_templates', function (Blueprint $table) {

            $table->id();
            $table->string('title'); // For admin reference
            $table->string('category')->nullable(); // For grouping/searching
            $table->string('slug')->unique(); // Unique identifier (e.g., 'user-welcome')
            $table->string('subject'); // Email subject
            $table->longText('body'); // HTML/text with variables like {{name}}, {{amount}}
            $table->json('variables')->nullable(); // JSON of available variables and descriptions
            $table->string('description')->nullable(); // What this email is about
            $table->boolean('is_active')->default(true); // Toggle email on/off
            $table->text('notes_header')->nullable(); // Optional instructions at the top
            $table->text('notes_footer')->nullable(); // Optional instructions at the bottom
            $table->text('notes')->nullable(); // General guidance or usage notes
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_templates');
    }
};
