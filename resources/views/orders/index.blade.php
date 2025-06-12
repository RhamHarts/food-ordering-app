@extends('layouts.dashboard')

@section('title', 'Recent Orders')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h3 class="text-2xl font-semibold mb-6">Recent Orders</h3>

            @if($orders->count() > 0)
                <div class="space-y-4">
                    @foreach($orders as $order)
                    <div class="border rounded-lg p-4">
                        <div class="flex justify-between items-center mb-4">
                            <div>
                                <h4 class="font-semibold">Order #{{ $order->order_number }}</h4>
                                <p class="text-sm text-gray-600">{{ $order->created_at->format('d M Y H:i') }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold">Total: Rp {{ number_format($order->total_amount, 0, ',', '.') }}</p>
                                <span class="px-2 py-1 text-sm rounded-full
                                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($order->status === 'completed') bg-green-100 text-green-800
                                    @else bg-gray-100 text-gray-800
                                    @endif">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="border-t pt-4">
                            <h5 class="font-medium mb-2">Items:</h5>
                            <div class="space-y-2">
                                @foreach($order->items as $item)
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium">{{ $item['name'] }}</p>
                                        <p class="text-sm text-gray-600">Qty: {{ $item['quantity'] }}</p>
                                    </div>
                                    <p class="text-gray-600">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-shopping-bag text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500">Belum ada pesanan</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection