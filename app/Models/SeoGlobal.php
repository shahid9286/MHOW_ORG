<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SeoGlobal extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'meta_info',
        'default_meta_image',
        'global_canonical',
        'robots_default',
        'robots_txt',
        'google_site_verification',
        'bing_site_verification',
        'sitemap_enabled',
        'sitemap_urls',
        'google_analytics_id',
        'google_tag_manager_id',
        'facebook_pixel_id',
        'other_tracking_scripts',
        'og_meta',
        'twitter_meta',
        'structured_data_global',
        'global_header_scripts',
        'global_body_end_scripts',
    ];

    protected $casts = [
        'sitemap_enabled' => 'boolean',
        'sitemap_urls' => 'array',
    ];

    // Get cached instance
    public static function cached()
    {
        return Cache::remember('seo_global', 3600, function () {
            return static::first() ?? new static();
        });
    }

    // Boot method to clear cache on model events
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget('seo_global');
        });

        static::deleted(function ($model) {
            Cache::forget('seo_global');
        });
    }

    // Singleton instance
    public static function instance()
    {
        return static::cached();
    }
}