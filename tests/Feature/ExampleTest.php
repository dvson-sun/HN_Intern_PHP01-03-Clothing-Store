<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
<<<<<<< HEAD
    public function testExample()
=======
<<<<<<< HEAD
    public function test_example()
=======
    public function testExample()
>>>>>>> 1e98111 (init project + config)
>>>>>>> 3a87fdf (init project + config)
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
