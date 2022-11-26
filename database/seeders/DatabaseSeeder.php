<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(InformationSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(TestimoniesSeeder::class);
        $this->call(DemosSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(StaffSeeder::class);
    }
}
