<x-layout>
    <x-slot:title>Home</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-10">
        <section class="hero bg-base-100 rounded-box shadow-xl overflow-hidden">
            <div class="hero-content py-14 px-8 text-center">
                <div class="max-w-3xl">
                    <div class="badge badge-primary badge-outline mb-4">Laravel Backend Portfolio Project</div>
                    <h1 class="text-4xl sm:text-5xl font-bold">AIHAN Cafe</h1>
                    <p class="py-6 text-lg text-base-content/70">
                        A database-driven Laravel application demonstrating authentication, role-based authorization,
                        admin tools, validation, Eloquent ORM, and full product CRUD workflows.
                    </p>
                    <div class="flex flex-wrap justify-center gap-3">
                        <a href="{{ route('products.index', absolute: false) }}" class="btn btn-primary">Browse Menu</a>
                        @guest
                            <a href="{{ route('register', absolute: false) }}" class="btn btn-outline">Create Account</a>
                        @endguest
                        @if (auth()->user()?->is_admin)
                            <a href="{{ route('admin.dashboard', absolute: false) }}" class="btn btn-outline">Open Admin Dashboard</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-5 md:grid-cols-3">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="text-3xl">🔐</div>
                    <h2 class="card-title">Authentication</h2>
                    <p class="text-base-content/65">User registration, secure login/logout, sessions, and protected routes.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="text-3xl">🛡️</div>
                    <h2 class="card-title">Admin Authorization</h2>
                    <p class="text-base-content/65">Custom middleware restricts product management and dashboard access to administrators.</p>
                </div>
            </div>

            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    <div class="text-3xl">☕</div>
                    <h2 class="card-title">Product CRUD</h2>
                    <p class="text-base-content/65">Database-backed product creation, editing, validation, availability, and deletion.</p>
                </div>
            </div>
        </section>

        <section class="card bg-base-100 shadow">
            <div class="card-body">
                <h2 class="card-title text-2xl">Built With</h2>
                <div class="flex flex-wrap gap-2 mt-2">
                    <span class="badge badge-lg">PHP 8.2+</span>
                    <span class="badge badge-lg">Laravel 12</span>
                    <span class="badge badge-lg">Eloquent ORM</span>
                    <span class="badge badge-lg">Blade</span>
                    <span class="badge badge-lg">Tailwind CSS</span>
                    <span class="badge badge-lg">DaisyUI</span>
                    <span class="badge badge-lg">Vite</span>
                    <span class="badge badge-lg">Pest</span>
                </div>
            </div>
        </section>
    </div>
</x-layout>
