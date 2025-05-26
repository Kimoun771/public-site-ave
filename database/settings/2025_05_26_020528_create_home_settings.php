<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('home.slide_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' =>
                        'Achieve Compliance with Globally Recognized Certifications!',
                    'km' =>
                        'សម្រេចបាននូវការអនុលោមតាមវិញ្ញាបនបត្រដែលទទួលស្គាល់ជាសកល!',
                ],
                'description' => [
                    'en' =>
                        'Get internationally accredited certifications for quality and environmental compliance to enhance your business credibility.',
                    'km' =>
                        'ទទួលបានវិញ្ញាបនបត្រដែលទទួលស្គាល់អន្តរជាតិសម្រាប់គុណភាព និង ការអនុលោម តាមបរិស្ថាន ដើម្បីបង្កើនឥទ្ធិឱណភាពអាជីវកម្មរបស់អ្នក',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Enhance Sustainability with Certified Standards!',
                    'km' => 'បង្កើនស្ថិរភាពដោយប្រើស្តង់ដារដែលមានវិញ្ញាបនបត្រ!',
                ],
                'description' => [
                    'en' =>
                        'Obtain certifications that support your organization\'s environmental and social responsibility goals.',
                    'km' =>
                        'ទទួលបានវិញ្ញាបនបត្រដែលគាំទ្រគោលបំណងនៃការទទួលខុសត្រូវផ្នែកបរិស្ថាន និងសង្គមរបស់អង្គភាពរបស់អ្នក',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' =>
                        'Drive Business Excellence with Trusted Certifications!',
                    'km' =>
                        'ជំរុញភាពល្អឥតខ្ចោះក្នុងអាជីវកម្មជាមួយវិញ្ញាបនបត្រដែលទុកចិត្តបាន!',
                ],
                'description' => [
                    'en' =>
                        'Boost customer confidence and operational efficiency with globally recognized certifications.',
                    'km' =>
                        'ជំរុញទំនុកចិត្តរបស់អតិថិជន និងប្រសិទ្ធភាពប្រតិបត្តិការជាមួយវិញ្ញាបនបត្រដែលទទួលស្គាល់ជាសកល',
                ],
            ],
        ]);

        $this->migrator->add('home.vecert', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'VE CERT',
                    'km' => 'VE CERT',
                ],
                'description' => [
                    'en' =>
                        'VE Cert is an independent inspection, verification and certification company which benchmarks international standards from time to time. We are constantly improving our services to exceed customers and market\'s expectations in order to provide the BEST SERVICES in the market.',
                    'km' =>
                        'VE Cert គឺជាក្រុមហ៊ុនឯករាជ្យផ្នែកត្រួតពិនិត្យ បញ្ជាក់ និងផ្ដល់វិញ្ញាបនបត្រ ដែលធៀបទៅនឹងស្តង់ដារអន្តរជាតិជាប្រចាំ។ យើងកំពុងបន្តបង្កើនគុណភាពសេវាកម្មយ៉ាងឥតឈប់ឈរ ដើម្បីលើសលប់ចំពោះការរំពឹងទុករបស់អតិថិជន និងទីផ្សារ ដោយផ្ដល់សេវាកម្មល្អបំផុតក្នុងទីផ្សារ។',
                ],
                'slug' => [
                    'en' => 'about',
                    'km' => 'about',
                ],
            ],
        ]);

        $this->migrator->add('home.vecert_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Inspection',
                    'km' => 'ការត្រួតពិនិត្យ',
                ],
                'description' => [
                    'en' =>
                        'Our comprehensive range of inspection and verification services, such as checking the condition to ensure your products and services are within the customers\' specifications.',
                    'km' =>
                        'សេវាកម្មត្រួតពិនិត្យ និងបញ្ជាក់ជាច្រើនរបស់យើង ដូចជា ការត្រួតពិនិត្យសភាព ដើម្បីធានាថាផលិតផល និងសេវាកម្មរបស់អ្នកស្របតាមលក្ខណៈបច្ចេកទេសរបស់អតិថិជន',
                ],
            ],
            [
                'image' => '/assets/images/about/jnd.jpg',
                'title' => [
                    'en' => 'Verification',
                    'km' => 'ការបញ្ជាក់',
                ],
                'description' => [
                    'en' =>
                        'Professional verification services to validate compliance with industry standards and regulations.',
                    'km' =>
                        'សេវាកម្មបញ្ជាក់ដោយវិជ្ជាជីវៈ ដើម្បីបញ្ជាក់ការអនុលោមតាមស្តង់ដារ និងបទប្បញ្ញត្តិឧស្សាហកម្ម',
                ],
            ],
        ]);

        $this->migrator->add('home.our_client_image_des', [
            'images' => [
                '/assets/images/clients/client1.jpg',
                '/assets/images/clients/client2.jpg',
                '/assets/images/clients/client3.jpg',
            ],
            'title' => [
                'en' => 'Our Clients',
                'km' => 'អតិថិជនរបស់យើង',
            ],
            'description' => [
                'en' => 'We have been working with some Fortune 500+ clients',
                'km' =>
                    'យើងបានសហការជាមួយអតិថិជនខ្លះៗក្នុងចំណោមក្រុមហ៊ុន Fortune 500+',
            ],
        ]);
    }

    public function down(): void
    {
        $this->migrator->delete('home.slide_image_des');
        $this->migrator->delete('home.vecert');
        $this->migrator->delete('home.vecert_image_des');
        $this->migrator->delete('home.our_client_image_des');
    }
};
