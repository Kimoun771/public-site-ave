<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $pages = [
            'home' => [
                'url' => [
                    'en' => '/',
                    'km' => '/km',
                ],
                'meta_title' => [
                    'en' => 'Laravel Starter',
                    'km' => 'កម្មវិធីចាប់ផ្តើម Laravel',
                ],
                'meta_description' => [
                    'en' => 'This is a description of the site.',
                    'km' => 'នេះគឺជាការពិពណ៌នាអំពីគេហទំព័រ។',
                ],
                'meta_keywords' => [
                    'en' => 'world, for, you',
                    'km' => 'ពិភពលោក, សម្រាប់, អ្នក',
                ],
                'og_title' => [
                    'en' => 'Laravel Starter',
                    'km' => 'កម្មវិធីចាប់ផ្តើម Laravel',
                ],
                'og_description' => [
                    'en' => 'This is a description of the site.',
                    'km' => 'នេះគឺជាការពិពណ៌នាអំពីគេហទំព័រ។',
                ],
                'og_image' => 'seo/home-og-image.png',
            ],
            'service' => [
                'url' => [
                    'en' => '/services',
                    'km' => '/km/services',
                ],
                'meta_title' => [
                    'en' => 'Our Services',
                    'km' => 'សេវាកម្មរបស់យើង',
                ],
                'meta_description' => [
                    'en' => 'Discover our range of services.',
                    'km' => 'ស្វែងយល់ពីជួរសេវាកម្មរបស់យើង។',
                ],
                'meta_keywords' => [
                    'en' => 'services, offerings',
                    'km' => 'សេវាកម្ម, ការផ្តល់ជូន',
                ],
                'og_title' => [
                    'en' => 'Our Services',
                    'km' => 'សេវាកម្មរបស់យើង',
                ],
                'og_description' => [
                    'en' => 'Discover our range of services.',
                    'km' => 'ស្វែងយល់ពីជួរសេវាកម្មរបស់យើង។',
                ],
                'og_image' => 'seo/service-og-image.png',
            ],
            'inspection' => [
                'url' => [
                    'en' => '/inspection',
                    'km' => '/km/inspection',
                ],
                'meta_title' => [
                    'en' => 'Inspection Services',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យ',
                ],
                'meta_description' => [
                    'en' => 'Professional inspection services.',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យប្រកបដោយវិជ្ជាជីវៈ។',
                ],
                'meta_keywords' => [
                    'en' => 'inspection, quality',
                    'km' => 'ការត្រួតពិនិត្យ, គុណភាព',
                ],
                'og_title' => [
                    'en' => 'Inspection Services',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យ',
                ],
                'og_description' => [
                    'en' => 'Professional inspection services.',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យប្រកបដោយវិជ្ជាជីវៈ។',
                ],
                'og_image' => 'seo/inspection-og-image.png',
            ],
            'training' => [
                'url' => [
                    'en' => '/training',
                    'km' => '/km/training',
                ],
                'meta_title' => [
                    'en' => 'Training Programs',
                    'km' => 'កម្មវិធីបណ្តុះបណ្តាល',
                ],
                'meta_description' => [
                    'en' => 'Explore our training programs.',
                    'km' => 'ស្វែងយល់ពីកម្មវិធីបណ្តុះបណ្តាលរបស់យើង។',
                ],
                'meta_keywords' => [
                    'en' => 'training, education',
                    'km' => 'ការបណ្តុះបណ្តាល, ការអប់រំ',
                ],
                'og_title' => [
                    'en' => 'Training Programs',
                    'km' => 'កម្មវិធីបណ្តុះបណ្តាល',
                ],
                'og_description' => [
                    'en' => 'Explore our training programs.',
                    'km' => 'ស្វែងយល់ពីកម្មវិធីបណ្តុះបណ្តាលរបស់យើង។',
                ],
                'og_image' => 'seo/training-og-image.png',
            ],
            'about' => [
                'url' => [
                    'en' => '/about',
                    'km' => '/km/about',
                ],
                'meta_title' => [
                    'en' => 'About Us',
                    'km' => 'អំពីយើង',
                ],
                'meta_description' => [
                    'en' => 'Learn more about our company.',
                    'km' => 'ស្វែងយល់បន្ថែមអំពីក្រុមហ៊ុនរបស់យើង។',
                ],
                'meta_keywords' => [
                    'en' => 'about, company',
                    'km' => 'អំពី, ក្រុមហ៊ុន',
                ],
                'og_title' => [
                    'en' => 'About Us',
                    'km' => 'អំពីយើង',
                ],
                'og_description' => [
                    'en' => 'Learn more about our company.',
                    'km' => 'ស្វែងយល់បន្ថែមអំពីក្រុមហ៊ុនរបស់យើង។',
                ],
                'og_image' => 'seo/about-og-image.png',
            ],
            'contact' => [
                'url' => [
                    'en' => '/contact',
                    'km' => '/km/contact',
                ],
                'meta_title' => [
                    'en' => 'Contact Us',
                    'km' => 'ទាក់ទងមកយើង',
                ],
                'meta_description' => [
                    'en' => 'Get in touch with us.',
                    'km' => 'ទាក់ទងជាមួយយើង។',
                ],
                'meta_keywords' => [
                    'en' => 'contact, support',
                    'km' => 'ទំនាក់ទំនង, ការគាំទ្រ',
                ],
                'og_title' => [
                    'en' => 'Contact Us',
                    'km' => 'ទាក់ទងមកយើង',
                ],
                'og_description' => [
                    'en' => 'Get in touch with us.',
                    'km' => 'ទាក់ទងជាមួយយើង។',
                ],
                'og_image' => 'seo/contact-og-image.png',
            ],
        ];

        $this->migrator->add('seo.pages', $pages);
    }

    public function down(): void
    {
        $this->migrator->delete('seo.pages');
    }
};