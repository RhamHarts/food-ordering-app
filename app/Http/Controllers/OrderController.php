<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $cart = session('cart');

        if (!$cart) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong');
        }

        // Hitung total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Buat order baru
        $order = Order::create([
            'order_number' => 'ORD-' . Str::random(8),
            'total_amount' => $total,
            'status' => 'pending',
            'items' => $cart
        ]);

        // Clear cart
        session()->forget('cart');

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat');
    }

    public function index()
    {
        $orders = Order::latest()->get();
        return view('orders.index', compact('orders'));
    }
}