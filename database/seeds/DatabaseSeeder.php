<?php

use Illuminate\Database\Seeder;
use App\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        factory('App\Post',20)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
