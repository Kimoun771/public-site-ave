<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('service.hero', [
            'title' => [
                'en' => 'Achieve Excellence in Certification & Compliance!',
                'km' => 'សម្រេចបាននូវភាពល្អឥតខ្ចោះក្នុងវិញ្ញាបនបត្រនិងការអនុលោម!',
            ],
            'description' => [
                'en' => 'At AVE, we provide expert inspection, verification, and certification services to help businesses achieve global compliance and operational excellence.',
                'km' => 'នៅ AVE យើងផ្តល់សេវាកម្មត្រួតពិនិត្យ ការផ្ទៀងផ្ទាត់ និងវិញ្ញាបនបត្រដែលមានជំនាញ ដើម្បីជួយអាជីវកម្មសម្រេចបាននូវការអនុលោមជាសកល និងភាពល្អឥតខ្ចោះក្នុងប្រតិបត្តិការ។',
            ],
            'image' => 'images/hero.jpg',
        ]);
        $this->migrator->add('service.services', [
            [
                'name' => ['en' => 'Quality', 'km' => 'គុណភាព'],
                'description' => [
                    'en' => 'Ensure your products, services, and processes consistently meet customer expectations and regulatory standards. AVE’s quality services help organizations implement and maintain robust quality management systems that drive continuous improvement and operational excellence.  Services include:  ISO 9001 Quality Management System Certification, Quality audits and inspections , Process improvement consulting , Supplier quality assessments ',
                    'km' => 'ធានាថា ផលិតផល សេវាកម្ម និងដំណើរការរបស់អ្នក បំពេញតាមទំនុកចិត្តរបស់អតិថិជន និងស្តង់ដាររដ្ឋបាលជាប្រចាំ។ សេវាកម្មគុណភាពរបស់ AVE ជួយស្ថាប័នអនុវត្តន៍ និងរក្សាប្រព័ន្ធគ្រប់គ្រងគុណភាពយ៉ាងរឹងមាំ ដើម្បីជម្រុញការកែលម្អជាបន្តបន្ទាប់ និងភាពល្អឥតខ្ចោះក្នុងប្រតិបត្តិការ។ ​សេវាកម្មរួមមាន៖  វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងគុណភាព ISO 9001, ការត្រួតពិនិត្យ និងសវនកម្មគុណភា, ការពិគ្រោះយោបល់សម្រាប់ការកែលម្អដំណើរការ , ការវាយតម្លៃគុណភាពអ្នកផ្គត់ផ្គង់។',
                ],
                'image' => 'images/quality_management.jpg',
            ],
            [
                'name' => ['en' => 'Environmental & Energy', 'km' => 'បរិស្ថាន និងថាមពល'],
                'description' => [
                    'en' => 'Promote sustainability and improve energy efficiency with AVE’s Environmental & Energy services. We help organizations reduce their environmental impact, comply with regulations, and achieve energy performance goals through recognized international frameworks. Services include: ​ISO 14001 Environmental Management System Certification, ISO 50001 Energy Management System Certification, Environmental impact assessments, Carbon footprint and energy audits.',
                    'km' => 'ផ្សព្វផ្សាយភាពមាននិរន្តរភាព និងបង្កើនប្រសិទ្ធភាពថាមពលជាមួយសេវាកម្មបរិស្ថាន និងថាមពលរបស់ AVE។ យើងជួយស្ថាប័នកាត់បន្ថយផលប៉ះពាល់ដល់បរិស្ថាន អនុលោមតាមបទបញ្ជានានា និងសម្រេចបាននូវគោលដៅសមិទ្ធិផលថាមពលតាមបណ្ដាញស្តង់ដារអន្តរជាតិដែលទទួលស្គាល់។ សេវាកម្មរួមមាន៖ វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងបរិស្ថាន ISO 14001, វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងថាមពល ISO 50001, ការវាយតម្លៃផលប៉ះពាល់បរិស្ថាន, ការវាស់វែងផ្ទុកកាបូន និងសវនកម្មថាមពល។',
                ],
                'image' => 'images/environmental_energy.jpg',
            ],
            [
                'name' => ['en' => 'Food Safety', 'km' => 'សុវត្ថិភាពចំណីអាហារ'],
                'description' => [
                    'en' => ' Protect your brand and safeguard public health with AVE’s food safety solutions. We provide comprehensive services to ensure your food products meet global safety standards, from farm to fork. Services include: ISO 22000 Food Safety Management Certification, HACCP implementation and audits, GMP (Good Manufacturing Practices) verification, Food labeling and traceability checks.',
                    'km' => 'ការពារមុខសញ្ញាអ្នក និងធានាសុខភាពសាធារណៈជាមួយដំណោះស្រាយសុវត្ថិភាពអាហាររបស់ AVE។ យើងផ្តល់សេវាកម្មទូលំទូលាយ ដើម្បីធានាថាផលិតផលអាហាររបស់អ្នកអនុលោមតាមស្តង់ដាសុវត្ថិភាពជាសកល ចាប់ពីការដាំដល់ការបរិភោគ។សេវាកម្មរួមមាន៖ វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងសុវត្ថិភាពអាហារ ISO 22000, ការអនុវត្តន៍ និងសវនកម្ម HACCP, ការផ្ទៀងផ្ទាត់ GMP (ការអនុវត្តផលិតដ៏ល្អ), ការត្រួតពិនិត្យស្លាកអាហារ និងការតាមដានប្រភព។',
                ],
                'image' => 'images/food_safety.jpg',
            ],
            [
                'key' => 'occupational_safety',
                'name' => ['en' => 'Occupational Safety and Health', 'km' => 'សុវត្ថិភាព និងសុខភាពការងារ'],
                'description' => [
                    'en' => 'Create safer, healthier workplaces with AVE’s Occupational Safety and Health services. We support organizations in identifying hazards, managing workplace risks, and complying with national and international safety standards to protect employees and enhance productivity.  Services include: ISO 45001 Occupational Health & Safety Management Certification, Workplace safety audits and inspections, Health and safety training programs, Compliance with local labor and safety regulations ',
                    'km' => 'បង្កើតកន្លែងធ្វើការដែលមានសុវត្ថិភាព និងមានសុខភាពល្អជាមួយសេវាកម្មសុវត្ថិភាព និងអនាម័យអាជីពរបស់ AVE។ យើងគាំទ្រការងារស្ថាប័នក្នុងការរកឃើញគ្រោះថ្នាក់ គ្រប់គ្រងហានិភ័យក្នុងកន្លែងធ្វើការ និងអនុលោមតាមស្តង់ដាសុវត្ថិភាពជាតិ និងអន្ដរជាតិ ដើម្បីការពារបុគ្គលិក និងបង្កើនផលិតភាព។ សេវាកម្មរួមមាន៖ វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងសុខភាព និងសុវត្ថិភាពអាជីព ISO 45001 ការសវនកម្ម និងត្រួតពិនិត្យសុវត្ថិភាពកន្លែងធ្វើការ កម្មវិធីបណ្តុះបណ្តាលអំពីសុខភាព និងសុវត្ថិភាព ការអនុលោមតាមច្បាប់ពលកម្ម និងបទបញ្ជាសុវត្ថិភាពក្នុងស្រុក។',
                ],
                'image' => 'images/occupational_safety.jpg',
            ],
            [
                'name' => ['en' => 'Risk Management', 'km' => 'ការគ្រប់គ្រងហានិភ័យ'],
                'description' => [
                    'en' => 'Identify, assess, and manage potential risks with AVE’s tailored risk management services. Our expertise supports businesses in building resilience, meeting compliance requirements, and preparing for uncertainties in a dynamic global environment.  Services include: ISO 31000 Risk Management System Implementation, Business continuity planning (BCP) , Operational and compliance risk assessments, Crisis and emergency response evaluation.',
                    'km' => 'កំណត់ វាយតម្លៃ និងគ្រប់គ្រងហានិភ័យដែលអាចកើតមាន ជាមួយសេវាកម្មគ្រប់គ្រងហានិភ័យដែលបានប្តូរតាមតម្រូវការរបស់ AVE។ ជំនាញរបស់យើងគាំទ្រអាជីវកម្មក្នុងការកសាងភាពរឹងមាំ បំពេញតម្រូវការអនុលោម និងរៀបចំសម្រាប់ភាពមិនច្បាស់លាស់នៅក្នុងបរិយាកាសសកលដែលមានការផ្លាស់ប្តូរយ៉ាងឆាប់រហ័ស។ សេវាកម្មរួមមាន៖ ការអនុវត្តប្រព័ន្ធគ្រប់គ្រងហានិភ័យ ISO 31000 ការធ្វើផែនការតន្ត្រីបន្តការអាជីវកម្ម (BCP) ការវាយតម្លៃហានិភ័យប្រតិបត្តិការ និងអនុលោម និងការវាយតម្លៃការឆ្លើយតបនឹងវិបត្តិ និងបន្ទាន់។',
                ],
                'image' => 'images/personnel_certification.jpg',
            ],
            [
                'name' => ['en' => 'Personnel Certification', 'km' => 'វិញ្ញាបនបត្របុគ្គលិក'],
                'description' => [
                    'en' => 'Build trust and competence across your workforce with AVE’s Personnel Certification services. We assess and certify individuals’ skills and qualifications against recognized standards, helping businesses ensure competency, consistency, and professionalism across critical roles. Services include:  Certification of inspectors, auditors, and technical staff, Competency assessments for industry professionals, Customized certification schemes for specialized roles,Ongoing monitoring and recertification programs.',
                    'km' => 'បង្កើតការជឿជាក់ និងជំនាញក្នុងកម្លាំងកម្មកររបស់អ្នកជាមួយសេវាកម្មវិញ្ញាបនបត្របុគ្គលិករបស់ AVE។ យើងវាយតម្លៃ និងផ្តល់វិញ្ញាបនបត្រជំនាញ និងវត្ថុប័ត្ររបស់បុគ្គលឲ្យសមរម្យតាមស្តង់ដារដែលទទួលស្គាល់ ជួយអាជីវកម្មធានាថាមានជំនាញ សម្របសម្រួល និងវិជ្ជាជីវៈក្នុងតួនាទីសំខាន់ៗ។សេវាកម្មរួមមាន៖ វិញ្ញាបនបត្រអ្នកត្រួតពិនិត្យ អ្នកសវនកម្ម និងបុគ្គលិកបច្ចេកទេស ការវាយតម្លៃជំនាញសម្រាប់អ្នកវិជ្ជាជីវៈក្នុងឧស្សាហកម្ម ផែនការវិញ្ញាបនបត្រប្តូរតាមតម្រូវការសម្រាប់តួនាទីឯកទេស និងកម្មវិធីត្រួតពិនិត្យ និងបន្តផ្តល់វិញ្ញាបនបត្រឡើងវិញ។
',
                ],
                'image' => 'images/personnel_certification.jpg',
            ],
            [
                'name' => ['en' => 'Information Security', 'km' => 'សុវត្ថិភាពព័ត៌មាន'],
                'description' => [
                    'en' => 'Protect your business data and digital assets with AVE’s Information Security services. We help organizations implement strong security frameworks to safeguard information, reduce cyber risks, and comply with data protection regulations. Services include: ISO/IEC 27001 Information Security Management System Certification, risk assessments and vulnerability analysis, data privacy and regulatory compliance audits, and information security training and awareness programs.',
                    'km' => 'ការពារទិន្នន័យអាជីវកម្ម និងទ្រព្យសម្បត្តិតាងខាងឌីជីថលរបស់អ្នកជាមួយសេវាសុវត្ថិភាពព័ត៌មានរបស់ AVE។ យើងជួយអង្គការអនុវត្តស៊ុមសុវត្ថិភាពរឹងមាំដើម្បីការពារព័ត៌មាន កាត់បន្ថយហានិភ័យវីរុសកុំព្យូទ័រ និងអនុលោមតាមបទបញ្ជាប្រព័ន្ធការពារទិន្នន័យ។ សេវាកម្មរួមមាន៖ វិញ្ញាបនបត្រប្រព័ន្ធគ្រប់គ្រងសុវត្ថិភាពព័ត៌មាន ISO/IEC 27001 ការវាយតម្លៃហានិភ័យ និងវិភាគភាពងាយរងគ្រោះ ការត្រួតពិនិត្យការការពារឯកជនភាពទិន្នន័យ និងការអនុលោមតាមច្បាប់ និងកម្មវិធីបណ្តុះបណ្តាល និងជំរុញការយល់ដឹងអំពីសុវត្ថិភាពព័ត៌មាន។',
                ],
                'image' => 'images/personnel_certification.jpg',
            ],
        ]);
    }
};
