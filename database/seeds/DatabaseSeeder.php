<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SectorSeeder::class);
        $this->call(CompanySeeder::class);
        $this->call(MaritalStatus::class);
        $this->call(AreaSeeder::class);
        $this->call(WorkFieldSeeder::class);
        $this->call(WorkingStateSeeder::class);
        $this->call(AgeSeeder::class);
        $this->call(RefugeeStateSeeder::class);
        $this->call(DisabilitySeeder::class);
        $this->call(AcademicLevelSeeder::class);
    }
}
