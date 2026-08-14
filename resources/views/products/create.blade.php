<x-layout>
    <x-slot:title>Add Product</x-slot:title>

    <div class="product-editor-wrap">
        <div class="product-editor-head">
            <div>
                <span class="admin-kicker">Menu management</span>
                <h1>Add Product</h1>
                <p>Create a new AIHAN Cafe menu item and control whether it is available for sale.</p>
            </div>
            <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">Back to Products</a>
        </div>

        <section class="product-editor-card">
            <form method="POST" action="{{ route('products.store', absolute: false) }}">
                @csrf
                @include('products._form', ['submitLabel' => 'Create Product'])
            </form>
        </section>
    </div>
</x-layout>
