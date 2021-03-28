<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use App\Feed;
use App\User;
use Illuminate\Http\Request;

class NewFeedsFeatureTest extends TestCase
{

	/**
	 * Prepare
	 * First : Check route : get
	 * Second : Check route : post : Store, Update, Delete
	 */

	//  Ultility function
	public function LoginWithFakerUser()
	{
		$user = User::first();

		$this->be($user);

		return $user;
	}

	/**
	 * @test
	 * Basic feture test for checking route index is exist
	 */
	public function testRouteIndex()
	{
		$this->loginWithFakerUser();

		// Method 1
		$response = $this->get('/feeds');

		// Test response status
		$response->assertStatus(200);

		// Test response view
		$response->assertViewIs('feed.index');
	}

	/**
	 * @test
	 * Basic feture test for checking route moment is exist
	 */
	public function testRouteMoment()
	{
		$this->loginWithFakerUser();

		// Method 1
		$response = $this->get('/feeds/moment');

		// Test response status
		$response->assertStatus(200);

		// Test response view
		$response->assertViewIs('feed.moment');
	}

	/**
	 * @test
	 * Basic feture test for checking route create is exist
	 */
	public function testRouteCreate()
	{
		$this->loginWithFakerUser();

		// Method 1
		$response = $this->get('/feeds/create');

		// Test response status
		$response->assertStatus(200);

		// Test response view
		$response->assertViewIs('feed.create');
	}

	/**
	 * @test
	 * Basic feture test for checking route edit-content is exist
	 */
	public function testRouteEditContent()
	{
		$this->loginWithFakerUser();

		// Get the first feed
		$feed = Feed::first()->id;

		// Method 1
		$response = $this->get("/feeds/$feed/edit-content");

		// Test response status
		$response->assertStatus(200);

		// Test response view
		$response->assertViewIs('feed.edit-content');
	}

	/**
	 * @test
	 * Basic feture test for checking route edit-media is exist
	 */
	public function testRouteEditMedia()
	{
		$this->loginWithFakerUser();

		// Get the first feed
		$feed = Feed::first()->id;

		// Method 1
		$response = $this->get("/feeds/$feed/edit-media");

		// Test response status
		$response->assertStatus(200);

		// Test response view
		$response->assertViewIs('feed.edit-media');
	}

	/**
	 * @test
	 * Basic feture test for store feed
	 */
	public function testStoreFeed()
	{
		$user = $this->loginWithFakerUser();

		// Deactivate validator 419
		$this->withoutMiddleware();

		// Create new request : simulated input of a form
		$request = new Request();

		// Load test feed data
		$request->request->add([
			'user_id'		=> $user->id,
			'media'			=> "savasvsavsavas.jpg",
			'title'     	=> "test title",
			'content' 		=> "test content",
			'status'		=> '0'
		]);

		// Method 2
		$response = $this->call('POST', '/feeds', [
			'request'	=> $request
		]);

		// Test response status
		$response->assertStatus(302);

		$response->assertRedirect('/');

	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function testUpdateFeedsContent()
	{
		$user = $this->loginWithFakerUser();

		$this->withoutMiddleware();

		$request = new Request();

		$feed = Feed::create([
			'title' 	=> 'Test',
			'user_id' 	=> $user->id,
			'content' 	=> 'This is a test example.',
			'media'     => "p0hpfr0mck9tlewguv2w.jpg",
			'status'	=> '1'
		]);

		$request->request->add([
			'title' 	=> 'UpdatedTest',
			'content' 	=> 'This is a updated test example.',
		]);

		$id = $feed->id;

		$response = $this->call("PUT", "/feeds/$id/update-content", [
			'request' 	=> $request,
			'feed' 		=> $feed
		]);

		// Test response status
		$response->assertStatus(302);

		// Test response redirect
		$response->assertRedirect('/');

		// Check update content
		// $update_feed = Feed::find($id);
		// $this->assertEquals('UpdatedTest', $update_feed->title);
		// $this->assertEquals('This is a updated test example.', $update_feed->content);
	}

	/**
	 * @test
	 *
	 * @return void
	 */
	public function testUpdateFeedsMedia()
	{
		$user = $this->loginWithFakerUser();

		$this->withoutMiddleware();

		$request = new Request();

		$feed = Feed::create([
			'title' 	=> 'Test',
			'user_id' 	=> $user->id,
			'content' 	=> 'This is a test example.',
			'media'     => "p0hpfr0mck9tlewguv2w.jpg",
			'status'	=> '1'
		]);

		$request->request->add([
			'media'     => "new_media.jpg",
		]);

		$id = $feed->id;

		$response = $this->call("PUT", "/feeds/$id/update-media", [
			'request' 	=> $request,
			'feed' 		=> $feed
		]);

		// Test response status
		$response->assertStatus(302);

		// Test response redirect
		$response->assertRedirect('/');

		// Check update media
		// $update_feed = Feed::find($id);
		// $this->assertEquals($request->request->media, $update_feed->media);
	}

}
