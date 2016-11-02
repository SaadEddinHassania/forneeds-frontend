<?php

use Illuminate\Database\Seeder;

class RefugeeStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'لاجئ/ة',
            'غير لاجئ/ة'
        ];

        foreach ($fields as $field) {
            \App\Models\RefugeeState::create(['name' => $field]);
        }
    }
}
