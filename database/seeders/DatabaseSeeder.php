<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();
        
        $this->call(UserSeeder::class);
        $this->call(SettingsTableSeeder::class);
        // $this->call(PagesTableSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(SeoGlobalSeeder::class);
    }
}
