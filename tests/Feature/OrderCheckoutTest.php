<?php

namespace Tests\Feature;

use App\Models\Produit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderCheckoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_checkout_creates_order_and_decrements_stock(): void
    {
        $product = new Produit();
        $product->name = 'Business Laptop';
        $product->Materiels = 'Aluminium';
        $product->colors = 'Black';
        $product->prix = '899.90';
        $product->stock = 10;
        $product->imageName = 'laptop.jpg';
        $product->description = 'Business laptop';
        $product->id_prod = 'LAPTOP-001';
        $product->catg_id = '1';
        $product->save();

        $response = $this->postJson('/api/orders', [
            'customer_name' => 'Sara El Amrani',
            'customer_email' => 'sara@example.com',
            'items' => [
                [
                    'produit_id' => $product->id,
                    'quantity' => 2,
                ],
            ],
        ]);

        $response
            ->assertCreated()
            ->assertJsonPath('status', 'pending')
            ->assertJsonPath('items.0.quantity', 2);

        $this->assertDatabaseHas('orders', [
            'customer_email' => 'sara@example.com',
            'total' => 1799.80,
        ]);

        $this->assertDatabaseHas('order_items', [
            'produit_id' => $product->id,
            'quantity' => 2,
        ]);

        $this->assertSame(8, $product->fresh()->stock);
    }

    public function test_checkout_rejects_quantity_above_available_stock(): void
    {
        $product = new Produit();
        $product->name = 'Limited Product';
        $product->Materiels = 'Standard';
        $product->prix = '25.00';
        $product->stock = 1;
        $product->imageName = 'product.jpg';
        $product->description = 'Limited stock';
        $product->id_prod = 'LIMITED-001';
        $product->catg_id = '1';
        $product->save();

        $response = $this->postJson('/api/orders', [
            'customer_name' => 'Client Test',
            'customer_email' => 'client@example.com',
            'items' => [
                [
                    'produit_id' => $product->id,
                    'quantity' => 2,
                ],
            ],
        ]);

        $response->assertUnprocessable();
        $this->assertDatabaseCount('orders', 0);
        $this->assertSame(1, $product->fresh()->stock);
    }
}
