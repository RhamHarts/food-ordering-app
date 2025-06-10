<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Food Ordering App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Heroicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        @include('partials.sidebar')

        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <!-- Top Navigation -->
            <header class="bg-white shadow">
                <div class="px-4 py-3">
                    <div class="flex items-center justify-between">
                        <h2 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h2>
                        <div class="flex items-center space-x-4">
                            <a href="{{ route('cart.index') }}" class="relative text-gray-500 hover:text-gray-700">
                                <i class="fas fa-shopping-cart text-2xl"></i>
                                @php
                                    $cartCount = count(session('cart', []));
                                @endphp
                                @if($cartCount > 0)
                                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                                        {{ $cartCount }}
                                    </span>
                                @endif
                            </a>
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-bell"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-user-circle text-2xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
