<?php

use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$professions = DB::select("select id from professions where title=?",['Desarrollador Web']);*/

        /*$profession = DB::table("professions")->select("id")->first();*/
        /*$professions = DB::table("professions")->select("id")->where("title","=","Desarrollador Web")->first();*/
       /* $profession = DB::table("professions")->where(["title"=>"Desarrollador Web"])->first();*/
        $professionId = Profession::where("title","Desarrollador Web")->value("id");

        factory(User::class)->create([
            "name" => "Yony Brondy",
            "email" => "admin@admin.com",
            "is_admin" => 1,
            "password" => bcrypt("admin"),
            "profession_id" => $professionId
        ]);
        
        factory(User::class)->create([
            "profession_id" => $professionId
        ]);
        factory(User::class, 48)->create();
        /*DB::table("users")->insert([
        	"name" => "Yony Brondy",
        	"email" => "admin@gmail.com",
        	"password" => bcrypt("admin"),
            "profession_id" => $professionId,
        ]);
        User::create([
            "name" => "Luis Santiago",
            "email" => "luis@gmail.com",
            "password" => bcrypt("admin"),
            "profession_id" => $professionId
        ]);*/
    }
}
