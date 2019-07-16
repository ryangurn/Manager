<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class UserPermissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['user-create', 'user-read', 'user-update', 'user-delete'];
        foreach ($arr as $item){
            $this->command->info("Creating Role: ". $item);
            Permission::findOrCreate($item);
        }
    }
}
