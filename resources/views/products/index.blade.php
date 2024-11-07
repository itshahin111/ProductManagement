@extends('layout.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Product Management</h1>

        <form action="{{ route('products.index') }}" method="GET" class="d-flex mb-3">
            <input type="text" name="search" class="form-control me-2" placeholder="Search by Product ID or Description"
                value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>

        <div class="mb-3">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create New Product</a>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>
                        <a
                            href="{{ route('products.index', ['sort_by' => 'name', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc']) }}">
                            Name
                            <i
                                class="bi bi-arrow-{{ request('sort_by') === 'name' && request('sort_order') === 'asc' ? 'up' : 'down' }}"></i>
                        </a>
                    </th>
                    <th>
                        <a
                            href="{{ route('products.index', ['sort_by' => 'price', 'sort_order' => request('sort_order') === 'asc' ? 'desc' : 'asc']) }}">
                            Price
                            <i
                                class="bi bi-arrow-{{ request('sort_by') === 'price' && request('sort_order') === 'asc' ? 'up' : 'down' }}"></i>
                        </a>
                    </th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td><img src="{{ asset('images/' . $product->image) }}" width="100px"></td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
