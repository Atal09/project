@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Products</h2>

        @auth
            <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Create Product</a>
        @endauth

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        @auth
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary">Edit</a>
                            <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endauth
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
