<!-- Sidebar -->
<div class="w-64 bg-gray-800 text-white">
    <div class="p-4">
        <h1 class="text-2xl font-bold">Food Order</h1>
    </div>
    <nav class="mt-4">
        <a href="/" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('/') || request()->is('dashboard') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-home w-6"></i>
            <span>Dashboard</span>
        </a>
        <a href="/menu" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('menu') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-utensils w-6"></i>
            <span>Menu</span>
        </a>
        {{-- <a href="/orders" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('orders') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-shopping-cart w-6"></i>
            <span>Orders</span>
        </a>
        <a href="/customers" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('customers') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-users w-6"></i>
            <span>Customers</span>
        </a>
        <a href="/reports" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('reports') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-chart-bar w-6"></i>
            <span>Reports</span>
        </a>
        <a href="/settings" class="flex items-center px-4 py-3 text-gray-100 hover:bg-gray-700 {{ request()->is('settings') ? 'bg-gray-700' : '' }}">
            <i class="fas fa-cog w-6"></i>
            <span>Settings</span>
        </a> --}}
    </nav>
</div>
