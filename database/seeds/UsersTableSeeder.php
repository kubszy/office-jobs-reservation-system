<?php

use Illuminate\Database\Seeder;

use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = config('roles.models.role')::where('name', '=', 'User')->first();
        $adminRole = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@admin.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@admin.com',
                'surname'  => '',
                'tel'      => '',
                'description'      => '',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'user@user.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'User',
                'email'    => 'user@user.com',
                'surname'  => '',
                'tel'      => '',
                'description'      => '',
                'password' => bcrypt('password'),
            ]);

            $newUser;
            $newUser->attachRole($userRole);
        }

        $faker = Faker\Factory::create();

         for($i = 1; $i <= 10; $i ++)
         {
             $user = new User();
             $user->name = $faker->firstName;
             $user->surname = $faker->lastName;
             $user->email = strtolower($user->name) . '.' . strtolower($user->surname) . '@'. $faker->freeEmailDomain;
             $user->password =  bcrypt('password');
             $user->description = $faker->jobTitle;
             $user->tel = $faker->phoneNumber;
             $user->save();
             $user->attachRole($userRole);
         }
    }
}