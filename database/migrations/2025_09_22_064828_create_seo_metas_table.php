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
        Schema::create('seo_metas', function (Blueprint $table) {
            $table->id();

            // Page Identification
            $table->string('page_slug')->nullable()->unique();

            // General Meta
            $table->longText(column: 'meta_info')->nullable(); 
            
            $table->string('meta_image')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('logo')->nullable();
            $table->string('og_image')->nullable();
            $table->string('twitter_image')->nullable();

            // Open Graph (Social Sharing)
            $table->longText('og_meta')->nullable();

            // Twitter Cards
            $table->longText('twitter_meta')->nullable();

            $table->longText('scheme')->nullable();

            // Custom Code Injections
            $table->longText('header_top')->nullable();
            $table->longText('header_bottom')->nullable();
            $table->longText('body_start')->nullable();
            $table->longText('body_end')->nullable();

            // Optional Extras
            $table->longText('custom_css')->nullable();
            $table->longText('custom_js')->nullable();




            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_metas');
    }
};


