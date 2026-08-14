<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="product-list-wrap">
        <header class="product-list-head">
            <div>
                <span class="admin-kicker">Cafe menu</span>
                <h1>AIHAN Cafe Products</h1>
                <p>Browse the database-backed menu and manage product availability from one clean workspace.</p>
            </div>

            @if (auth()->user()?->is_admin)
                <a href="{{ route('products.create', absolute: false) }}" class="btnx btnx-dark">+ Add Product</a>
            @endif
        </header>

        @if (session('success'))
            <div class="product-success" role="status">
                <span>✓</span>
                <strong>{{ session('success') }}</strong>
            </div>
        @endif

        @if ($products->isEmpty())
            <section class="admin-panel">
                <div class="admin-empty">
                    <div class="admin-empty-icon">☕</div>
                    <h3>No products yet</h3>
                    <p>The cafe menu is currently empty. Add the first product to start building the catalog.</p>

                    @if (auth()->user()?->is_admin)
                        <a href="{{ route('products.create', absolute: false) }}" class="btnx btnx-primary">Create First Product</a>
                    @endif
                </div>
            </section>
        @else
            <section class="admin-panel product-catalog-panel">
                <div class="admin-panel-head">
                    <div>
                        <span class="admin-panel-eyebrow">Inventory</span>
                        <h2>Product Catalog</h2>
                        <p>{{ $products->count() }} {{ Str::plural('item', $products->count()) }} currently stored in the menu database.</p>
                    </div>
                </div>

                <div class="admin-table-wrap">
                    <table class="admin-table product-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Status</th>
                                @if (auth()->user()?->is_admin)
                                    <th class="admin-table-action">Actions</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <div class="product-name">{{ $product->name }}</div>
                                        @if ($product->description)
                                            <div class="product-description">{{ $product->description }}</div>
                                        @endif
                                    </td>
                                    <td class="product-price">${{ number_format((float) $product->price, 2) }}</td>
                                    <td>
                                        <span class="status-pill {{ $product->is_available ? 'status-pill-live' : '' }}">
                                            <span class="status-dot"></span>
                                            {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                        </span>
                                    </td>

                                    @if (auth()->user()?->is_admin)
                                        <td class="admin-table-action">
                                            <div class="product-actions">
                                                <a href="{{ route('products.edit', $product, absolute: false) }}" class="btnx btnx-outline">Edit</a>
                                                <form method="POST" action="{{ route('products.destroy', $product, absolute: false) }}"
                                                      onsubmit="return confirm('Delete this product?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btnx product-delete-btn">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        @endif
    </div>
</x-layout>
