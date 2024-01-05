<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'key' => 'instagram',
                'value' => '',
                'comment' => 'Instagram linkki verkkosivuilla, esimerkiksi instagram.',
            ],
            [
                'key' => 'twitter',
                'value' => '',
                'comment' => 'Twitter/X linkki verkkosivuilla, esimerkiksi twitter.',
            ],
            [
                'key' => 'facebook',
                'value' => '',
                'comment' => 'Facebook linkki verkkosivuilla, esimerkiksi facebook.',
            ],
            [
                'key' => 'contact_enabled',
                'value' => '1',
                'comment' => 'Voiko yhteyttä ottaa? Hätätapauksissa poista käytöstä. :-)',
            ],
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::firstOrCreate(['key' => $setting['key']], [
                'key' => $setting['key'],
                'value' => $setting['value'],
                'comment' => $setting['comment'],
            ]);
        }
    }
}
