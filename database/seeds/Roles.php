<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['disabled', 'registered'];
        foreach ($arr as $item){
            $this->command->info("Creating Role: ". $item);
            Role::findOrCreate($item);
        }
    }
}
