<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vessel;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vessel::factory()->times(2)->create();
    }
}
