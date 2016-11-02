<?php

use Illuminate\Database\Seeder;

class DisabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'بصرية',
            'سمعية',
            'حركية',
            'ذهنية',
            'بدون اعاقة',
        ];

        foreach ($fields as $field) {
            \App\Models\Disability::create(['name' => $field]);
        }
    }
}
