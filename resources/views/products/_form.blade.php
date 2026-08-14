@if ($errors->any())
    <div class="alert alert-error mb-6">
        <div>
            <h3 class="font-bold">Please fix the following:</h3>
            <ul class="list-disc ml-5 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="space-y-5">
    <div>
        <label class="label" for="name">Product name</label>
        <input id="name" name="name" type="text" class="input input-bordered w-full"
               value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div>
        <label class="label" for="description">Description</label>
        <textarea id="description" name="description" rows="4"
                  class="textarea textarea-bordered w-full">{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div>
        <label class="label" for="price">Price</label>
        <input id="price" name="price" type="number" step="0.01" min="0"
               class="input input-bordered w-full"
               value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <label class="label cursor-pointer justify-start gap-3">
        <input type="checkbox" name="is_available" value="1" class="checkbox checkbox-primary"
               @checked(old('is_available', $product->is_available ?? true))>
        <span class="label-text">Available for sale</span>
    </label>

    <div class="flex gap-3">
        <button type="submit" class="btn btn-primary">{{ $submitLabel }}</button>
        <a href="{{ route('products.index') }}" class="btn btn-ghost">Cancel</a>
    </div>
</div>
