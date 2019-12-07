<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase {

	use DatabaseMigrations;
	use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeAccess() {

		 $response = $this->get('/home')->assertRedirect('/login');
    }

    public function testHomeLoggedIn() {

		 $this->actingAs(factory(User::class)->create());
		 $response = $this->get('/home')->assertOk();
    }
}
