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
            'en' => 'Ensuring Quality & Compliance Through Expert Inspections!',
            'km' =>
                'ការធានាគុណភាព និងការគោរពតាមបទបញ្ជា តាមរយៈការត្រួតពិនិត្យដោយអ្នកជំនាញ!',
        ]);
        $this->migrator->add('inspection.description', [
            'en' =>
                'We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements.',
            'km' =>
                'យើងផ្តល់សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់ដោយឯករាជ្យ ដើម្បីជួយអាជីវកម្មឱ្យបំពេញតាមស្តង់ដារឧស្សាហកម្ម និងលក្ខខណ្ឌផ្នែកនិតិវិធី។',
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
