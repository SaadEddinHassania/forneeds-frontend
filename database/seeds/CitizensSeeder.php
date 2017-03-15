<?php

use Illuminate\Database\Seeder;

class CitizensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ids = [1, 2, 3, 4, 5];
        factory(App\Models\Users\Citizen::class, 10)->create()->each(function ($citizen) use ($ids) {
            echo('#' . rand(1, 5));
            $rand = array_rand($ids, rand(1, 2));
            for ($i = count($rand) - 1; $i > 0; $i--) {
                echo($rand[$i]);
            }
            if (count($rand) == 1) $rand = [$rand];
            $citizen->areas()->attach($rand);
            $citizen->save();
        });;
    }
}
