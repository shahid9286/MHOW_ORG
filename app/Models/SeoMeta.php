<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SeoMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_slug',
        'fav_icon',
        'logo',
        'meta_info',
        'meta_image',
        'og_meta',
        'og_image',
        'twitter_meta',
        'twitter_image',
        'scheme',
        'header_top',
        'header_bottom',
        'body_start',
        'body_end',
        'custom_css',
        'custom_js',
    ];

    // Get all SEO metas cached
    public static function cachedAll()
    {
        return Cache::remember('seo_metas_all', 3600, function () {
            return static::all();
        });
    }

    // Get SEO meta by slug cached
    public static function cachedBySlug($slug)
    {
        return Cache::remember("seo_meta_slug_{$slug}", 3600, function () use ($slug) {
            return static::where('page_slug', $slug)->first();
        });
    }

    // Get SEO meta by ID cached
    public static function cachedById($id)
    {
        return Cache::remember("seo_meta_id_{$id}", 3600, function () use ($id) {
            return static::find($id);
        });
    }

    // Boot method to clear cache on model events
    protected static function boot()
    {
        parent::boot();

        static::saved(function ($model) {
            Cache::forget('seo_metas_all');
            Cache::forget("seo_meta_slug_{$model->page_slug}");
            Cache::forget("seo_meta_id_{$model->id}");
        });

        static::deleted(function ($model) {
            Cache::forget('seo_metas_all');
            Cache::forget("seo_meta_slug_{$model->page_slug}");
            Cache::forget("seo_meta_id_{$model->id}");
        });
    }
}