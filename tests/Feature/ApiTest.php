<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testApi()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/quotes');
        $response->assertStatus(200);
    }
}
