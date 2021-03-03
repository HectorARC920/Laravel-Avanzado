<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
        Product::factory(5)->create();

        $response = $this->getJson('/api/products');

        $response->assertSuccessful();
        //$response->assertHeader('content-type', 'application/json');
        $response->assertJsonCount(5);
    }
}
