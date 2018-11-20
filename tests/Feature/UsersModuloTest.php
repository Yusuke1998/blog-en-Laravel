<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class UsersModuloTest extends TestCase
{
	use RefreshDatabase;
    /** @test */
    function it_loads_to_list_users()
    {

        factory(User::class)->create([
            "name" => "carmen"
        ]);
        factory(User::class)->create([
            "name" => "jose",
        ]);
    	$this->get("/usuarios")
    		->assertStatus(200)
    		->assertSee("Lista de Usuarios")
    		->assertSee("carmen")
    		->assertSee("jose");
    }

    /** @test */

    function it_message_for_default_if_users_is_empty(){
    	
    	$this->get("/usuarios")
    		->assertStatus(200)
    		->assertSee("No hay usuarios registrados");
    }

    /** @test */
    function it_loads_the_users_details_page(){
    	$user = factory(User::class)->create([
    		"name" => "Yony Brondy"
    	]);

    	$this->get("/usuarios/{$user->id}")
    		->assertStatus(200)
    		->assertSee("Yony Brondy");
    }

    /** @test */
    function it_display_a_404_error_if_the_user_not_found(){
    	
    	$this->get("/usuarios/999")
    		->assertStatus(404)
    		->assertSee("Página no encontrada");
    }

    /** @test */
    function it_creates_a_new_user(){
        $this->withoutExceptionHandling();
        $this->post("/usuarios/",[
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
            "password" => "123456"
        ])->assertRedirect("usuarios");
        $this->assertCredentials([
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
            "password" => "123456"
        ]);

        /*$this->assertDatabaseHas("users",[
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
        ]);*/
    }

    /** @test */

    function the_names_is_required(){
        $this->from("usuarios/nuevo")->post("/usuarios/",[
            "name" => "",
            "email" => "jaime@gmail.com",
            "password" => "123456"
        ])->assertRedirect("usuarios/nuevo")
        ->assertSessionHasErrors(["name" => "el campo name es obligatorio"]);

        $this->assertEquals(0, User::count());

         /*->assertRedirect("usuarios/nuevo")
         ->assertSessionHasErrors(["name"])*/

        /*$this->assertDatabaseMissing("users",[
            "email" => "jaime@gmail.com"
        ]);*/
    }

    /** @test */
    function the_email_is_required(){
        $this->from("usuarios/nuevo")->post("/usuarios/",[
            "name" => "joselito",
            "email" => "",
            "password" => "123456"
        ])->assertRedirect("usuarios/nuevo")
        ->assertSessionHasErrors(["email"]);

        $this->assertEquals(0, User::count());

         /*->assertRedirect("usuarios/nuevo")
         ->assertSessionHasErrors(["name"])*/

        /*$this->assertDatabaseMissing("users",[
            "email" => "jaime@gmail.com"
        ]);*/
    }
    /** @test */
    function the_email_must_be_valid(){
        $this->from("usuarios/nuevo")->post("/usuarios/",[
            "name" => "joselito",
            "email" => "correo-no-valido",
            "password" => "1122"
        ])->assertRedirect("usuarios/nuevo")
        ->assertSessionHasErrors(["email"]);

        $this->assertEquals(0, User::count());

    }

    /** @test */
    function the_password_is_required(){
        $this->from("usuarios/nuevo")->post("/usuarios/",[
            "name" => "joselito",
            "email" => "joselito19@gmail.com",
            "password" => ""
        ])->assertRedirect("usuarios/nuevo")
        ->assertSessionHasErrors(["password"]);

        $this->assertEquals(0, User::count());

    }

     /** @test */
    function the_email_must_be_unique(){
        factory(User::class)->create([
            "email" => "santi@gmail.com"
        ]);
        $this->from("usuarios/nuevo")->post("/usuarios/",[
            "name" => "jaime",
            "email" => "santi@gmail.com",
            "password" => "12345"
        ])->assertRedirect("usuarios/nuevo")
        ->assertSessionHasErrors(["email"]);

        $this->assertEquals(1, User::count());

    }

    /** @test */

    function it_loads_the_new_user_page(){
        $this->get("usuarios/nuevo")
            ->assertStatus(200)
            ->assertSee("Crear Usuario");
    }

    /** @test */

    function it_loads_the_edit_user_page(){

        $user = factory(User::class)->create(); 
        $this->get("usuarios/{$user->id}/editar")
            ->assertStatus(200)
            ->assertViewIs("users.edit")
            ->assertSee("Editar Usuario")
            ->assertViewHas("user", function($viewUser) use ($user){
                return $viewUser->id == $user->id;
            });
    }
    /** @test */
    function it_updates_user(){

        $user = factory(User::class)->create();
        $this->withoutExceptionHandling();
        $this->put("/usuarios/{$user->id}",[
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
            "password" => "123456"
        ])->assertRedirect("usuarios/{$user->id}");
        $this->assertCredentials([
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
            "password" => "123456"
        ]);

        /*$this->assertDatabaseHas("users",[
            "name" => "Luis Santiago",
            "email" => "luissantiago@gmail.com",
        ]);*/
    }
    /** @test */
    function the_names_is_required_when_updating_a_user(){
        $user =  factory(User::class)->create();
        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
            "name" => "",
            "email" => "jaime@gmail.com",
            "password" => "123456"
        ])->assertRedirect("usuarios/{$user->id}/editar")
        ->assertSessionHasErrors(["name"]);

        $this->assertDatabaseMissing("users",["email" => "jaime@gmail.com"]);

         /*->assertRedirect("usuarios/nuevo")
         ->assertSessionHasErrors(["name"])*/

        /*$this->assertDatabaseMissing("users",[
            "email" => "jaime@gmail.com"
        ]);*/
    }

    /** @test */
    function the_email_must_be_valid_when_updating_a_user(){
        $user =  factory(User::class)->create();
        $this->from("usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}",[
            "name" => "gisela",
            "email" => "correo-no-valido",
            "password" => "123456"
        ])->assertRedirect("usuarios/{$user->id}/editar")
        ->assertSessionHasErrors(["email"]);

        $this->assertDatabaseMissing("users",["name" => "gisela"]);

    }

    /** @test */
    function the_password_is_optional_when_updating_a_user(){

        $oldpass = "clave_anterior";
        $user = factory(User::class)->create([
            "password" => bcrypt($oldpass)
        ]);
        $this->from("usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}",[
            "name" => "joselito",
            "email" => "joselito19@gmail.com",
            "password" => ""
        ])->assertRedirect("usuarios/{$user->id}");

        $this->assertCredentials([
            "name" => "joselito",
            "email" => "joselito19@gmail.com",
            "password" => $oldpass

        ]);

    }
     /** @test */
    function the_users_email_can_stay_the_same_when_updating_a_user(){

        $user = factory(User::class)->create([
            "email" => "jairo@gmail.com"
        ]);
        $this->from("usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}",[
            "name" => "jairo",
            "email" => "jairo@gmail.com",
            "password" => "1234455"
        ])->assertRedirect("usuarios/{$user->id}");

        $this->assertDatabaseHas("users",[
            "name" => "jairo",
            "email" => "jairo@gmail.com",

        ]);

    }

     /** @test */
    function the_email_must_be_unique_when_updating_a_user(){
        factory(User::class)->create([
            "email" => "existing-email@example.com"
        ]);
        $user = factory(User::class)->create([
            "email" => "santi@gmail.com"
        ]);
        $this->from("usuarios/{$user->id}/editar")->put("/usuarios/{$user->id}",[
            "name" => "jaime",
            "email" => "existing-email@example.com",
            "password" => "12345"
        ])->assertRedirect("usuarios/{$user->id}/editar")
        ->assertSessionHasErrors(["email"]);

        //$this->assertEquals(1, User::count());

    }
    /** @test */

    function it_deletes_a_user(){
         $user = factory(User::class)->create([
            "email" => "santi@gmail.com"
        ]);

        $this->delete("usuarios/{$user->id}")
        ->assertRedirect("usuarios");

        $this->assertDatabaseMissing("users",[
            "id" => $user->id
        ]);
    }





}
