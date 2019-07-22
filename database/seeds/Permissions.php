<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['user-create', 'user-read', 'user-update', 'user-delete', 'user-disable', 'user-enable',
            'metadata-phone-view', 'metadata-phone-update',
            'metadata-address-view', 'metadata-address-update',
            'metadata-dob-view', 'metadata-dob-update',
            'metdata-additional-view', 'metadata-additional-update',
        ];
        foreach ($arr as $item){
            $this->command->info("Creating Permission: ". $item);
            Permission::findOrCreate($item);
        }
    }
}
