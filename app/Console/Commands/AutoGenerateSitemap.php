<?php

namespace App\Console\Commands;

use App\Models\Event;
use App\Models\Project;
use Illuminate\Console\Command;
use Log;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class AutoGenerateSitemap extends Command
{
    protected $signature = 'sitemap:auto';

    protected $description = 'Generate sitemap including dynamic events and projects';

    public function handle()
    {
        try {
            Log::info('Sitemap generation started.');

            $sitemap = Sitemap::create();

            // Static pages
            $staticPages = ['/', '/about-us', '/contact-us', '/become-volunteer', '/gallery', '/projects', '/events'];
            foreach ($staticPages as $page) {
                $sitemap->add(Url::create($page));
                Log::info("Added static page to sitemap: $page");
            }

            // Dynamic projects
            foreach (Project::where('status', 'active')->get() as $project) {
                $url = "/project/{$project->slug}";
                $sitemap->add(
                    Url::create($url)
                        ->setLastModificationDate($project->updated_at)
                        ->setPriority(0.8)
                );
                Log::info("Added project to sitemap: $url");
            }

            // Dynamic events
            foreach (Event::where('status', 'active')->get() as $event) {
                $url = "/{$event->slug}";
                $sitemap->add(
                    Url::create($url)
                        ->setLastModificationDate($event->updated_at)
                        ->setPriority(0.8)
                );
                Log::info("Added event to sitemap: $url");
            }

            $sitemap->writeToFile(public_path('sitemap.xml'));
            Log::info('Sitemap successfully generated!');

            $this->info('Sitemap generated with dynamic events and projects!');

        } catch (\Exception $e) {
            Log::error('Sitemap generation failed: '.$e->getMessage());
            $this->error('Sitemap generation failed: '.$e->getMessage());
        }
    }
}
