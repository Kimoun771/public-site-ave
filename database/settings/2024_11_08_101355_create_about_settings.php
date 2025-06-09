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
            'en' => 'Discover Our Expertise in Certification, Inspection, and Compliance!',
            'km' =>
                'ស្វែងយល់ពីជំនាញរបស់យើងក្នុងវិញ្ញាបនបត្រ ការត្រួតពិនិត្យ និងការអនុលោម!',
        ]);
        $this->migrator->add('about.description', [
            'en' =>
                'we specialize in providing reliable certification, inspection, and consultancy services to help businesses achieve global compliance and operational excellence.',
            'km' =>
                'យើងមានជំនាញក្នុងការផ្ដល់សេវាកម្មវិញ្ញាបនបត្រ ការត្រួតពិនិត្យ និងការប្រឹក្សាដោយមានទំនុកចិត្ត ដើម្បីជួយអាជីវកម្មក្នុងការអនុលោមតាមស្ដង់ដារអន្ដរជាតិ និងការលើកស្ទួយប្រសិទ្ធភាពប្រតិបត្តិការ។',
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
                        'At AVE, we specialize in certification, inspection, and training services, ensuring businesses meet global compliance and safety standards. Our goal is to enhance credibility, efficiency, and operational excellence through trusted and transparent certification solutions.',
                    'km' =>
                        'នៅ AVE យើងមានជំនាញពិសេសក្នុងការផ្ដល់សេវាកម្មវិញ្ញាបនបត្រ ការត្រួតពិនិត្យ និងការបណ្តុះបណ្តាល ដើម្បីធានាថា អាជីវកម្មអាចបំពេញតាមស្ដង់ដារអន្ដរជាតិទាក់ទងនឹងការអនុលោមតាម និងសុវត្ថិភាព។ គោលបំណងរបស់យើងគឺ ដើម្បីបង្កើនឥទ្ធិពល ភាពមានប្រសិទ្ធភាព និងលទ្ធផលប្រតិបត្តិការល្អ ដោយឧបត្ថម្ភដោយដំណោះស្រាយវិញ្ញាបនបត្រដែលមានការជឿជាក់ និងភាពតម្លាភាព',
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
                        'We are a dedicated provider of Inspection, Verification, and Certification services, committed to helping organizations meet the highest standards of quality, safety, and compliance. With a strong foundation in integrity and technical expertise, AVE serves businesses across various industries, supporting them in achieving regulatory compliance, operational efficiency, and sustainable growth. At AVE, we believe in empowering our clients with the confidence to operate responsibly and competitively in an increasingly complex world. Our team of qualified professionals brings deep industry knowledge, international best practices, and a commitment to excellence in every service we deliver.Whether you’re improving product quality, managing risks, securing information, or ensuring food and workplace safety — AVE is your trusted partner for independent assurance.',
                    'km' =>
                        'យើងជាអ្នកផ្ដល់សេវាកម្មត្រួតពិនិត្យ ការផ្ទៀងផ្ទាត់ និងវិញ្ញាបនបត្រដែលមានការប្តេជ្ញាចិត្ត ដើម្បីជួយអង្គការបំពេញតាមស្តង់ដាខ្ពស់បំផុតនៃគុណភាព សុវត្ថិភាព និងការអនុលោម។ ជាមួយមូលដ្ឋានគ្រឹះដ៏រឹងមាំក្នុងភាពស្មោះត្រង់ និងជំនាញបច្ចេកទេស AVE ផ្ដល់សេវាកម្មជូនអាជីវកម្មនៅវិស័យផ្សេងៗ ដើម្បីគាំទ្រការអនុលោមតាមបទប្បញ្ញត្តិ ប្រសិទ្ធភាពប្រតិបត្តិការ និងការលូតលាស់មានចីរភាព។ នៅ AVE យើងជឿជាក់ថា ការផ្តល់សិទ្ធិដល់អតិថិជនអោយមានទំនុកចិត្តក្នុងការប្រតិបត្តិការដោយមានទំនួលខុសត្រូវ និងប្រកួតប្រជែងក្នុងពិភពលោកកាន់តែស្មុគស្មាញ គឺជាគន្លឹះដ៏សំខាន់។ ក្រុមការងារដែលមានគុណវុឌ្ឍិរបស់យើងមានចំណេះដឹងជ្រៅជ្រោងអំពីវិស័យ ប្រើប្រាស់អនុវត្តន៍ល្អបំផុតអន្តរជាតិ និងមានការប្តេជ្ញាចិត្តក្នុងភាពល្អឥតខ្ចោះក្នុងសេវាកម្មគ្រប់យ៉ាងដែលយើងផ្ដល់ជូន។ មិនថាអ្នកកំពុងធ្វើឲ្យគុណភាពផលិតផលប្រសើរឡើង គ្រប់គ្រងហានិភ័យ ការពារព័ត៌មាន ឬធានាសុវត្ថិភាពអាហារ និងកន្លែងធ្វើការឡើយ — AVE គឺជាដៃគូដ៏គួរឱ្យទុកចិត្តរបស់អ្នកសម្រាប់ការធានាជាក់លាក់ដោយឯករាជ្យ។',
                ],
            ],
        ]);
    }
};
