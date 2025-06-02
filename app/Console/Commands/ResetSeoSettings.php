<?php

namespace App\Console\Commands;

use App\Settings\SeoSettings;
use Illuminate\Console\Command;

class ResetSeoSettings extends Command
{
    protected $signature = 'seo:reset';
    protected $description = 'Reset SEO settings to default values';

    public function handle()
    {
        $seoSettings = app(SeoSettings::class);

        // Define default pages
        $defaultPages = [
            'home' => [
                'url' => ['en' => '', 'km' => ''],
                'meta_title' => ['en' => 'Home', 'km' => 'ទំព័រដើម'],
                'meta_description' => ['en' => 'Welcome to our website', 'km' => 'សូមស្វាគមន៍មកកាន់គេហទំព័ររបស់យើង'],
                'meta_keywords' => ['en' => 'home, welcome', 'km' => 'ទំព័រដើម, ស្វាគមន៍'],
                'og_title' => ['en' => 'Home', 'km' => 'ទំព័រដើម'],
                'og_description' => ['en' => 'Welcome to our website', 'km' => 'សូមស្វាគមន៍មកកាន់គេហទំព័ររបស់យើង'],
                'og_image' => null,
            ],
            'service' => [
                'url' => ['en' => 'service', 'km' => 'service'],
                'meta_title' => ['en' => 'Our Services', 'km' => 'សេវាកម្មរបស់យើង'],
                'meta_description' => ['en' => 'Explore our services', 'km' => 'ស្វែងយល់ពីសេវាកម្មរបស់យើង'],
                'meta_keywords' => ['en' => 'services, offerings', 'km' => 'សេវាកម្ម, ផលិតផល'],
                'og_title' => ['en' => 'Our Services', 'km' => 'សេវាកម្មរបស់យើង'],
                'og_description' => ['en' => 'Explore our services', 'km' => 'ស្វែងយល់ពីសេវាកម្មរបស់យើង'],
                'og_image' => null,
            ],
            'about' => [
                'url' => ['en' => 'about', 'km' => 'about'],
                'meta_title' => ['en' => 'About Us', 'km' => 'អំពីយើង'],
                'meta_description' => ['en' => 'Learn about our company', 'km' => 'ស្វែងយល់អំពីក្រុមហ៊ុនរបស់យើង'],
                'meta_keywords' => ['en' => 'about, company, history', 'km' => 'អំពី, ក្រុមហ៊ុន, ប្រវត្តិ'],
                'og_title' => ['en' => 'About Us', 'km' => 'អំពីយើង'],
                'og_description' => ['en' => 'Learn about our company', 'km' => 'ស្វែងយល់អំពីក្រុមហ៊ុនរបស់យើង'],
                'og_image' => null,
            ],
            'contact' => [
                'url' => ['en' => 'contact', 'km' => 'contact'],
                'meta_title' => ['en' => 'Contact Us', 'km' => 'ទំនាក់ទំនងយើង'],
                'meta_description' => ['en' => 'Get in touch with us', 'km' => 'ទាក់ទងមកយើង'],
                'meta_keywords' => ['en' => 'contact, email, phone', 'km' => 'ទំនាក់ទំនង, អ៊ីមែល, ទូរស័ព្ទ'],
                'og_title' => ['en' => 'Contact Us', 'km' => 'ទំនាក់ទំនងយើង'],
                'og_description' => ['en' => 'Get in touch with us', 'km' => 'ទាក់ទងមកយើង'],
                'og_image' => null,
            ],
            'inspection' => [
                'url' => ['en' => 'inspection', 'km' => 'inspection'],
                'meta_title' => ['en' => 'Inspection Services', 'km' => 'សេវាកម្មត្រួតពិនិត្យ'],
                'meta_description' => ['en' => 'Our inspection services', 'km' => 'សេវាកម្មត្រួតពិនិត្យរបស់យើង'],
                'meta_keywords' => ['en' => 'inspection, quality control', 'km' => 'ការត្រួតពិនិត្យ, ការគ្រប់គ្រងគុណភាព'],
                'og_title' => ['en' => 'Inspection Services', 'km' => 'សេវាកម្មត្រួតពិនិត្យ'],
                'og_description' => ['en' => 'Our inspection services', 'km' => 'សេវាកម្មត្រួតពិនិត្យរបស់យើង'],
                'og_image' => null,
            ],
            'training' => [
                'url' => ['en' => 'training', 'km' => 'training'],
                'meta_title' => ['en' => 'Training Programs', 'km' => 'កម្មវិធីបណ្តុះបណ្តាល'],
                'meta_description' => ['en' => 'Our training programs', 'km' => 'កម្មវិធីបណ្តុះបណ្តាលរបស់យើង'],
                'meta_keywords' => ['en' => 'training, education, programs', 'km' => 'ការបណ្តុះបណ្តាល, ការអប់រំ, កម្មវិធី'],
                'og_title' => ['en' => 'Training Programs', 'km' => 'កម្មវិធីបណ្តុះបណ្តាល'],
                'og_description' => ['en' => 'Our training programs', 'km' => 'កម្មវិធីបណ្តុះបណ្តាលរបស់យើង'],
                'og_image' => null,
            ],
        ];

        // Update settings
        $seoSettings->pages = $defaultPages;
        $seoSettings->save();

        $this->info('SEO settings have been reset to default values.');

        return Command::SUCCESS;
    }
}
