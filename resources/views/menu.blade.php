@extends('layouts.dashboard')

@section('title', 'Menu')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Menu Item 1 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/nasi-goreng.jpg') }}" alt="Nasi Goreng" class="w-full h-56 object-fill">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Nasi Goreng</h2>
            <p class="text-gray-600 mb-4">Rp 20.000</p>
            <a href="/order/1" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">Pesan</a>
        </div>
    </div>

    <!-- Menu Item 2 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/mie-goreng.jpeg') }}" alt="Mie Goreng" class="w-full h-56 object-fill">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Mie Goreng</h2>
            <p class="text-gray-600 mb-4">Rp 20.000</p>
            <a href="/order/2" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">Pesan</a>
        </div>
    </div>

    <!-- Menu Item 3 -->
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/ayam-bakar.jpg') }}" alt="Ayam Bakar" class="w-full h-56 object-fill">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Ayam Bakar</h2>
            <p class="text-gray-600 mb-4">Rp 30.000</p>
            <a href="/order/3" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">Pesan</a>
        </div>
    </div>

       <!-- Menu Item 3 -->
       <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <img src="{{ asset('images/es-teh.jpeg') }}" alt="Es Teh" class="w-full h-56 object-fill">
        <div class="p-4">
            <h2 class="text-xl font-semibold mb-2">Es Teh</h2>
            <p class="text-gray-600 mb-4">Rp 5.000</p>
            <a href="/order/3" class="block w-full bg-blue-500 text-white text-center py-2 rounded hover:bg-blue-600 transition">Pesan</a>
        </div>
    </div>
</div>
@endsection
