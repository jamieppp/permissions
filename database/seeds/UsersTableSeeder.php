<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the Users database seeder to populate user table with dummy and privileged users
   * Inserting an Admin, Editor and some Subscribers
   */
    public function run()
    {
      //Run methods that make users with role types
      $this->createAdmins("Administrator"); //Admins
      $this->createEditors("Editor"); //Editors
      $this->createSubscribers("Subscriber"); //Subscribers

    }

    private function createAdmins($title){

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "Admin",
        "email" => "admin@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

    }

    private function createEditors($title){

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "Editor",
        "email" => "editor@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

    }

    private function createSubscribers($title){

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "John Lennon",
        "email" => "john.lennon@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "Paul McCartney",
        "email" => "paul.mccartney@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "George Harrison",
        "email" => "george.harrison@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

      DB::table("users")->insert([
        "role_id" => $this->getRole($title),
        "name" => "Ringo Starr",
        "email" => "ringo.starr@test.com",
        "password" => bcrypt('password'),
        "remember_token" => str_random(10)
      ]);

    }


    private function getRole($title){
      //Get role ID value of the title to insert for foreign key value
      $result = DB::table("roles")->where("title", $title)->first();
      return $result->id;

    }
}
