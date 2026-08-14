<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="product-list-wrap">
        <header class="product-list-head">
            <div>
                <span class="admin-kicker">Cafe menu</span>
                <h1>AIHAN Cafe Products</h1>
                <p>Browse the database-backed menu, search products and manage availability from one clean workspace.</p>
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

        <section class="catalog-toolbar">
            <form method="GET" action="{{ route('products.index', absolute: false) }}" class="catalog-filter-form">
                <label class="catalog-search">
                    <span>Search</span>
                    <input
                        type="search"
                        name="search"
                        value="{{ $search }}"
                        placeholder="Search by product name or description...">
                </label>

                <label class="catalog-select">
                    <span>Availability</span>
                    <select name="availability">
                        <option value="all" @selected($availability === 'all')>All products</option>
                        <option value="available" @selected($availability === 'available')>Available</option>
                        <option value="unavailable" @selected($availability === 'unavailable')>Unavailable</option>
                    </select>
                </label>

                <div class="catalog-filter-actions">
                    <button type="submit" class="btnx btnx-dark">Apply Filters</button>
                    @if ($search !== '' || $availability !== 'all')
                        <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">Clear</a>
                    @endif
                </div>
            </form>
        </section>

        @if ($products->isEmpty())
            <section class="admin-panel">
                <div class="admin-empty">
                    <div class="admin-empty-icon">☕</div>
                    <h3>{{ $search !== '' || $availability !== 'all' ? 'No matching products' : 'No products yet' }}</h3>
                    <p>
                        {{ $search !== '' || $availability !== 'all'
                            ? 'Try changing or clearing the current filters.'
                            : 'The cafe menu is currently empty. Add the first product to start building the catalog.' }}
                    </p>

                    @if ($search !== '' || $availability !== 'all')
                        <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">Clear Filters</a>
                    @elseif (auth()->user()?->is_admin)
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
                        <p>
                            Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }}
                            {{ \Illuminate\Support\Str::plural('item', $products->total()) }}.
                        </p>
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

                @if ($products->hasPages())
                    <div class="catalog-pagination">
                        @if ($products->onFirstPage())
                            <span class="btnx btnx-outline is-disabled">Previous</span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="btnx btnx-outline">Previous</a>
                        @endif

                        <span class="catalog-page-status">Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</span>

                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="btnx btnx-outline">Next</a>
                        @else
                            <span class="btnx btnx-outline is-disabled">Next</span>
                        @endif
                    </div>
                @endif
            </section>
        @endif
    </div>
</x-layout>
