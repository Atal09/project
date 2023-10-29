@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Products</h2>

        @auth
            <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Create Product</a>
        @endauth

        <div>
            <form method="GET" action="{{ route('products.find') }}">
                <div class="input-group mb-3">
                    <select name="year" class="form-control">
                        <option value="">Selecteer jaar</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                    </select>
                    <input type="text" name="title" class="form-control" placeholder="Zoek op titel">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </form>
        </div>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Year</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->year }}</td>
                    <td>
                        @auth
                            @if ($product->user_id == auth()->user()->id)
                                @if ($product->dislikes >= 5)
                                    <form method="POST" action="{{ route('product.destroy', ['product' => $product]) }}" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @else
                                    <button class="btn btn-danger" disabled>Delete</button>
                                    <span class="text-danger">You cannot delete this product until it has received at least five dislikes.</span>
                                @endif
                                <a href="{{ route('product.edit', ['product' => $product]) }}" class="btn btn-primary ml-2">Edit</a>
                            @endif
                        @endauth
                    </td>



                    <td>
                        @auth
                            <form method="post" action="{{ route('product.toggleStatus', ['product' => $product]) }}">
                                @csrf
                                <button type="submit" class="btn btn-success">
                                    {{ $product->status ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>


                            <form method="post" action="{{ route('product.dislike', ['product' => $product]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger">
                                    Dislike ({{ $product->dislikes }})
                                </button>
                            </form>

                        @endauth
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
