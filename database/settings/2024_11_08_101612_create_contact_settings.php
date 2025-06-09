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
            'en' => 'Get In Touch With Us for Expert Certification Services!',
            'km' => 'ទំនាក់ទំនងមកយើងខ្ញុំសម្រាប់សេវាវិញ្ញាបនបត្រជំនាញ!',
        ]);

        $this->migrator->add('contact.description', [
            'en' =>
                'Contact us for certification verification, quality inspections, and expert consultancy in your industry.',
            'km' =>
                'ទំនាក់ទំនងយើងសម្រាប់ការផ្ទៀងផ្ទាត់វិញ្ញាបនបត្រសេវាកម្ម, ការត្រួតពិនិត្យគុណភាព និងការប្រឹក្សាផ្នែកជំនាញក្នុងឧស្សាហកម្មរបស់អ្នក។',
        ]);

        $this->migrator->add('contact.contact_info', [
            [
                'name' => [
                    'en' => 'Malaysia',
                    'km' => 'ម៉ាឡេសុី',
                ],
                'phone' => '+855 23 456 789',
                'email' => 'info-kh@mycompany.com',
                'address' => [
                    'en' =>
                        'Unit 67, 2nd Floor 25, Plaza Danau 2, Jalan 5/109 F, Taman Danau Desa, 58100 Kuala Lumpur, Wilayah Persekutuan, Malaysia',
                    'km' =>
                        'ឯកតា ៦៧, ជាន់ទី ២, ផ្លាសា ដាណៅ ២, ផ្លូវ ៥/១០៩ អេហ្វ, តាម៉ាន់ ដាណៅ ដេសា, ៥៨១០០ កូឡាលាំពូរ, វិល័យបឺសឺកូតូអាន,ម៉ាឡេស៊ី',
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
                    'en' => 'Cambodia',
                    'km' => 'កម្ពុជា',
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
