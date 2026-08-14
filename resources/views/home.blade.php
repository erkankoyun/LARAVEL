<x-layout>
    <x-slot:title>Home</x-slot:title>

    <div class="home-wrap">
        <section class="hero-pro">
            <div class="hero-content-pro">
                <div class="eyebrow"><span class="eyebrow-dot"></span> Laravel Backend Portfolio Project</div>
                <h1>AIHAN Cafe</h1>
                <p>
                    A database-driven Laravel application showcasing secure authentication, role-based authorization,
                    Eloquent ORM, validation, admin tools and complete product CRUD workflows.
                </p>

                <div class="hero-actions">
                    <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-primary">Browse Products</a>

                    @guest
                        <a href="{{ route('register', absolute: false) }}" class="btnx btnx-outline">Create Account</a>
                    @endguest

                    @if (auth()->user()?->is_admin)
                        <a href="{{ route('admin.dashboard', absolute: false) }}" class="btnx btnx-outline">Open Admin Dashboard</a>
                    @endif
                </div>
            </div>
        </section>

        <section class="feature-grid">
            <article class="feature-card">
                <div class="feature-icon">🔐</div>
                <h2>Authentication</h2>
                <p>Account registration, secure sign in and sign out, session regeneration and protected routes.</p>
            </article>

            <article class="feature-card">
                <div class="feature-icon">🛡️</div>
                <h2>Admin Authorization</h2>
                <p>Custom middleware keeps product management and the administration dashboard restricted to administrators.</p>
            </article>

            <article class="feature-card">
                <div class="feature-icon">📦</div>
                <h2>Product CRUD</h2>
                <p>Database-backed product creation, editing, validation, availability management and deletion.</p>
            </article>
        </section>

        <section class="stack-card">
            <div class="stack-head">
                <div>
                    <h2>Technology Stack</h2>
                    <p>Core technologies used in this portfolio application.</p>
                </div>
            </div>

            <div class="tech-list">
                <span class="tech-pill">PHP 8.2+</span>
                <span class="tech-pill">Laravel 12</span>
                <span class="tech-pill">Eloquent ORM</span>
                <span class="tech-pill">Blade</span>
                <span class="tech-pill">Tailwind CSS</span>
                <span class="tech-pill">DaisyUI</span>
                <span class="tech-pill">Vite</span>
                <span class="tech-pill">Pest</span>
            </div>
        </section>
    </div>
</x-layout>
