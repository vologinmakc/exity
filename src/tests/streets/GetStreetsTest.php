<?php

namespace Tests\Feature;

use App\Entity\District;
use App\Entity\Street;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomePageTest()
    {
        $this->seed('StreetTableSeeder');
        $response = $this->get('/api/streets');

        $response->assertStatus(200);
    }
}
