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
        Schema::create('seo_globals', function (Blueprint $table) {
            $table->id();

            // Identity
            $table->string('site_name')->nullable();
            $table->longText(column: 'meta_info')->nullable(); 
            $table->string('default_meta_image')->nullable();

            // Canonical & Robots
            $table->string('global_canonical')->nullable();
            $table->string('robots_default')->default('index,follow');
            $table->text('robots_txt')->nullable();

            // Webmaster Tools
            $table->string('google_site_verification')->nullable();
            $table->string('bing_site_verification')->nullable();

            // Sitemap
            $table->boolean('sitemap_enabled')->default(true);
            $table->json('sitemap_urls')->nullable();

            // Tracking
            $table->string('google_analytics_id')->nullable();
            $table->string('google_tag_manager_id')->nullable();
            $table->string('facebook_pixel_id')->nullable();
            $table->longText('other_tracking_scripts')->nullable();

            // Social Defaults
            $table->longText('og_meta')->nullable();

            $table->longText('twitter_meta')->nullable();

            // Structured Data
            $table->longText('structured_data_global')->nullable();

            // Scripts
            $table->longText('global_header_scripts')->nullable();
            $table->longText('global_body_end_scripts')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seo_globals');
    }
};
