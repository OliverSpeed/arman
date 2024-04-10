<?php

use App\Services\SettingsService;
use App\Models\WebsiteGallery;

if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_CF_CONNECTING_IP'];
}

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $_SERVER['REMOTE_ADDR'] = $_SERVER['HTTP_X_FORWARDED_FOR'];
}

if (! function_exists('setting')) {
    function setting(string $setting): string
    {
        return app(SettingsService::class)->getOrDefault($setting);
    }
}

if (! function_exists('karuselli')) {
    function karuselli(): array
    {
        // Fetch the latest 12 images from the WebsiteGallery model
        $images = WebsiteGallery::latest()->limit(12)->get();

        // Process the fetched images and prepare the data array
        $carouselData = [];
        foreach ($images as $image) {
            $carouselData[] = [
                'src' => '/uploads/gallery/' . $image->name,
                'width' => 300, // Adjust width as needed
                'height' => 300, // Adjust height as needed
            ];
        }

        return $carouselData;
    }
}
