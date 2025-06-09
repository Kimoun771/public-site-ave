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
            'en' => 'Enhance Your Skills with Our Expert Training Programs!',
            'km' => 'បង្កើនជំនាញរបស់អ្នកជាមួយកម្មវិធីបណ្តុះបណ្តាលដែលមានជំនាញរបស់យើង!',
        ]);

        $this->migrator->add('training.description', [
            'en' => 'Our training programs are designed to empower professionals with the skills and knowledge needed to achieve excellence in their fields, ensuring compliance with industry standards.',
            'km' => 'កម្មវិធីបណ្តុះបណ្តាលរបស់យើងត្រូវបានរចនាឡើងដើម្បីជួយដល់វិជ្ជាជីវៈក្នុងការផ្តល់ជំនាញ និងចំណេះដឹងដែលចាំបាច់ ដើម្បីសម្រេចបាននូវភាពល្អឥតខ្ចោះក្នុងដែនការរបស់ពួកគេ ដោយធានាការអនុលោមតាមស្តង់ដារឧស្សាហកម្ម។',
        ]);

        $this->migrator->add('training.training_title', [
            'en' => 'Training Program',
            'km' => 'កម្មវិធីបណ្តុះបណ្តាល',
        ]);

        $this->migrator->add('training.training_program_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Cyber Security and Information Security',
                    'km' => 'វិញ្ញាបនបត្រសុវត្ថិភាពបណ្ដាញ និងសុវត្ថិភាពព័ត៌មាន',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Asset and Facility Management',
                    'km' => 'ការគ្រប់គ្រងទ្រព្យសម្បត្តិ និងអគារដ្ឋាន',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Environmental and Sustainability',
                    'km' => 'បរិស្ថាន និងភាពចិញ្ចឹមនិរន្តរ៍',
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
