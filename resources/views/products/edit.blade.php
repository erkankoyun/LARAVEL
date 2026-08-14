<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <div class="product-editor-wrap">
        <div class="product-editor-head">
            <div>
                <span class="admin-kicker">Menu management</span>
                <h1>Edit Product</h1>
                <p>Update this AIHAN Cafe menu item, pricing, description and availability.</p>
            </div>
            <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">Back to Products</a>
        </div>

        <section class="product-editor-card">
            <form method="POST" action="{{ route('products.update', $product, absolute: false) }}">
                @csrf
                @method('PUT')
                @include('products._form', ['submitLabel' => 'Save Changes'])
            </form>
        </section>
    </div>
</x-layout>
