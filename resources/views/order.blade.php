@extends('layouts.dashboard')

@section('title', 'Form Pemesanan')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-6">
    <form action="{{ route('order.submit') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" id="name" name="name" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700">No HP</label>
            <input type="tel" id="phone" name="phone" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
        </div>


        <button type="submit"
            class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
            Kirim
        </button>
    </form>
</div>
@endsection
