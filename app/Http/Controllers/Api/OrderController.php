<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Produit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(
            Order::query()
                ->with('items')
                ->latest()
                ->paginate(20)
        );
    }

    public function show(Order $order): JsonResponse
    {
        return response()->json($order->load('items'));
    }

    public function store(Request $request): JsonResponse
    {
        $payload = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'customer_email' => ['required', 'email', 'max:190'],
            'customer_phone' => ['nullable', 'string', 'max:40'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.produit_id' => ['required', 'integer', 'exists:produits,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:100'],
        ]);

        $order = DB::transaction(function () use ($payload) {
            $preparedItems = [];
            $subtotal = 0.0;

            foreach ($payload['items'] as $item) {
                $product = Produit::query()->lockForUpdate()->findOrFail($item['produit_id']);

                if ((int) $product->stock < (int) $item['quantity']) {
                    throw ValidationException::withMessages([
                        'items' => ["Insufficient stock for {$product->name}."],
                    ]);
                }

                $unitPrice = (float) str_replace(',', '.', (string) $product->prix);
                $lineTotal = round($unitPrice * (int) $item['quantity'], 2);
                $subtotal += $lineTotal;

                $preparedItems[] = [
                    'produit' => $product,
                    'quantity' => (int) $item['quantity'],
                    'unit_price' => $unitPrice,
                    'line_total' => $lineTotal,
                ];
            }

            $order = Order::create([
                'customer_name' => $payload['customer_name'],
                'customer_email' => $payload['customer_email'],
                'customer_phone' => $payload['customer_phone'] ?? null,
                'status' => 'pending',
                'subtotal' => $subtotal,
                'total' => $subtotal,
            ]);

            foreach ($preparedItems as $item) {
                $order->items()->create([
                    'produit_id' => $item['produit']->id,
                    'product_name' => $item['produit']->name,
                    'unit_price' => $item['unit_price'],
                    'quantity' => $item['quantity'],
                    'line_total' => $item['line_total'],
                ]);

                $item['produit']->decrement('stock', $item['quantity']);
            }

            return $order->load('items');
        });

        return response()->json($order, 201);
    }

    public function updateStatus(Request $request, Order $order): JsonResponse
    {
        $payload = $request->validate([
            'status' => ['required', 'in:pending,paid,processing,shipped,completed,cancelled'],
        ]);

        $order->update($payload);

        return response()->json($order->fresh()->load('items'));
    }
}
