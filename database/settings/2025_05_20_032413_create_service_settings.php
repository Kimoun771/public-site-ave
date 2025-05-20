<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('service.services', [
            [
                'name' => ['en' => 'Quality Management System', 'kh' => 'ប្រព័ន្ធគ្រប់គ្រងគុណភាព'],
                'description' => [
                    'en' => 'Quality Management System is suitable for any organization looking to improve the way it is operated and managed, regardless of industry and size. With our auditor teams, we can help you realize the benefits of your quality management system to ensure.',
                    'kh' => 'ប្រព័ន្ធគ្រប់គ្រងគុណភាពគឺសមស្របសម្រាប់អង្គការណាមួយដែលចង់បានការកែលម្អវិធីសាស្ត្រគ្រប់គ្រង និងប្រតិបត្តិការ ដោយមិនគិតពីឧស្សាហកម្ម និងទំហំ។ ជាមួយនឹងក្រុមសវនកររបស់យើង យើងអាចជួយអ្នកឱ្យសម្រេចបាននូវអត្ថប្រយោជន៍នៃប្រព័ន្ធគ្រប់គ្រងគុណភាពរបស់អ្នក។',
                ],
                'image' => 'images/quality_management.jpg',
            ],
            [
                'name' => ['en' => 'Environmental & Energy', 'kh' => 'បរិស្ថាន និងថាមពល'],
                'description' => [
                    'en' => 'Environmental Management System (EMS) and Energy Management System are the standards designed to address the delicate balance between maintaining profitability and reducing significant environmental impact and energy used, with the commitment of your.',
                    'kh' => 'ប្រព័ន្ធគ្រប់គ្រងបរិស្ថាន (EMS) និងប្រព័ន្ធគ្រប់គ្រងថាមពលគឺជាស្តង់ដារដែលត្រូវបានរចនាឡើងដើម្បីដោះស្រាយតុល្យភាពរវាងការរក្សាប្រាក់ចំណេញ និងកាត់បន្ថយផលប៉ះពាល់បរិស្ថាន និងថាមពលដែលបានប្រើប្រាស់ ជាមួយនឹងការប្តេជ្ញាចិត្តរបស់អ្នក។',
                ],
                'image' => 'images/environmental_energy.jpg',
            ],
            [
                'name' => ['en' => 'Food Safety', 'kh' => 'សុវត្ថិភាពចំណីអាហារ'],
                'description' => [
                    'en' => 'Food Safety Management System is a truly standard suitable for any business in the entire food chain such as food producers, packaging suppliers, chemical producers and other related parties.',
                    'kh' => 'ប្រព័ន្ធគ្រប់គ្រងសុវត្ថិភាពចំណីអាហារគឺជាស្តង់ដារដែលសមស្របសម្រាប់អាជីវកម្មណាមួយនៅក្នុងខ្សែសង្វាក់អាហារទាំងមូល ដូចជាអ្នកផលិតអាហារ អ្នកផគត់ផ្គង់វេចខ្ចប់ អ្នកផលិតគីមី និងភាគីពាក់ព័ន្ធផ្សេងទៀត។',
                ],
                'image' => 'images/food_safety.jpg',
            ],
            [
                'key' => 'occupational_safety',
                'name' => ['en' => 'Occupational Safety and Health', 'kh' => 'សុវត្ថិភាព និងសុខភាពការងារ'],
                'description' => [
                    'en' => 'ISO 45001 the standard for occupational health and safety management systems. The standard provides you a framework to increase safety, reduce workplace risks and enhance health and safety in your workplace.',
                    'kh' => 'ISO 45001 ជាស្តង់ដារសម្រាប់ប្រព័ន្ធគ្រប់គ្រងសុខភាព និងសុវត្ថិភាពការងារ។ ស្តង់ដារនេះផ្តល់ឱ្យអ្នកនូវក្របខ័ណ្ឌដើម្បីបង្កើនសុវត្ថិភាព កាត់បន្ថយហានិភ័យនៅកន្លែងធ្វើការ និងលើកកម្ពស់សុខភាព និងសុវត្ថិភាពនៅកន្លែងធ្វើការរបស់អ្នក។',
                ],
                'image' => 'images/occupational_safety.jpg',
            ],
            [
                'name' => ['en' => 'Personnel Certification', 'kh' => 'វិញ្ញាបនប័ត្របុគ្គលិក'],
                'description' => [
                    'en' => 'ISO 17024 an international ISO standard contains principles and requirements for a body certifying persons against specific requirements, and includes the development and maintenance of a certification scheme for persons.',
                    'kh' => 'ISO 17024 ជាស្តង់ដាអន្តរជាតិ ISO ដែលមានគោលការណ៍ និងតម្រូវការសម្រាប់ស្ថាប័នមួយដែលផ្តល់វិញ្ញាបនប័ត្រដល់បុគ្គលតាមតម្រូវការជាក់លាក់ និងរួមបញ្ចូលការអភិវឌ្ឍន៍ និងថែទាំគម្រោងវិញ្ញាបនប័ត្រសម្រាប់បុគ្គល។',
                ],
                'image' => 'images/personnel_certification.jpg',
            ],
        ]);
    }

    public function down(): void
    {
        $this->migrator->delete('service.services');
    }
};
