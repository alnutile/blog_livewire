<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @coversDefaultClass \App\Http\Controllers\HomePageController
 */
class HomePageControllerTest extends TestCase
{
    /**
     * @covers ::__invoke
     */
    public function testHomePage()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
