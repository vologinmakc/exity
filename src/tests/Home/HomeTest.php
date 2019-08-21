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
        $this->seed('DistrictTableSeeder');
        $this->seed('StreetTableSeeder');
        $response = $this->get('/');
        $this->assertEquals(5, District::count());
        $this->assertEquals(62, Street::count());
        $response->assertStatus(200);
    }
}
