<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SeoGlobal;
use Illuminate\Support\Facades\DB;

class SeoGlobalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if record already exists to avoid duplicates
        if (SeoGlobal::count() === 0) {
            $structuredData = [
                '@context' => 'https://schema.org',
                '@type' => 'Organization',
                'name' => 'Your Site Name',
                'url' => 'https://yoursite.com',
                'logo' => 'https://yoursite.com/images/logo.png',
                'description' => 'A brief description of your organization',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => '123 Main Street',
                    'addressLocality' => 'City',
                    'addressRegion' => 'State',
                    'postalCode' => '12345',
                    'addressCountry' => 'US'
                ],
                'contactPoint' => [
                    '@type' => 'ContactPoint',
                    'telephone' => '+1-555-555-5555',
                    'contactType' => 'customer service'
                ],
                'sameAs' => [
                    'https://www.facebook.com/yourpage',
                    'https://www.twitter.com/yourhandle',
                    'https://www.linkedin.com/company/yourcompany'
                ]
            ];

            SeoGlobal::create([
                // Identity
                'site_name' => 'Your Awesome Site',
                'meta_info' => 'Discover amazing content and services on our website. We provide the best solutions for your needs with quality and reliability.',
                'default_meta_image' => null,

                // Canonical & Robots
                'global_canonical' => 'https://yoursite.com',
                'robots_default' => 'index,follow',
                'robots_txt' => "User-agent: *\nDisallow: /admin/\nDisallow: /storage/\nDisallow: /private/\nAllow: /\n\nSitemap: https://yoursite.com/sitemap.xml",

                // Webmaster Tools
                'google_site_verification' => 'your-google-verification-code-here',
                'bing_site_verification' => 'your-bing-verification-code-here',

                // Sitemap
                'sitemap_enabled' => true,
                'sitemap_urls' => json_encode([
                    'https://yoursite.com/sitemap.xml',
                    'https://yoursite.com/blog-sitemap.xml',
                    'https://yoursite.com/products-sitemap.xml'
                ]),

                // Tracking
                'google_analytics_id' => 'G-XXXXXXXXXX',
                'google_tag_manager_id' => 'GTM-XXXXXXX',
                'facebook_pixel_id' => 'XXXXXXXXXXXXXXX',
                'other_tracking_scripts' => '<!-- Additional tracking scripts can be added here -->',

                // Social Meta
                'og_meta' => 'Your Site Name - Quality Services and Solutions. Join thousands of satisfied customers today.',
                'twitter_meta' => 'Check out Your Site Name for the best services and solutions. #quality #service',

                // Structured Data
                'structured_data_global' => json_encode($structuredData),

                // Scripts
                'global_header_scripts' => '<!-- Google Fonts, CSS, etc. -->',
                'global_body_end_scripts' => '<!-- Analytics, Chat widgets, etc. -->',
            ]);

            $this->command->info('✅ SEO Global settings seeded successfully!');
            $this->command->info('📝 Site Name: Your Awesome Site');
            $this->command->info('🔗 Canonical: https://yoursite.com');
            $this->command->info('🗺️ Sitemap: Enabled');
        } else {
            $this->command->warn('⚠️ SEO Global settings already exist. Seeder skipped.');
        }
    }
}