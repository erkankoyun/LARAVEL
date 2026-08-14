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

<body class="min-h-screen bg-slate-50 font-sans text-slate-900 antialiased">
    <div class="flex min-h-screen flex-col">
        <header class="sticky top-0 z-50 border-b border-slate-200/80 bg-white/95 backdrop-blur">
            <nav class="mx-auto flex min-h-16 w-full max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <a href="{{ route('home', absolute: false) }}" class="group inline-flex items-center gap-3 rounded-xl px-2 py-2">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-slate-950 text-base text-white shadow-sm transition group-hover:-translate-y-0.5">☕</span>
                    <span>
                        <span class="block text-sm font-bold tracking-wide text-slate-950">AIHAN</span>
                        <span class="hidden text-[11px] font-medium uppercase tracking-[0.18em] text-slate-400 sm:block">Laravel Portfolio</span>
                    </span>
                </a>

                <div class="flex items-center gap-1 sm:gap-2">
                    <a href="{{ route('products.index', absolute: false) }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-950">Products</a>

                    @auth
                        @if (auth()->user()->is_admin)
                            <a href="{{ route('admin.dashboard', absolute: false) }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-950">Admin</a>
                            <a href="{{ route('products.create', absolute: false) }}" class="hidden rounded-lg bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800 sm:inline-flex">Add Product</a>
                        @endif

                        <div class="hidden px-2 text-sm font-medium text-slate-500 md:block">
                            {{ auth()->user()->name }}
                        </div>

                        <form method="POST" action="{{ route('logout', absolute: false) }}">
                            @csrf
                            <button type="submit" class="rounded-lg border border-slate-300 bg-white px-3 py-2 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">Sign Out</button>
                        </form>
                    @else
                        <a href="{{ route('login', absolute: false) }}" class="rounded-lg px-3 py-2 text-sm font-semibold text-slate-600 transition hover:bg-slate-100 hover:text-slate-950">Sign In</a>
                        <a href="{{ route('register', absolute: false) }}" class="rounded-lg bg-slate-950 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-slate-800">Sign Up</a>
                    @endauth
                </div>
            </nav>
        </header>

        <main class="flex-1 px-4 py-8 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>

        <footer class="border-t border-slate-200 bg-white">
            <div class="mx-auto flex w-full max-w-7xl flex-col items-center justify-between gap-2 px-4 py-5 text-xs text-slate-500 sm:flex-row sm:px-6 lg:px-8">
                <p>© 2026 AIHAN. Laravel portfolio project.</p>
                <p>Laravel 12 · Eloquent ORM · Pest</p>
            </div>
        </footer>
    </div>
</body>

</html>
