<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

class CartService
{
    protected const SESSION_KEY = 'shopping_cart';
    protected float $taxRate = 0.16; // 16% de IVA

    public function content(): Collection
    {
        return Session::get(self::SESSION_KEY, collect());
    }

    public function add(Product $product, int $quantity = 1, array $options = []): void
    {
        $cart = $this->content();

        $item = [
            'rowId' => uniqid(),
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'options' => $options
        ];

        $cart->put($item['rowId'], $item);
        Session::put(self::SESSION_KEY, $cart);
    }

    public function update(string $rowId, int $quantity): bool
    {
        if (!$this->exists($rowId)) return false;

        $cart = $this->content();
        $item = $cart->get($rowId);

        // Verificar stock antes de actualizar
        if (isset($item['options']['stock']) && $quantity > $item['options']['stock']) {
            return false;
        }

        $item['quantity'] = $quantity;
        $cart->put($rowId, $item);
        Session::put(self::SESSION_KEY, $cart);

        return true;
    }

    public function remove(string $rowId): void
    {
        $cart = $this->content();
        $cart->forget($rowId);
        Session::put(self::SESSION_KEY, $cart);
    }

    public function clear(): void
    {
        Session::forget(self::SESSION_KEY);
    }

    public function count(): int
    {
        return $this->content()->sum('quantity');
    }

    public function subtotal(): float
    {
        return $this->content()->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function tax(): float
    {
        return $this->subtotal() * $this->taxRate;
    }

    public function total(): float
    {
        return $this->subtotal() + $this->tax();
    }

    public function exists(string $rowId): bool
    {
        return $this->content()->has($rowId);
    }

    public function get(string $rowId): ?array
    {
        return $this->content()->get($rowId);
    }
}