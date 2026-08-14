<x-layout>
    <x-slot:title>Products</x-slot:title>

    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold">Cafe Products</h1>
                <p class="text-base-content/60 mt-1">Browse AIHAN Cafe menu items stored in the database.</p>
            </div>

            @if (auth()->user()?->is_admin)
                <a href="{{ route('products.create', absolute: false) }}" class="btn btn-primary">Add Product</a>
            @endif
        </div>

        @if (session('success'))
            <div class="alert alert-success mb-6">{{ session('success') }}</div>
        @endif

        @if ($products->isEmpty())
            <div class="card bg-base-100 shadow">
                <div class="card-body items-center text-center">
                    <h2 class="card-title">No products yet</h2>
                    <p>The cafe menu is currently empty.</p>

                    @if (auth()->user()?->is_admin)
                        <a href="{{ route('products.create', absolute: false) }}" class="btn btn-primary mt-3">Create Product</a>
                    @endif
                </div>
            </div>
        @else
            <div class="overflow-x-auto bg-base-100 rounded-box shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            @if (auth()->user()?->is_admin)
                                <th class="text-right">Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="font-semibold">{{ $product->name }}</div>
                                    @if ($product->description)
                                        <div class="text-sm text-base-content/60 max-w-md">{{ $product->description }}</div>
                                    @endif
                                </td>
                                <td>${{ number_format((float) $product->price, 2) }}</td>
                                <td>
                                    <span class="badge {{ $product->is_available ? 'badge-success' : 'badge-ghost' }}">
                                        {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>

                                @if (auth()->user()?->is_admin)
                                    <td>
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('products.edit', $product, absolute: false) }}" class="btn btn-sm btn-outline">Edit</a>
                                            <form method="POST" action="{{ route('products.destroy', $product, absolute: false) }}"
                                                  onsubmit="return confirm('Delete this product?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-error btn-outline">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layout>
