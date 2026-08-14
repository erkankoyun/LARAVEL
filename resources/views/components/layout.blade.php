<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title . ' - AIHAN' : 'AIHAN' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <a href="{{ route('home') }}" class="btn btn-ghost text-xl">🐦 AIHAN</a>
        </div>

        <div class="navbar-end gap-2">
            <a href="{{ route('products.index') }}" class="btn btn-ghost btn-sm">Products</a>

            @auth
                @if (auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost btn-sm">Admin</a>
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add Product</a>
                @endif

                <div class="hidden sm:block text-sm text-base-content/60 px-2">
                    {{ auth()->user()->name }}
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm">Sign Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">Sign In</a>
                <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Sign Up</a>
            @endauth
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2026 AIHAN - Built with Laravel and ❤️</p>
        </div>
    </footer>
</body>

</html>
