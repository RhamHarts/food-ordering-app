<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::query();

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->latest()->get();
        return view('orders.index', compact('orders'));
    }

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

    public function complete(Order $order)
    {
        $order->update(['status' => 'completed']);
        return redirect()->back()->with('success', 'Order marked as completed');
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 'cancelled']);
        return redirect()->back()->with('success', 'Order has been cancelled');
    }

    public function bulkComplete(Request $request)
    {
        $orderIds = $request->input('selected_orders', []);
        Order::whereIn('id', $orderIds)
            ->where('status', 'pending')
            ->update(['status' => 'completed']);

        return redirect()->back()->with('success', 'Selected orders have been completed');
    }

    public function bulkCancel(Request $request)
    {
        $orderIds = $request->input('selected_orders', []);
        Order::whereIn('id', $orderIds)
            ->where('status', 'pending')
            ->update(['status' => 'cancelled']);

        return redirect()->back()->with('success', 'Selected orders have been cancelled');
    }
}
