<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add(
            'about.hero_image',
            '/assets/images/about/banner.jpg'
        );
        $this->migrator->add('about.title', [
            'en' => 'Ensuring Quality & Compliance Through Expert Inspections!',
            'km' =>
                'ការធានាគុណភាព និងការគោរពតាមបទបញ្ជា តាមរយៈការត្រួតពិនិត្យដោយអ្នកជំនាញ!',
        ]);
        $this->migrator->add('about.description', [
            'en' =>
                'We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements.',
            'km' =>
                'យើងផ្តល់សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់ដោយឯករាជ្យ ដើម្បីជួយអាជីវកម្មឱ្យបំពេញតាមស្តង់ដារឧស្សាហកម្ម និងលក្ខខណ្ឌផ្នែកនិតិវិធី។',
        ]);
        $this->migrator->add('about.name', [
            'en' => 'About Us',
            'km' => 'អំពីពួកយើង',
        ]);
        $this->migrator->add('about.image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Ensuring Compliance and Safety',
                    'km' => 'ធានាឱ្យមានការអនុលោមតាម និងសុវត្ថិភាព',
                ],
                'description' => [
                    'en' =>
                        'At VE Cert, we specialize in certification, inspection, and training services, ensuring businesses meet global compliance and safety standards. Our goal is to enhance credibility, efficiency, and operational excellence through trusted and transparent certification solutions.',
                    'km' =>
                        'នៅ VE Cert យើងមានជំនាញពិសេសក្នុងការផ្ដល់សេវាកម្មវិញ្ញាបនបត្រ ការត្រួតពិនិត្យ និងការបណ្តុះបណ្តាល ដើម្បីធានាថា អាជីវកម្មអាចបំពេញតាមស្ដង់ដារអន្ដរជាតិទាក់ទងនឹងការអនុលោមតាម និងសុវត្ថិភាព។ គោលបំណងរបស់យើងគឺ ដើម្បីបង្កើនឥទ្ធិពល ភាពមានប្រសិទ្ធភាព និងលទ្ធផលប្រតិបត្តិការល្អ ដោយឧបត្ថម្ភដោយដំណោះស្រាយវិញ្ញាបនបត្រដែលមានការជឿជាក់ និងភាពតម្លាភាព',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Who We Are',
                    'km' => 'អំពីពួកយើង',
                ],
                'description' => [
                    'en' =>
                        'VE Cert provides certification, inspection, and consulting services to ensure compliance with international standards.',
                    'km' =>
                        'VE Cert ផ្ដល់សេវាកម្មវិញ្ញាបនបត្រ ការត្រួតពិនិត្យ និងការពិគ្រោះយោបល់ ដើម្បីធានាថាអនុវត្តតាមស្តង់ដារអន្ដរជាតិ',
                ],
            ],
        ]);
    }
};
