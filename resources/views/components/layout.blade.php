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
    <link rel="stylesheet" href="/css/site.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="site-shell">
        <header class="site-header">
            <nav class="site-nav">
                <a href="{{ route('home', absolute: false) }}" class="brand">
                    <span class="brand-mark">☕</span>
                    <span class="brand-copy">
                        <strong>AIHAN</strong>
                        <small>Laravel Portfolio</small>
                    </span>
                </a>

                <div class="nav-actions">
                    <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-ghost nav-products">Products</a>

                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard', absolute: false) }}" class="btnx btnx-ghost">Admin</a>
                            <a href="{{ route('products.create', absolute: false) }}" class="btnx btnx-dark">Add Product</a>
                        @endif

                        <span class="nav-user">{{ auth()->user()->name }}</span>

                        <form method="POST" action="{{ route('logout', absolute: false) }}">
                            @csrf
                            <button type="submit" class="btnx btnx-outline">Sign Out</button>
                        </form>
                    @else
                        <a href="{{ route('login', absolute: false) }}" class="btnx btnx-ghost">Sign In</a>
                        <a href="{{ route('register', absolute: false) }}" class="btnx btnx-dark">Sign Up</a>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="site-main">
            {{ $slot }}
        </main>

        <footer class="site-footer">
            <div class="site-footer-inner">
                <p>© 2026 AIHAN · Laravel portfolio project</p>
                <p>Laravel 12 · Eloquent ORM · Pest</p>
            </div>
        </footer>
    </div>
</body>

</html>
