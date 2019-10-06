<?php

use Illuminate\Database\Seeder;

class FilieresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filieres=[
        	[
        		'titre'=>'Génie Informatique',
        		'image'=>'/filieres/images/informatique.png',
        		'departement_id'=>1,
        		'coordinateur_id'=>1,
        		'responsable_id'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
        	[
        		'titre'=>'Génie Réseaux et Télécommunications',
        		'image'=>'/filieres/images/reseau.png',
        		'departement_id'=>1,
        		'coordinateur_id'=>2,
        		'responsable_id'=>1,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
        	[
        		'titre'=>'Génie Industriel',
        		'image'=>'/filieres/images/industriel.png',
        		'departement_id'=>2,
        		'coordinateur_id'=>3,
        		'responsable_id'=>2,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
            [
                'titre'=>'Génie des Procédés et Matériaux Céramiques',
                'image'=>'/filieres/images/gpmc.png',
                'departement_id'=>2,
                'coordinateur_id'=>4,
                'responsable_id'=>2,
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
            ]
        ];
        DB::table('filieres')->insert($filieres);
    }
}
