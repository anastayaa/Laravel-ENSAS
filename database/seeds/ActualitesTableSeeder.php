<?php

use Illuminate\Database\Seeder;

class ActualitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actualites=[
        	[
        		'titre'=>'Demandes de Transferts vers l\'ENSA Safi',
        		'description'=>'Le dernier délais de dépôt des demandes de transfert vers l\'ENSA Safi est le Lundi 02/09/2019 à 16h:00. La demande de transfert à télécharger ICI. Les demandes sont à déposer au sécrétariat du directeur adjoint au 1er étage du bâtiement administratif.',
        		'image'=>'transfer.png',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	],
        ];
        DB::table('actualites')->insert($actualites);
    }
}
