<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Feed;
use App\User;
use Illuminate\Http\Request;

class NewFeedsFeatureTest extends TestCase
{

	public function loginWithFakeUser()
	{
		$user = User::find('1');

		$this->be($user);

		return $user;
	}

	/**
	 * @test
	 * A basic feature test example.
	 *
	 * @return void
	 */
    public function testRouteIndexExist()
    {
		$this->loginWithFakeUser();

        $response = $this->get('/feeds');

        $response->assertStatus(200);

		$response->assertViewIs('feed.index');
    }

	/**
	 * @test
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testRouteCreateExist()
	{
		$this->loginWithFakeUser();

		$response = $this->get('/feeds/create');

		$response->assertStatus(200);

		$response->assertViewIs('feed.create');
	}

	/**
	 * @test
	 * A basic feature test example.
	 *
	 * @return void
	 */
	public function testRouteMomentExist()
	{
		$this->loginWithFakeUser();

		$response = $this->get('/feeds/moment');

		$response->assertStatus(200);

		$response->assertViewIs('feed.moment');
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function testCreateAndStoreFeeds()
	{
		$this->loginWithFakeUser();

		$request = new Request();

		$request->request->add([
			'title' 	=> 'Test',
			'content' 	=> 'This is a test example.',
			'media'     => "p0hpfr0mck9tlewguv2w.jpg",
		]);

		$response = $this->post('/feeds', ['request' => $request]);

		$response->assertStatus(200);

		$response->assertRedirectTo('feed.index');
	}
}
