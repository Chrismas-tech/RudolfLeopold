<?php

namespace Database\Seeders;

use App\Models\GeneralWebsiteSettings;
use Illuminate\Database\Seeder;

class GeneralWebsiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $general_client_settings = [
            'copyright' => '© Copyright Webmaster <a class="copyright-link" href="mailto:webdevjunior@gmail.com">webdevjunior@gmail.com</a> - All Rights Reserved',
            'address' => '27 rue Paul Déroulède - 06000 NICE',
            'email' => 'client@gmail.com',
            'maintenance' => 0,
            'phone' => '06 46 70 XX XX',
            'email_webmaster' => 'webdevjunior@gmail.com',
            'facebook' => 'https://facebook.com',
            'youtube' => 'https://youtube.com',
            'twitter' => 'https://twitter.com',
            'spotify' => 'https://spotify.com',
            'linkedin' => 'https://linkedin.com',
            'instagram' => 'https://instagram.com',
        ];

        GeneralWebsiteSettings::create($general_client_settings);
    }
}
