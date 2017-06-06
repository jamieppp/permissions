<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the Roles database seeder to populate user roles
     * Three different user roles are Administrator, Editor and Subscriber
     * - Administrator: Highest
     * - Editor: Middle
     * - Subscriber: Normal user that's registered
     */
    public function run()
    {
        DB::table("roles")->insert(["title" => "Administrator"]);
        DB::table("roles")->insert(["title" => "Editor"]);
        DB::table("roles")->insert(["title" => "Subscriber"]);
    }
}
