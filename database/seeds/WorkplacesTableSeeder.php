<?php

use Illuminate\Database\Seeder;

use App\Models\Workplace;

class WorkplacesTableSeeder extends Seeder
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
           $workplace = new Workplace();
           $workplace->mark = 'Desk_' . $i;
           $workplace->description = 'Desk_' . $i;
           $workplace->status = false;
           $workplace->save();

       }
    }
}
