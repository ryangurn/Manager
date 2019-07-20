<?php

use Illuminate\Database\Seeder;

use App\Carrier as C;

class Carrier extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('csv/carriers.csv');
        $file = file_get_contents($filePath);
        $lineExplode = explode("\n", $file);
        foreach ($lineExplode as $line){
            $commaExplode = explode(",", $line);
            C::create(['name' => $commaExplode[0], 'gateway' => $commaExplode[1], 'country' => $commaExplode[2]]);
            $this->command->comment("Carrier & Gateway Added: ". $commaExplode[0]);
        }

        $this->command->warn("Complete");
    }
}
