<x-layout>
    <x-slot:title>Admin Dashboard</x-slot:title>

    <div class="admin-wrap">
        <section class="admin-hero">
            <div>
                <span class="admin-kicker">Administrator workspace</span>
                <h1>AIHAN Cafe Dashboard</h1>
                <p>Manage menu items, monitor availability and review account activity from one place.</p>
            </div>
            <a href="{{ route('products.create', absolute: false) }}" class="btnx btnx-dark">+ Add Product</a>
        </section>

        <section class="admin-stats">
            <article class="admin-stat-card">
                <div class="admin-stat-icon">☕</div>
                <div>
                    <span class="admin-stat-label">Products</span>
                    <strong>{{ $productCount }}</strong>
                    <small>Total menu items</small>
                </div>
            </article>

            <article class="admin-stat-card">
                <div class="admin-stat-icon admin-stat-icon-success">✓</div>
                <div>
                    <span class="admin-stat-label">Available</span>
                    <strong>{{ $availableProductCount }}</strong>
                    <small>Currently available</small>
                </div>
            </article>

            <article class="admin-stat-card">
                <div class="admin-stat-icon admin-stat-icon-users">👤</div>
                <div>
                    <span class="admin-stat-label">Users</span>
                    <strong>{{ $userCount }}</strong>
                    <small>Registered accounts</small>
                </div>
            </article>
        </section>

        <section class="admin-panel">
            <div class="admin-panel-head">
                <div>
                    <span class="admin-panel-eyebrow">Inventory</span>
                    <h2>Recent Products</h2>
                    <p>The five most recently added menu items.</p>
                </div>
                <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">View All</a>
            </div>

            @if ($latestProducts->isEmpty())
                <div class="admin-empty">
                    <div class="admin-empty-icon">＋</div>
                    <h3>No products yet</h3>
                    <p>Create your first menu item to start building the catalog.</p>
                    <a href="{{ route('products.create', absolute: false) }}" class="btnx btnx-primary">Create First Product</a>
                </div>
            @else
                <div class="admin-table-wrap">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestProducts as $product)
                                <tr>
                                    <td><strong>{{ $product->name }}</strong></td>
                                    <td>${{ number_format((float) $product->price, 2) }}</td>
                                    <td>
                                        <span class="status-pill {{ $product->is_available ? 'status-pill-live' : '' }}">
                                            {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                        </span>
                                    </td>
                                    <td class="admin-table-action">
                                        <a href="{{ route('products.edit', $product, absolute: false) }}" class="btnx btnx-outline">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </section>
    </div>
</x-layout>
