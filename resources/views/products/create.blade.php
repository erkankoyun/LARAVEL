<x-layout>
    <x-slot:title>Add Product</x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="mb-6">
            <h1 class="text-3xl font-bold">Add Product</h1>
            <p class="text-base-content/60 mt-1">Create a new AIHAN Cafe menu item.</p>
        </div>

        <div class="card bg-base-100 shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('products.store') }}">
                    @csrf
                    @include('products._form', ['submitLabel' => 'Create Product'])
                </form>
            </div>
        </div>
    </div>
</x-layout>
