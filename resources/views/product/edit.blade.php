@extends('layouts.app')




@section('content')

    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        @method('PATCH')
        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $product->title }}">
        <label for="price">Price</label>
        <input type="text" name="price" value="{{ $product->price }}">
        <button type="submit">Update</button>
    </form>

@endsection
