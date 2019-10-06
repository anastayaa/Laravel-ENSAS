<?php

use Illuminate\Database\Seeder;

class CoordinateursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $coordinateurs=[
        	[
        		'nom'=>'ECHCHADI',
        		'prenom'=>'Said',
        		'image'=>'saidechchadi.png',
        		'description'=>'Professeur universitaire',
        		'departement_id'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
            [
                'nom'=>'BARAKA',
                'prenom'=>'Mohammed',
                'image'=>'mohammedBaraka.png',
                'description'=>'Professeur universitaire',
                'departement_id'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ],  
            [
                'nom'=>'TOURIKI',
                'prenom'=>'Fatima',
                'image'=>'fatimaTouriki.png',
                'description'=>'Professeur universitaire',
                'departement_id'=>2,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ],
            [
                'nom'=>'DURANT',
                'prenom'=>'Dupond',
                'image'=>'dupondDurant.png',
                'description'=>'Professeur universitaire',
                'departement_id'=>2,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]
        ];
        DB::table('coordinateurs')->insert($coordinateurs);
    }
}
