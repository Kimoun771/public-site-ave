<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $this->migrator->add(
            'contact.hero_image',
            '/assets/images/about/banner.jpg'
        );

        $this->migrator->add('contact.title', [
            'en' => 'Ensuring Quality & Compliance Through Expert Inspections!',
            'km' =>
                'ការធានាគុណភាព និងការគោរពតាមបទបញ្ជា តាមរយៈការត្រួតពិនិត្យដោយអ្នកជំនាញ!',
        ]);

        $this->migrator->add('contact.description', [
            'en' =>
                'We provide independent inspection and verification services to help businesses meet industry standards and regulatory requirements.',
            'km' =>
                'យើងផ្តល់សេវាកម្មត្រួតពិនិត្យ និងផ្ទៀងផ្ទាត់ដោយឯករាជ្យ ដើម្បីជួយអាជីវកម្មឱ្យបំពេញតាមស្តង់ដារឧស្សាហកម្ម និងលក្ខខណ្ឌផ្នែកនិតិវិធី។',
        ]);

        $this->migrator->add('contact.contact_info', [
            [
                'name' => [
                    'en' => 'Cambodia',
                    'km' => 'កម្ពុជា',
                ],
                'phone' => '+855 23 456 789',
                'email' => 'info-kh@mycompany.com',
                'address' => [
                    'en' =>
                        'No 185D St.K4B Phumi, Trung Morn St, Phnom Penh, Cambodia',
                    'km' =>
                        'លេខ ១៨៥ ផ្លូវ K4B ភូមិ ផ្លូវ ទ្រុង មន ភ្នំពេញ កម្ពុជា',
                ],
                'working_hour' => [
                    'en' => 'Monday To Friday 08:00AM To 05:00PM',
                    'km' => 'ចន្ទ ដល់ សុក្រ ម៉ោង ៨:០០ ដល់ ១៧:០០',
                ],
                'map_url' => 'https://maps.example.com/location1',
            ],
            [
                'name' => [
                    'en' => 'Indonesia',
                    'km' => 'ឥណ្ឌូនេស៊ី',
                ],
                'phone' => '+62 21 789 0123',
                'email' => 'info-id@mycompany.com',
                'address' => [
                    'en' => 'Jl. Sudirman No. 123, Jakarta, Indonesia',
                    'km' => 'ផ្លូវ សុឌីម៉ាន់ លេខ ១២៣ ទីក្រុងចាការតា ឥណ្ឌូនេស៊ី',
                ],
                'working_hour' => [
                    'en' => 'Monday To Friday 09:00AM To 06:00PM',
                    'km' => 'ចន្ទ ដល់ សុក្រ ម៉ោង ៩:០០ ដល់ ១៨:០០',
                ],
                'map_url' => 'https://maps.example.com/location2',
            ],
            [
                'name' => [
                    'en' => 'Malaysia',
                    'km' => 'ម៉ាឡេស៊ី',
                ],
                'phone' => '+603 2145 6789',
                'email' => 'info-my@mycompany.com',
                'address' => [
                    'en' => '123 Jalan Sultan Ismail, Kuala Lumpur, Malaysia',
                    'km' =>
                        '១២៣ ផ្លូវ សុលតាន់ អ៊ីស្ម៉ាអ៊ីល កូឡាឡាំពួរ ម៉ាឡេស៊ី',
                ],
                'working_hour' => [
                    'en' => 'Monday To Friday 08:30AM To 05:30PM',
                    'km' => 'ចន្ទ ដល់ សុក្រ ម៉ោង ៨:៣០ ដល់ ១៧:៣០',
                ],
                'map_url' => 'https://maps.example.com/location3',
            ],
            [
                'name' => [
                    'en' => 'Singapore',
                    'km' => 'សិង្ហបូរី',
                ],
                'phone' => '+65 6123 4567',
                'email' => 'info-sg@mycompany.com',
                'address' => [
                    'en' => '123 Orchard Road, Singapore',
                    'km' => '១២៣ ផ្លូវ អរឆឌ សិង្ហបូរី',
                ],
                'working_hour' => [
                    'en' => 'Monday To Friday 08:30AM To 05:30PM',
                    'km' => 'ចន្ទ ដល់ សុក្រ ម៉ោង ៨:៣០ ដល់ ១៧:៣០',
                ],
                'map_url' => 'https://maps.example.com/location4',
            ],
        ]);
    }
};
