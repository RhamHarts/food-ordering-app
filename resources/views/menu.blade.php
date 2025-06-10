@extends('layouts.dashboard')

@section('title', 'Menu')

@section('content')
@if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($menus as $menu)
    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
        <img src="{{ asset('images/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-56 object-fill">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">{{ $menu->name }}</h2>
            <p class="text-gray-600 mb-2">{{ $menu->description }}</p>
            <p class="text-gray-600 mb-4">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
            <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition flex items-center justify-center space-x-2">
                    <i class="fas fa-cart-plus"></i>
                    <span>Pesan</span>
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection
