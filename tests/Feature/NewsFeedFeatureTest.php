<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Feed;
use App\User;
use Illuminate\Http\Request;

class NewsFeedFeatureTest extends TestCase
{
    public function LoginWithFakeUser()
    {
        $user = User::find(1);

        $this->be($user);

        return $user;
    }

    /**
     * @test
     * Basic feature test for checking route index is exist
     */
    public function testRouteIndex() {
        $this->LoginWithFakeUser();

        //Method 1
        $response = $this->get('/feeds');

        //Test response status
        $response->assertStatus(200);

        //Test response view
        $response->assertViewIs('feed.index');
    }

    /**
     * @test
     * Basic feature test for checking route moment is exist
     */
    public function testRouteMoment() {
        $this->LoginWithFakeUser();

        //Method 1
        $response = $this->get('/feeds/moment');

        //Test response status
        $response->assertStatus(200);

        //Test response view
        $response->assertViewIs('feed.moment');
    }

    /**
     * @test
     * Basic feature test for checking route create is exist
     */
    public function testRouteCreate() {
        $this->LoginWithFakeUser();

        //Method 1
        $response = $this->get('/feeds/create');

        //Test response status
        $response->assertStatus(200);

        //Test response view
        $response->assertViewIs('feed.create');
    }

    /**
     * @test
     * Basic feature test for checking route edit content is exist
     */
    public function testRouteEditContent() {
        $this->LoginWithFakeUser();

        //Get the first feed
        $feed = Feed::first()->id;

        //Method 2
        $response = $this->get("/feeds/$feed/edit-content");

        //Test response status
        $response->assertStatus(200);

        //Test response view
        $response->assertViewIs('feed.edit-content');
    }

    /**
     * @test
     * Basic feature test for checking route edit media is exist
     */
    public function testRouteEditMedia() {
        $this->LoginWithFakeUser();

        //Get the first feed
        $feed = Feed::first()->id;

        //Method 2
        $response = $this->get("/feeds/$feed/edit-media");

        //Test response status
        $response->assertStatus(200);

        //Test response view
        $response->assertViewIs('feed.edit-media');
    }

    /**
     * @test
     * Basic feature test for store feed
     */
    public function testStoreFeed() {
        $user = $this->LoginWithFakeUser();

        //Deactivate validator 419
        $this->withoutMiddleWare(\App\Http\Middleware\VerifyCsrfToken::class);

        //Create new request: simulated input of a form
        $request = new Request();

        //Load test feed data
        $request->request->add([
            'user_id'   => $user->id,
            'media'     => 'adsadadasdsadasd',
            'title'     => 'test title',
            'content'   => 'test content',
            'status'    => '0'
        ]);

        //Method 2
        $response = $this->call('POST', '/feeds', [
            'request'   => $request,
        ]);

        //Test response status
        $response->assertStatus(302);
    }

    /**
     * @test
     * Basic feature test for store feed
     */
    public function testUpdateContent() {
        $user = $this->LoginWithFakeUser();

        //Deactivate validator 419
        $this->withoutMiddleWare(\App\Http\Middleware\VerifyCsrfToken::class);

        //Create new request: simulated input of a form
        $request = new Request();

        $request->request->add([
            'media' => 'media'
        ]);

        //Create new feed
        $feed = new Feed([
            'media'     => 'dummy media',
            'title'     => 'title',
            'content'   => 'content',
            'user_id'   => $user->id,
            'status'    => '0',
        ]);

        //Method 2
        $response = $this->call('PUT', '/feeds/{feed}/update-content', [
            'request'   => $request,
            'feed'      => $feed
        ]);

        //Test response status
        $response->assertStatus(302);
    }
}
