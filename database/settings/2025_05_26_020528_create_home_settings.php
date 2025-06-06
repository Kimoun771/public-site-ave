<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration {
    public function up(): void
    {
        $this->migrator->add('home.slide_image_des', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Unlock Global Compliance with Accredited Certifications!',
                    'km' => 'បើកឱកាសអន្ដរជាតិនឹងវិញ្ញាបនបត្រដែលទទួលស្គាល់!',
                ],
                'description' => [
                    'en' => 'Achieve international certification for quality and environmental compliance, enhancing your brand’s trust and credibility.',
                    'km' => 'សម្រេចបាននូវវិញ្ញាបនបត្រអន្តរជាតិ សម្រាប់គុណភាព និងការអនុលោមតាមបរិស្ថាន ដើម្បីបង្កើនការជឿជាក់ និងភាពត្រឹមត្រូវរបស់ម៉ាករបស់អ្នក',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Achieve Sustainability with Certified Standards!',
                    'km' => 'សម្រេចបាននូវភាពអនុលោម និងស្ថិរភាព ជាមួយវិញ្ញាបនបត្រដែលមានស្ដង់ដារ!',
                ],
                'description' => [
                    'en' => 'Obtain certifications supporting your organization’s sustainable and responsible practices.',
                    'km' => 'ទទួលបានវិញ្ញាបនបត្រដែលគាំទ្រការអនុវត្តន៍នយោបាយស្ថិរភាព និងមានការទទួលខុសត្រូវ',
                ],
            ],
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'Strengthen Business Trust with Accredited Certifications!',
                    'km' => 'ធ្វើឱ្យមានភាពជឿជាក់ក្នុងអាជីវកម្ម ជាមួយវិញ្ញាបនបត្រដែលទទួលស្គាល់!',
                ],
                'description' => [
                    'en' => 'Boost customer trust and operational excellence with certifications recognized globally.',
                    'km' => 'បង្កើនការជឿជាក់របស់អតិថិជន និងប្រសិទ្ធភាពប្រតិបត្តិការជាមួយវិញ្ញាបនបត្រដែលទទួលស្គាល់នៅទូទាំងពិភពលោក',
                ],
            ],
        ]);

        $this->migrator->add('home.vecert', [
            [
                'image' => '/assets/images/about/chandan.jpg',
                'title' => [
                    'en' => 'AVE',
                    'km' => 'AVE',
                ],
                'description' => [
                    'en' =>
                        'At AVE, we specialize in providing trusted Inspection, Verification, and Certification services to ensure quality, safety, and compliance across industries. With a commitment to integrity, precision, and global standards, we empower businesses to operate with confidence and transparency.Whether you`re navigating regulatory requirements, seeking third-party validation, or striving for operational excellence, AVE is your reliable partner for end-to-end assurance solutions.Your standards, verified. Your systems, certified. Your peace of mind, guaranteed.',
                    'km' =>
                        'នៅក្រុមហ៊ុន AVE យើងមានជំនាញផ្តល់សេវាកម្មត្រួតពិនិត្យ ការផ្ទៀងផ្ទាត់ និងវិញ្ញាបនបត្រដែលអាចទុកចិត្តបាន ដើម្បីធានាថាមានគុណភាព សុវត្ថិភាព និងការអនុលោមតាមបទបញ្ញត្តិ ក្នុងវិស័យផ្សេងៗ។ ដោយមានការប្តេជ្ញាចិត្តក្នុងភាពស្មោះត្រង់ ភាពត្រឹមត្រូវ និងស្តង់ដារជាសកល យើងជួយអាជីវកម្មឱ្យអាចប្រតិបត្តិការបានដោយមានជំនឿចិត្ត និងភាពថ្លៃថ្នូរ។មិនថាអ្នកកំពុងរុករកតាមលក្ខខណ្ឌនីតិប័ត្រ ស្វែងរកការផ្ទៀងផ្ទាត់ពីភាគីទីបី ឬខិតខំប្រឹងប្រែងឱ្យឈានដល់ភាពល្អឥតខ្ចោះក្នុងប្រតិបត្តិការ AVE ជាដៃគូរដែលអាចទុកចិត្តបានសម្រាប់ដំណោះស្រាយធានាតាំងពីដំបូងដល់ចុង។ ស្តង់ដាររបស់អ្នក ត្រូវបានផ្ទៀងផ្ទាត់។ ប្រព័ន្ធរបស់អ្នក ត្រូវបានវិញ្ញាបនបត្រ។ ការស្ងប់ចិត្តរបស់អ្នក ត្រូវបានធានា។',
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
                        'Our inspection services provide an independent assessment of products, systems, and processes to ensure they meet specified requirements. From production to delivery, AVE helps identify defects, reduce risks, and ensure compliance with industry standards. Key areas: Quality control, pre-shipment inspection, factory audits, on-site checks.
',
                    'km' =>
                        'សសេវាកម្មត្រួតពិនិត្យរបស់យើងផ្តល់ការវាយតម្លៃដោយឯករាជ្យលើផលិតផល ប្រព័ន្ធ និងដំណើរការ ដើម្បីធានាថាវាអនុលោមតាមលក្ខណៈវិសាលភាពដែលបានកំណត់។ ចាប់ពីការផលិតរហូតដល់ការដឹកជញ្ជូន AVE ជួយកំណត់កំហុស កាត់បន្ថយហានិភ័យ និងធានាការអនុលោមតាមស្តង់ដារឧស្សាហកម្ម។វិស័យសំខាន់ៗ៖ ការគ្រប់គ្រងគុណភាព ការត្រួតពិនិត្យមុនដឹកជញ្ជូន ការសម្ភាសន៍រោងចក្រ ការត្រួតពិនិត្យនៅលើតំបន់។',
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
                        'Verification is the process of confirming that information, claims, or processes meet set criteria or standards. AVE offers objective and evidence-based verification to help you build trust with stakeholders and meet regulatory or client-specific requirements. Key areas: Document review, data validation, supply chain traceability, sustainability claims.',
                    'km' =>
                        'ការផ្ទៀងផ្ទាត់គឺជាដំណើរការបញ្ជាក់ថាព័ត៌មាន ការអះអាង ឬដំណើរការណាមួយ អនុលោមតាមលក្ខខណ្ឌ ឬស្តង់ដារដែលបានកំណត់។ AVE ផ្តល់សេវាកម្មផ្ទៀងផ្ទាត់យ៉ាងមានវាងវៃ និងផ្អែកលើភស្តុតាង ដើម្បីជួយអ្នកស្ថាបនាការជឿជាក់ជាមួយភាគីពាក់ព័ន្ធ និងបំពេញតម្រូវការរដ្ឋបាល ឬអតិថិជនជាក់លាក់។វិស័យសំខាន់ៗ៖ ការត្រួតពិនិត្យឯកសារ ការផ្ទៀងផ្ទាត់ទិន្នន័យ ដំណើរការតាមដានខ្សែផ្គត់ផ្គង់ ការអះអាងអំពីភាពមាននិរន្តរភាព។',
                ],
            ],
            [
                'image' => '/assets/images/about/jnd1.jpg',
                'title' => [
                    'en' => 'Certification',
                    'km' => 'វិញ្ញាបនបត្រ',
                ],
                'description' => [
                    'en' =>
                        'Certification demonstrates that your systems, products, or services comply with recognized national or international standards. AVE offers accredited certification services that support credibility, improve performance, and open access to global markets. Key areas: ISO standards, product certification, management system certification. ',
                    'km' =>
                        'វិញ្ញាបនបត្រជាសញ្ញាបង្ហាញថា ប្រព័ន្ធ ផលិតផល ឬសេវាកម្មរបស់អ្នក អនុលោមតាមស្តង់ដារជាតិ ឬអន្ដរជាតិនៃការទទួលស្គាល់។ AVE ផ្តល់សេវាវិញ្ញាបនបត្រដែលទទួលស្គាល់ជាផ្លូវការដើម្បីគាំទ្រភាពគួរឱ្យទុកចិត្ត ធ្វើឱ្យប្រសើរឡើងនូវសមិទ្ធិផល និងបើកឱកាសចូលដល់ទីផ្សារជាសកល។វិស័យសំខាន់ៗ៖ ស្តង់ដារ ISO វិញ្ញាបនបត្រផលិតផល វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រង។',
                ],
            ],
            [
                'image' => '/assets/images/about/jnd1.jpg',
                'title' => [
                    'en' => 'Certification',
                    'km' => 'វិញ្ញាបនបត្រ',
                ],
                'description' => [
                    'en' =>
                        'We provide a platform to you to demonstrate that your products, processes, systems or services are compliant with either national or international standards and regulations or customer defined specification.',
                    'km' =>
                        'ពួកយើងផ្តល់ជូនឱ្យអ្នកនូវវេទិកាដើម្បីបង្ហាញថាផលិតផល, ដំណើរការ, ប្រព័ន្ធ ឬសេវាកម្មរបស់អ្នកស្ថិតក្នុងស្តង់ដារជាតិនិងអន្តរជាតិ ឬស្តង់ដារដែលអតិថិជនកំណត់។',
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
};
