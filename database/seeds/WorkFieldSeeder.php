<?php

use Illuminate\Database\Seeder;

class WorkFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workFields = [
            'قطاع الصحة',
            'قطاع التعليم',
            'قطاع المسكن',
            'قطاع الحماية',
            'قطاع المياه والنظافة',
            'قطاع الأمن الغذائي',
            'قطاع تكنولوجيا المعلومات والاتصالات',
            'قطاع ريادية الأعمال',
            'قطاع الخدمة المجتمعية والعمل الخيري',
            'قطاع الطوارئ والعمل الاغاثي',
        ];

        foreach ($workFields as $workField) {
            \App\Models\WorkField::create(['name' => $workField]);
        }
    }
}
