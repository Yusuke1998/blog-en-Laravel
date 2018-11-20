<?php

use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*DB::insert("insert into professions (title) values (:title)",['title'=> 'Desarrollador Web']);*/
        /*DB::table("professions")->insert([
        	"title" => "Desarrollador Web"
        ]);*/

        Profession::create([
            "title" => "Desarrollador Web"
        ]);

        factory(Profession::class)->times(10)->create();
    }
}
