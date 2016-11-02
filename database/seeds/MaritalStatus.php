<?php

use Illuminate\Database\Seeder;

class MaritalStatus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $martialStatuses = [
            'أعزب/آنسة',
            'متزوج/ة',
            'مطلق/ة',
            'أرمل/ة',
            'أخرى',
        ];

        foreach ($martialStatuses as $martialStatus) {
            \App\Models\MaritalStatus::create(['name' => $martialStatus]);
        }
    }
}
