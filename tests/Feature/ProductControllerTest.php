<?php

namespace Tests\Feature;

use App\Models\{Product,Category,User,Role};
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
    // public function test_index()
    // {   
    //     // $user = User::factory(1)->create();
    //     // Sanctum::actingAs($user);

    //     $response = $this->getJson('/api/products');

    //     $response->assertSuccessful();
    //     //$response->assertHeader('content-type', 'application/json');
    //     $response->assertJsonCount(10);
    // }
    public function test_product_belongs_to_category()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();
        $product->category_id = 1;

        $this->assertInstanceOf(Category::class, $product->category);
    }

    public function test_user_belongs_to_role()
    {
        $role = Role::factory()->create();
        $user = User::factory()->create([
            'role_id' => $role->id,
        ]);

        $this->assertInstanceOf(Role::class, $user->role);
    }
}
