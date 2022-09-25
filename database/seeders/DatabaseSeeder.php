<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NoonReport;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        NoonReport::factory(10)->create();
    }
}
