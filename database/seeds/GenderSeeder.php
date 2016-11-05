<?php

use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'ذكر',
            'انثى'
        ];

        foreach ($fields as $field) {
            \App\Models\Age::create(['name' => $field]);
        }
    }
}
