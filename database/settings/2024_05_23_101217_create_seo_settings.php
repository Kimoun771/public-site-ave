<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateSeoSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('seo.general', [
            'site_name' => ['en' => 'AVE', 'km' => 'AVE'],
            'default_title' => ['en' => 'AVE', 'km' => 'AVE'],
            'default_description' => ['en' => '', 'km' => ''],
            'default_keywords' => ['en' => '', 'km' => ''],
            'default_image' => '',
        ]);

        $this->migrator->add('seo.pages', [
                'home' => [
                    'url' => ['en' => '/', 'km' => '/km'],
                    'meta_title' => ['en' => 'Home', 'km' => 'ទំព័រដើម'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
                'service' => [
                    'url' => ['en' => '/service', 'km' => '/km/service'],
                    'meta_title' => ['en' => 'Service', 'km' => 'សេវាកម្ម'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
                'inspection' => [
                    'url' => ['en' => '/inspection', 'km' => '/km/inspection'],
                    'meta_title' => ['en' => 'Inspection', 'km' => 'ការត្រួតពិនិត្យ'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
                'training' => [
                    'url' => ['en' => '/training', 'km' => '/km/training'],
                    'meta_title' => ['en' => 'Training', 'km' => 'វគ្គបណ្តុះបណ្តាល'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
                'about' => [
                  'url' => ['en' => '/about', 'km' => '/km/about'],
                    'meta_title' => ['en' => 'About', 'km' => 'អំពីយើង'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
                'contact' => [
                     'url' => ['en' => '/contact', 'km' => '/km/contact'],
                    'meta_title' => ['en' => 'Contact', 'km' => 'ទំនាក់ទំនង'],
                    'meta_description' => ['en' => '', 'km' => ''],
                    'meta_keywords' => ['en' => '', 'km' => ''],
                    'canonical_url' => '',
                    'og_title' => ['en' => '', 'km' => ''],
                    'og_description' => ['en' => '', 'km' => ''],
                    'og_image' => '',
                ],
            ]
        );
    }

    public function down(): void
    {
        $this->migrator->delete('seo.general');
        $this->migrator->delete('seo.pages');
    }
}
