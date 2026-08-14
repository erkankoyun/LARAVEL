<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Edit Product</h1>
            <p class="text-base-content/60 mt-1">Update this AIHAN Cafe menu item.</p>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('products.update', $product) }}">
                    @csrf
                    @method('PUT')
                    @include('products._form', ['submitLabel' => 'Save Changes'])
                </form>
            </div>
        </div>
    </div>
</x-layout>
