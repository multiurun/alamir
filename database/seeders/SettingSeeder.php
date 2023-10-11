<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'email' => 'contacat@shillshub.com',
            'phone' => '010253675554',
            'facebook' => 'https://www.facebook.com',
            'twitter' => 'https://www.twitter.com',
            'instaram' => 'https://www.instagram.com',
            'youtube' => 'https://www.youtube.com',
            'linkedin' => 'https://www.likedin.com'
        ]);
    }
}
