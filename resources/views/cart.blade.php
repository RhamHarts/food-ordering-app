@extends('layouts.dashboard')

@section('title', 'Keranjang')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h3 class="text-2xl font-semibold mb-6">Keranjang Belanja</h3>

            @if(session('cart') && count(session('cart')) > 0)
                <div class="space-y-4">
                    @foreach(session('cart') as $id => $item)
                    <div class="flex items-center justify-between p-4 border rounded-lg">
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-20 h-20 object-cover rounded">
                            <div>
                                <h4 class="font-semibold">{{ $item['name'] }}</h4>
                                <p class="text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-2">
                                <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" name="action" value="decrease" class="px-2 py-1 bg-gray-200 rounded">-</button>
                                    <span class="mx-2">{{ $item['quantity'] }}</span>
                                    <button type="submit" name="action" value="increase" class="px-2 py-1 bg-gray-200 rounded">+</button>
                                </form>
                            </div>
                            <form action="{{ route('cart.remove', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    @endforeach

                    <div class="mt-6 p-4 border-t">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-semibold">Total:</span>
                            <span class="text-lg font-semibold">Rp {{ number_format($total ?? 0, 0, ',', '.') }}</span>
                        </div>
                        <form action="{{ route('order.checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full bg-blue-500 text-white py-3 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Checkout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="text-center py-8">
                    <i class="fas fa-shopping-cart text-4xl text-gray-400 mb-4"></i>
                    <p class="text-gray-500">Keranjang belanja kosong</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
