<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $pages = [
            'home' => [
                'url' => [
                    'en' => '',
                    'km' => 'km',
                ],
                'meta_title' => [
                    'en' => 'Welcome to AVE - Your Trusted Partner for Quality and Compliance',
                    'km' => 'ស្វាគមន៍មកកាន់ AVE - ដៃគូដែលអាចទុកចិត្តបានសម្រាប់គុណភាព និងការអនុលោម',
                ],
                'meta_description' => [
                    'en' => 'AVE offers top-tier inspection, certification, and compliance services to help your business meet global standards. Let’s ensure your success together.',
                    'km' => 'AVE ផ្តល់សេវាកម្មត្រួតពិនិត្យ វិញ្ញាបនបត្រ និងការអនុលោមដែលមានគុណភាពខ្ពស់ ដើម្បីជួយអាជីវកម្មរបស់អ្នកបំពេញតាមស្តង់ដារអន្ដរជាតិ។ យើងត្រៀមខ្លួនដើម្បីធានាជោគជ័យរបស់អ្នក។',
                ],
                'meta_keywords' => [
                    'en' => 'inspection, certification, compliance, quality assurance, AVE',
                    'km' => 'ការត្រួតពិនិត្យ, វិញ្ញាបនបត្រ, ការអនុលោម, ការធានាគុណភាព, AVE',
                ],
                'og_title' => [
                    'en' => 'AVE - Excellence in Inspection & Compliance',
                    'km' => 'ភាពល្អឥតខ្ចោះក្នុងការត្រួតពិនិត្យ និងការអនុលោម',
                ],
                'og_description' => [
                    'en' => 'AVE helps businesses succeed by providing expert inspection, certification, and compliance services. Discover how we can help you meet international standards.',
                    'km' => 'AVE ជួយអាជីវកម្មឱ្យជោគជ័យ ដោយផ្តល់សេវាកម្មត្រួតពិនិត្យ វិញ្ញាបនបត្រ និងការអនុលោម។ ស្វែងយល់ពីរបៀបដែលយើងអាចជួយអ្នកដើម្បីបំពេញតាមស្តង់ដារអន្ដរជាតិ។',
                ],
                'og_image' => 'seo/home-og-image.png',
            ],
            'service' => [
                'url' => [
                    'en' => 'service',
                    'km' => 'km/service',
                ],
                'meta_title' => [
                    'en' => 'Our Premium Services for Quality and Compliance',
                    'km' => 'សេវាកម្មដែលមានគុណភាព និងការអនុលោមរបស់យើង',
                ],
                'meta_description' => [
                    'en' => 'Explore our professional range of services to ensure quality, safety, and industry compliance.',
                    'km' => 'ស្វែងយល់អំពីសេវាកម្មវិជ្ជាជីវៈរបស់យើង ដើម្បីធានាគុណភាព សុវត្ថិភាព និងការអនុលោមតាមវិស័យ',
                ],
                'meta_keywords' => [
                    'en' => 'premium services, quality assurance, compliance',
                    'km' => 'សេវាកម្មមានគុណភាព, ការធានាគុណភាព, ការអនុលោម',
                ],
                'og_title' => [
                    'en' => 'Our Premium Services',
                    'km' => 'សេវាកម្មពិសេសរបស់យើង',
                ],
                'og_description' => [
                    'en' => 'Discover how our services support your business in achieving top-quality standards.',
                    'km' => 'ស្វែងយល់ពីរបៀបដែលសេវាកម្មរបស់យើងគាំទ្រអាជីវកម្មរបស់អ្នកក្នុងការសម្រេចបាននូវស្តង់ដារជាន់ខ្ពស់',
                ],
                'og_image' => 'seo/service-og-image.png',
            ],
            'inspection' => [
                'url' => [
                    'en' => 'inspection',
                    'km' => 'km/inspection',
                ],
                'meta_title' => [
                    'en' => 'Expert Inspection Services for Quality and Compliance',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យជំនាញសម្រាប់គុណភាព និងការអនុលោម',
                ],
                'meta_description' => [
                    'en' => 'We offer professional inspection services to ensure your business meets industry standards and regulatory requirements.',
                    'km' => 'យើងផ្តល់សេវាកម្មត្រួតពិនិត្យប្រកបដោយវិជ្ជាជីវៈ ដើម្បីធានាថាអាជីវកម្មរបស់អ្នកអនុលោមតាមស្តង់ដារឧស្សាហកម្ម និងតម្រូវការអនុវត្តតាមច្បាប់។',
                ],
                'meta_keywords' => [
                    'en' => 'inspection, quality, compliance',
                    'km' => 'ការត្រួតពិនិត្យ, គុណភាព, ការអនុលោម',
                ],
                'og_title' => [
                    'en' => 'Inspection Services',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យ',
                ],
                'og_description' => [
                    'en' => 'Professional inspection services to ensure business quality and regulatory compliance.',
                    'km' => 'សេវាកម្មត្រួតពិនិត្យប្រកបដោយវិជ្ជាជីវៈ ដើម្បីធានាគុណភាព និងការអនុលោមតាមច្បាប់របស់អាជីវកម្ម។',
                ],
                'og_image' => 'seo/inspection-og-image.png',
            ],
            'training' => [
                'url' => [
                    'en' => 'training',
                    'km' => 'km/training',
                ],
                'meta_title' => [
                    'en' => 'Professional Training Programs for Skill Enhancement',
                    'km' => 'កម្មវិធីបណ្តុះបណ្តាលវិជ្ជាជីវៈសម្រាប់ការកែលម្អជំនាញ',
                ],
                'meta_description' => [
                    'en' => 'Explore our range of training programs designed to enhance your skills and meet global industry standards.',
                    'km' => 'ស្វែងយល់ពីកម្មវិធីបណ្តុះបណ្តាលរបស់យើងដែលមានគោលបំណងបង្កើនជំនាញ និងបំពេញតាមស្តង់ដារអន្តរជាតិ។',
                ],
                'meta_keywords' => [
                    'en' => 'training, skills, education',
                    'km' => 'ការបណ្តុះបណ្តាល, ជំនាញ, ការអប់រំ',
                ],
                'og_title' => [
                    'en' => 'Training Programs',
                    'km' => 'កម្មវិធីបណ្តុះបណ្តាល',
                ],
                'og_description' => [
                    'en' => 'Empower your team with our expert training programs designed for success in the modern business world.',
                    'km' => 'ផ្តល់ឱកាសដល់ក្រុមការងាររបស់អ្នកជាមួយកម្មវិធីបណ្តុះបណ្តាលរបស់យើងដែលត្រូវបានរចនាឡើងសម្រាប់ជោគជ័យក្នុងពិភពអាជីវកម្មសព្វថ្ងៃ។',
                ],
                'og_image' => 'seo/training-og-image.png',
            ],
            'about' => [
                'url' => [
                    'en' => 'about',
                    'km' => 'km/about',
                ],
                'meta_title' => [
                    'en' => 'About Us – Learn More About AVE',
                    'km' => 'អំពីយើង – ស្វែងយល់បន្ថែមអំពី AVE',
                ],
                'meta_description' => [
                    'en' => 'Discover more about AVE, our mission, values, and the services we provide to support your business.',
                    'km' => 'ស្វែងយល់បន្ថែមអំពី AVE, គោលបំណង និងតម្លៃរបស់យើង និងសេវាកម្មដែលយើងផ្តល់ឱ្យដើម្បីគាំទ្រអាជីវកម្មរបស់អ្នក។',
                ],
                'meta_keywords' => [
                    'en' => 'about, AVE, company',
                    'km' => 'អំពី, AVE, ក្រុមហ៊ុន',
                ],
                'og_title' => [
                    'en' => 'About AVE',
                    'km' => 'អំពី AVE',
                ],
                'og_description' => [
                    'en' => 'Learn about AVE, a leading provider of inspection and certification services with a commitment to quality.',
                    'km' => 'ស្វែងយល់អំពី AVE ដែលជាអ្នកផ្តល់សេវាកម្មត្រួតពិនិត្យ និងវិញ្ញាបនបត្រដែលមានការប្តេជ្ញាចិត្តក្នុងគុណភាព។',
                ],
                'og_image' => 'seo/about-og-image.png',
            ],
            'contact' => [
                'url' => [
                    'en' => 'contact',
                    'km' => 'km/contact',
                ],
                'meta_title' => [
                    'en' => 'Contact Us – Get in Touch with AVE',
                    'km' => 'ទាក់ទងមកយើង – ទំនាក់ទំនងជាមួយ AVE',
                ],
                'meta_description' => [
                    'en' => 'Get in touch with AVE for expert advice, inspection services, and certifications to enhance your business.',
                    'km' => 'ទំនាក់ទំនងជាមួយ AVE សម្រាប់ការផ្តល់អនុសាសន៍វិជ្ជាជីវៈ សេវាកម្មត្រួតពិនិត្យ និងវិញ្ញាបនបត្រដើម្បីបង្កើនអាជីវកម្មរបស់អ្នក។',
                ],
                'meta_keywords' => [
                    'en' => 'contact, support, AVE',
                    'km' => 'ទំនាក់ទំនង, ការគាំទ្រ, AVE',
                ],
                'og_title' => [
                    'en' => 'Contact AVE',
                    'km' => 'ទំនាក់ទំនង AVE',
                ],
                'og_description' => [
                    'en' => 'Reach out to AVE for all your inspection and certification needs.',
                    'km' => 'ទំនាក់ទំនងមក AVE សម្រាប់តម្រូវការទាំងអស់នៃការត្រួតពិនិត្យ និងវិញ្ញាបនបត្រ។',
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
