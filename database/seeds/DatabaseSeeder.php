<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(Carrier::class);
        $this->call(Permissions::class);
        $this->call(Roles::class);
        $this->call(Countries::class);
        // $this->call(UsersTableSeeder::class);
    }
}
