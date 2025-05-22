<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add(
            'training.hero_image',
            '/assets/images/about/banner.jpg'
        );

        $this->migrator->add('training.title', [
            'en' => 'Ensuring Quality & Compliance Through Expert Inspections!',
            'km' =>
                'ការធានាគុណភាព និងការគោរពតាមបទបញ្ជា តាមរយៈការត្រួតពិនិត្យដោយអ្នកជំនាញ!',
        ]);

        $this->migrator->add('training.description', [
            'en' =>
                'We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements.',
            'km' =>
                'យើងផ្តល់សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់ដោយឯករាជ្យ ដើម្បីជួយអាជីវកម្មឱ្យបំពេញតាមស្តង់ដារឧស្សាហកម្ម និងលក្ខខណ្ឌផ្នែកនិតិវិធី។',
        ]);

        $this->migrator->add('training.training_title', [
            'en' => 'Training Program',
            'km' => 'កម្មវិធីបណ្តុះបណ្តាល',
        ]);

        $this->migrator->add('training.training_program_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Software Development Bootcamp',
                    'km' => 'វគ្គបណ្តុះបណ្តាលអភិវឌ្ឃន៍កម្មវិធី',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Data Science Training',
                    'km' => 'វគ្គបណ្តុះបណ្តាលវិទ្យាសាស្ត្រទិន្នន័យ',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Data Science Training',
                    'km' => 'វគ្គបណ្តុះបណ្តាលវិទ្យាសាស្ត្រទិន្នន័យ',
                ],
            ],
        ]);
        $this->migrator->add('training.consulting_services_title', [
            'en' => 'Consulting Services',
            'km' => 'សេវាកម្មប្រឹក្សា',
        ]);
        $this->migrator->add('training.consulting_services_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Cybersecurity Assessment',
                    'km' => 'ការប៉ាន់ប្រមាណសន្តិសុខសាយបឺរ',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Cybersecurity Assessment',
                    'km' => 'ការប៉ាន់ប្រមាណសន្តិសុខសាយបឺរ',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Business Strategy Consulting',
                    'km' => 'ការផ្តល់យោបល់យុទ្ធសាស្ត្រអាជីវកម្ម',
                ],
            ],
        ]);
    }
};
