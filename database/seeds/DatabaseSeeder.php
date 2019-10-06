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
    	$this->call(DepartementsTableSeeder::class);
    	$this->call(ProfsTableSeeder::class);
    	$this->call(ResponsablesTableSeeder::class);
    	$this->call(CoordinateursTableSeeder::class);
    	$this->call(FilieresTableSeeder::class);
    	$this->call(EmploisTableSeeder::class);
    	$this->call(DocumentsTableSeeder::class);
    	$this->call(CoursTableSeeder::class);
    	$this->call(SlidesTableSeeder::class);
    	$this->call(FormationsTableSeeder::class);
    	$this->call(PartenairesTableSeeder::class);
    	$this->call(ActualitesTableSeeder::class);
    	$this->call(ClubsTableSeeder::class);
    }
}
