<?php

namespace Tests\Feature;

use App\Models\{Product,User};
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {   
        // $user = User::factory(1)->create();
        // Sanctum::actingAs($user);

        $response = $this->getJson('/api/products');

        $response->assertSuccessful();
        //$response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(10);
    }
}
