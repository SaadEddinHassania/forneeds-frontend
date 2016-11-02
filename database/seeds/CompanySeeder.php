<?php

use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            'أمم متحدة',
            'منظمة دولية',
            'منظمة محلية',
            'منظمة ربحية',
            'منظمة حكومية',
            'شركة ناشئة',
            'مجموعة شبابية',
        ];

        foreach ($companies as $company) {
            \App\Models\Users\Company::create(['name' => $company]);
        }
    }
}
