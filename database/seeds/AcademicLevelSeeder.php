<?php

use Illuminate\Database\Seeder;

class AcademicLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'اقل من ثانوية عامة',
            'ثانوية عامة',
            'دبلوم',
            'بكالوريوس',
            'دراسات عليا',
        ];

        foreach ($fields as $field) {
            \App\Models\AcademicLevel::create(['name' => $field]);
        }
    }
}
