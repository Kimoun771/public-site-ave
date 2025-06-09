<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->migrator->add(
            'inspection.hero_image',
            '/assets/images/about/banner.jpg'
        );
        $this->migrator->add('inspection.title', [
            'en' => 'Achieve Precision and Compliance with Expert Inspection Services!',
            'km' => 'សម្រេចបាននូវភាពត្រឹមត្រូវ និងការអនុលោមជាមួយសេវាកម្មត្រួតពិនិត្យជំនាញ!',
        ]);
        $this->migrator->add('inspection.description', [
            'en' => 'Our independent inspection and verification services help organizations ensure compliance with global standards, improving product quality and operational efficiency.',
            'km' => 'សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់ដោយឯករាជ្យរបស់យើងជួយអង្គការធានាថាអនុលោមតាមស្តង់ដារអន្ដរជាតិ បង្កើនគុណភាពផលិតផល និងប្រសិទ្ធភាពប្រតិបត្តិការ។',
        ]);
        $this->migrator->add('inspection.assurance_and_compliance_title', [
            'en' => 'Quality Assurance & Compliance',
            'km' => 'ការធានាគុណភាព និងការគោរពតាមបទបញ្ជា',
        ]);
        $this->migrator->add(
            'inspection.assurance_and_compliance_description',
            [
                'en' =>
                    'Our inspection and verification services ensure products and services meet industry standards with precision and reliability.',
                'km' =>
                    'សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់របស់យើងធានាថា ផលិតផល និងសេវាកម្មបំពេញតាមស្តង់ដារឧស្សាហកម្ម ដោយមានភាពត្រឹមត្រូវ និងអាចទុកចិត្តបាន។',
            ]
        );
        $this->migrator->add('inspection.assurance_and_compliance_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Factory Inspection',
                    'km' => 'ការត្រួតពិនិត្យរោងចក្រ',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Product Testing',
                    'km' => 'ការធ្វើតេស្តផលិតផល',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'des' => [
                    'en' => 'Quality Control',
                    'km' => 'ការត្រួតពិនិត្យគុណភាព',
                ],
            ],
        ]);
    }
};
