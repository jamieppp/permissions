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
        //Call Roles seeder class to populate Roles table with user roles
        $this->call(RolesTableSeeder::class);

        //Call user seeder class to populate Administrators and dummy users
        $this->call(UsersTableSeeder::class); 
    }
}
