<?php

use Illuminate\Database\Seeder;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'اقل من 18',
            '18 – 25',
            '26 – 35',
            '36 – 45',
            '46 – 55',
            '56 فما فوق',
        ];

        foreach ($fields as $field) {
            \App\Models\Age::create(['name' => $field]);
        }
    }
}
