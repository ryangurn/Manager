<?php

use App\Country as C;
use Illuminate\Database\Seeder;

class Countries extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = database_path('csv/countries.csv');
        $file = file_get_contents($filePath);
        $lineExplode = explode("\n", $file);
        foreach ($lineExplode as $line){
            $commaExplode = explode(",", $line);
            C::firstOrCreate(['abbr' => $commaExplode[0], 'name' => $commaExplode[1]]);
            $this->command->comment("Country Added: ". $commaExplode[0]);
        }

        $this->command->warn("Complete");
    }
}
