@extends('layouts.dashboard')

@section('title', 'Menu')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold">Daftar Menu</h3>
                <a href="{{ route('menu.create') }}" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Menu
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($menus as $menu)
                <div class="bg-white border rounded-lg overflow-hidden">
                    <img src="{{ asset('images/' . $menu->image) }}" alt="{{ $menu->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h4 class="text-xl font-semibold mb-2">{{ $menu->name }}</h4>
                        <p class="text-gray-600 mb-4">{{ $menu->description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-bold">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fas fa-cart-plus"></i> Tambah
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
