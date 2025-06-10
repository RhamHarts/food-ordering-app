@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Orders Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                <i class="fas fa-shopping-cart text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Orders</h3>
                <p class="text-2xl font-semibold">0</p>
            </div>
        </div>
    </div>

    <!-- Total Revenue Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-500">
                <i class="fas fa-dollar-sign text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Revenue</h3>
                <p class="text-2xl font-semibold">Rp 0</p>
            </div>
        </div>
    </div>

    <!-- Total Customers Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                <i class="fas fa-users text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Total Customers</h3>
                <p class="text-2xl font-semibold">0</p>
            </div>
        </div>
    </div>

    <!-- Total Menu Items Card -->
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                <i class="fas fa-utensils text-2xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-gray-500 text-sm">Menu Items</h3>
                <p class="text-2xl font-semibold">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders Table -->
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow">
        <div class="p-6">
            <h3 class="text-2xl font-semibold mb-6 text-center">Recent Orders</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Items</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Total</th>
                            <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Sample data -->
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">1</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">John Doe</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Nasi Goreng, Es Teh</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Rp 35.000</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Completed
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">2</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Jane Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Mie Goreng, Es Jeruk</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">Rp 30.000</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
