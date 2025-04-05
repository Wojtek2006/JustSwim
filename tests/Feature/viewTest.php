<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class viewTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_that_index_loads(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_that_contenders_loads(): void
    {
        $response = $this->get('/contenders');

        $response->assertStatus(200);
    }
    public function test_that_teams_loads(): void
    {
        $response = $this->get('/teams');

        $response->assertStatus(200);
    }
    public function test_that_competitions_loads(): void
    {
        $response = $this->get('/competitions');

        $response->assertStatus(200);
    }
}
