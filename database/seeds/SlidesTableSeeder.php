<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slides=[
        	[
        		'titre'=>'Interner of Things',
        		'sous-titre'=>'Les objets connectés entre eux',
        		'image'=>'internetOfThings.png',
                'created_at'=>date("Y-m-d H:i:s"),
                'updated_at'=>date("Y-m-d H:i:s")
        	]
        ];
        DB::table('slides')->insert($slides);
    }
}
