<?php

use Illuminate\Database\Seeder;

class DepartementsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departements=[
        	[
        		'titre'=>'Génie Informatique, Réseaux et Télécommunications',
        		'image'=>'/departements/images/informatiqueReseaux.jpg',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
        	[
        		'titre'=>'Génie Industriel',
        		'image'=>'/departements/images/industriel.png',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	]
        ];
        DB::table('departements')->insert($departements);
    }
}
