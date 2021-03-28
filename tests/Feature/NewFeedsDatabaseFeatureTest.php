<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Feed;
use App\User;

class NewFeedsDatabaseFeatureTest extends TestCase
{

	/** @test*/
	public function testCreateFeed()
	{
		$user = User::first();

		$feed = Feed::create([
			'title' 	=> 'Test title',
			'content' 	=> 'Test content',
			'user_id'	=> $user->id,
			'media'		=> "test.jpg",
			'status' 	=> '0'
		]);

		$this->assertDatabaseHas('feeds', [
			'id' => $feed->id
		]);
	}

	use WithFaker;

	/** @test*/
	public function testUpdateFeed()
	{
		$user = User::first();

		$this->setUpFaker();

		$oldFeed = Feed::create([
			'title' 	=> $this->faker->sentence(),
			'content' 	=> $this->faker->paragraph(),
			'user_id'	=> $user->id,
			'media'		=> "test.jpg",
			'status' 	=> '0'
		]);

		$this->assertDatabaseHas('feeds', [
			'id' => $oldFeed->id
		]);

		$oldFeed->update([
			'title' 	=> $this->faker->sentence(),
			'content' 	=> $this->faker->paragraph(),
		]);

		$newFeed = Feed::find($oldFeed->id);

		$this->assertDatabaseHas('feeds', [
			'title' 	=> $newFeed->title,
			'content' 	=> $newFeed->content
		]);

	}

	/** @test*/
	public function testDeleteFeed()
	{
		$user = User::first();

		$this->setUpFaker();

		$oldFeed = Feed::create([
			'title' 	=> $this->faker->sentence(),
			'content' 	=> $this->faker->paragraph(),
			'user_id'	=> $user->id,
			'media'		=> "test.jpg",
			'status' 	=> '0'
		]);

		$this->assertDatabaseHas('feeds', [
			'id' => $oldFeed->id
		]);

		$oldFeed->delete();

		// Method 1
		$this->assertDatabaseMissing('feeds', [
			'id' => $oldFeed->id
		]);

		// Method 2
		$this->assertDeleted('feeds', [
			'id' => $oldFeed->id
		]);
	}
}
