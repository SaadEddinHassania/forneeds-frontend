<?php

use Illuminate\Database\Seeder;

class WorkingStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'موظف/ة حكومي',
            'موظف/ة قطاع خاص',
            'موظف/ة قطاع أهلي',
            'طالب جامعي',
            'خريج/ لا يعمل',
            'مهنى / عامل',
            'عاطل عن العمل',
            'عمل مؤقت',
        ];

        foreach ($fields as $field) {
            \App\Models\WorkingState::create(['name' => $field]);
        }
    }
}
