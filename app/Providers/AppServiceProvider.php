<?php

namespace App\Providers;

use App\Models\Event;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Setting;
use App\Models\Page;
use App\Models\Project;
use App\Models\SeoGlobal;
use App\Models\SeoMeta;
use Illuminate\Support\Facades\Cache;

class AppServiceProvider extends ServiceProvider
{
    /* Register any application services */
    public function register(): void
    {
        // You can bind services or repositories here if needed
    }
    /* Bootstrap any application services */
    public function boot(): void
    {
          view()->composer('*', function ($view) {

           
            $seoGlobal = Cache::rememberForever('seo_global', function () {
                return SeoGlobal::first();
            });
            $pageSlug = trim(request()->path(), '/'); 
            if ($pageSlug === '') {
                $pageSlug = '/'; 
            }
            $cacheKey = 'seo_page_'.$pageSlug;
            $seoPage = Cache::rememberForever($cacheKey, function () use ($pageSlug) {
                return SeoMeta::where('page_slug', $pageSlug)->first();
            });

           
            $view->with(compact('seoGlobal', 'seoPage'));
        });


        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            View::share('setting', $setting);
        }

        if (Schema::hasTable('projects')) {
            $header_projects = Project::where('status', 'active')->limit(5)->get(['id', 'name', 'slug']);
            View::share('header_projects', $header_projects);
        }
        if (Schema::hasTable('events')) {
            $header_events = Event::where(['status' => 'active', 'visibility' => 'featured'])->orderBy('order_no', 'ASC')->select('id', 'title', 'slug')->limit(5)->get();
            // dd($events);
            View::share('header_events', $header_events);
        }

        if (Schema::hasTable('pages')) {
            $pages = Page::select('id', 'title', 'slug')
                ->where('status', 'published')
                ->get();

            View::share('service_list', $pages);
        }
    }
}
