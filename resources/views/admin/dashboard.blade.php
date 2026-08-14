<x-layout>
    <x-slot:title>Admin Dashboard</x-slot:title>

    <div class="max-w-6xl mx-auto space-y-8">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-primary">Administrator</p>
                <h1 class="text-3xl font-bold">AIHAN Cafe Dashboard</h1>
                <p class="text-base-content/60 mt-1">Manage products and review application activity.</p>
            </div>
            <a href="{{ route('products.create') }}" class="btn btn-primary">Add Product</a>
        </div>

        <div class="grid gap-4 md:grid-cols-3">
            <div class="stat bg-base-100 rounded-box shadow">
                <div class="stat-title">Products</div>
                <div class="stat-value">{{ $productCount }}</div>
                <div class="stat-desc">Total menu items</div>
            </div>
            <div class="stat bg-base-100 rounded-box shadow">
                <div class="stat-title">Available</div>
                <div class="stat-value text-success">{{ $availableProductCount }}</div>
                <div class="stat-desc">Currently available</div>
            </div>
            <div class="stat bg-base-100 rounded-box shadow">
                <div class="stat-title">Users</div>
                <div class="stat-value">{{ $userCount }}</div>
                <div class="stat-desc">Registered accounts</div>
            </div>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <div class="flex items-center justify-between gap-4">
                    <div>
                        <h2 class="card-title">Recent Products</h2>
                        <p class="text-sm text-base-content/60">The five most recently added menu items.</p>
                    </div>
                    <a href="{{ route('products.index') }}" class="btn btn-sm btn-outline">View All</a>
                </div>

                @if ($latestProducts->isEmpty())
                    <div class="py-8 text-center text-base-content/60">No products have been added yet.</div>
                @else
                    <div class="overflow-x-auto mt-4">
                        <table class="table">
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
                                        <td class="font-medium">{{ $product->name }}</td>
                                        <td>${{ number_format((float) $product->price, 2) }}</td>
                                        <td>
                                            <span class="badge {{ $product->is_available ? 'badge-success' : 'badge-ghost' }}">
                                                {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
