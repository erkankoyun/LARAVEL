@if ($errors->any())
    <div class="form-alert">
        <strong>Please fix the following:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="product-form-grid">
    <div class="product-form-main">
        <div class="field field-large">
            <label for="name">Product name</label>
            <input id="name" name="name" type="text"
                   value="{{ old('name', $product->name ?? '') }}"
                   placeholder="e.g. Caramel Latte"
                   required>
        </div>

        <div class="field field-large">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="6"
                      placeholder="Describe the product, ingredients or serving details...">{{ old('description', $product->description ?? '') }}</textarea>
            <small class="field-help">Keep it concise and useful for customers.</small>
        </div>
    </div>

    <aside class="product-form-side">
        <div class="field field-large">
            <label for="price">Price</label>
            <div class="price-field">
                <span>$</span>
                <input id="price" name="price" type="number" step="0.01" min="0"
                       value="{{ old('price', $product->price ?? '') }}"
                       placeholder="0.00"
                       required>
            </div>
        </div>

        <div class="availability-card">
            <div>
                <strong>Available for sale</strong>
                <p>Show this item as currently available.</p>
            </div>
            <label class="switch-control">
                <input type="checkbox" name="is_available" value="1"
                       @checked(old('is_available', $product->is_available ?? true))>
                <span class="switch-track"><span class="switch-knob"></span></span>
            </label>
        </div>
    </aside>
</div>

<div class="product-form-actions">
    <a href="{{ route('products.index', absolute: false) }}" class="btnx btnx-outline">Cancel</a>
    <button type="submit" class="btnx btnx-dark">{{ $submitLabel }}</button>
</div>
