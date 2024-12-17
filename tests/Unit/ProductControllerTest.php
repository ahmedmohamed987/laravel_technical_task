<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;  

    /**
     * 
     *
     * @return void
     */
    public function test_store_product()
    {
        
        $productData = [
            'name' => 'Test Product',
            'price' => 100.00,
            'quantity' => 10
        ];

        $response = $this->postJson('/api/products', $productData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'price' => 100.00,
            'quantity' => 10
        ]);
    }
}
