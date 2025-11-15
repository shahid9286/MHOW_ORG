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
        Schema::create('web_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pcategory_id')->constrained('p_categories');
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('icon_font', 255)->nullable();
            $table->string('icon', 255)->nullable();
            $table->string('banner_image', 255)->nullable();
            $table->tinyInteger('status')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->integer('serial_number')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_projects');
    }
};
