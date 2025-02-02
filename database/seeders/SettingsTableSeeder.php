<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::truncate();
          $settings = [
            [
              'site_name' => 'My Blog',
              'tagline' => 'A simple blog application made with Laravel',
              'owner_name' => 'My Company',
              'owner_email' => 'company@domain.com',
              'twitter' => 'https://twitter.com',
              'facebook' => 'https://facebook.com',
              'instagram' => 'https://instagram.com',
              'theme_directory' => 'calvin',
              'is_cookieconsent' => 1,
              'is_infinitescroll' => 0,
            ],
        ];

        foreach ($settings as $key => $value) {
          Settings::create($value);
        }
    }
}
