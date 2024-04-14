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
                'key' => 'motto',
                'value' => 'Tyhjä motto ig',
                'comment' => 'Näkyy logon alapuolella.',
            ],
			[
                'key' => 'verkkokauppa',
                'value' => 'https://google.com',
                'comment' => 'Verkkokaupan linkki',
            ],
			[
                'key' => 'email',
                'value' => 'example@gmail.com',
                'comment' => 'Yrityksen sähköpostiosoite',
            ],
			[
                'key' => 'name',
                'value' => 'Nimi',
                'comment' => 'Sivuston nimi.',
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
