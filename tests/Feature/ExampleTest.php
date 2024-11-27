<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
<<<<<<< HEAD
     */
    public function test_the_application_returns_a_successful_response(): void
=======
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
>>>>>>> 208d5f64330d0f6451854dc486b2ffafe9860416
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
