@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Product Details</h2>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
                <p><strong>Name:</strong> {{ $product->name }}</p>
                <p><strong>Description:</strong> {{ $product->description ?? 'N/A' }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Stock:</strong> {{ $product->stock ?? 'N/A' }}</p>

                @if ($product->image)
                    <p><strong>Image:</strong></p>
                    <img src="{{ asset('images/' . $product->image) }}" width="100px">
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Back to Product List</a>
            <div>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit Product</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
                </form>
            </div>
        </div>
    </div>
@endsection
