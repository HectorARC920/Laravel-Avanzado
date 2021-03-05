<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductBelogsToCategory extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_product_belongs_to_category()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();
        $category->category_id = 1;

        $this->assertInstanceOf(Category::class, $product->category);
    }
}
