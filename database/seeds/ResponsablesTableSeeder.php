<?php

use Illuminate\Database\Seeder;

class ResponsablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $responsables=[
        	[
        		'nom'=>'BOUAARIFI',
        		'prenom'=>'Walid',
        		'image'=>'walidBouaarifi.png',
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
        	]
        ];
        DB::table('responsables')->insert($responsables);
    }
}
