@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Edit Product</h2>

        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="product_id" class="form-label">Product ID</label>
                <input type="text" name="product_id" class="form-control"
                    value="{{ old('product_id', $product->product_id) }}" required>
                @error('product_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}"
                    required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control"
                    value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ old('stock', $product->stock) }}">
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control">
                @if ($product->image)
                    <div class="mt-2">
                        <img src="{{ asset('images/' . $product->image) }}" width="100px">

                        <p>Current Image</p>
                    </div>
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Product</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
        </form>
    </div>
@endsection
