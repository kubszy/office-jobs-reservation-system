<?php

use Illuminate\Database\Seeder;

use App\Models\Equipment;

class EquipmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();

       for($i = 1; $i <= 10; $i ++)
       {
           $equipment = new Equipment();
           $equipment->type = 'Computer_PC';
           $equipment->model= 'Dell';
           $equipment->mark = 'Computer_PC_' . $i;
           $equipment->year_purchase = $faker->dateTimeBetween($startDate = '-12 years', $endDate = 'now', $timezone = null);
           $equipment->worth = $faker->randomFloat($nbMaxDecimals = NULL, $min = 500, $max = 10000);
           $equipment->description = 'Computer_PC_' . $i;
           $equipment->status = false;
           $equipment->save();

       }

       for($i = 1; $i <= 10; $i ++)
       {
           $equipment = new Equipment();
           $equipment->type = 'Laptop';
           $equipment->model= 'HP';
           $equipment->mark = 'Laptop_' . $i;
           $equipment->year_purchase = $faker->dateTimeBetween($startDate = '-12 years', $endDate = 'now', $timezone = null);
           $equipment->worth = $faker->randomFloat($nbMaxDecimals = NULL, $min = 500, $max = 10000);
           $equipment->description = 'Laptop_' . $i;
           $equipment->status = false;
           $equipment->save();

       }

       for($i = 1; $i <= 5; $i ++)
       {
           $equipment = new Equipment();
           $equipment->type = 'Printer';
           $equipment->model= 'Brother';
           $equipment->mark = 'Printer_' . $i;
           $equipment->year_purchase = $faker->dateTimeBetween($startDate = '-12 years', $endDate = 'now', $timezone = null);
           $equipment->worth = $faker->randomFloat($nbMaxDecimals = NULL, $min = 500, $max = 10000);
           $equipment->description = 'Printer_' . $i;
           $equipment->status = false;
           $equipment->save();

       }
    }
}
