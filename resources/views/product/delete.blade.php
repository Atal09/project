{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--@foreach ($products as $product)--}}
{{--    <div class="product-item">--}}
{{--        <h2>{{ $product->name }}</h2>--}}
{{--        <p>{{ $product->description }}</p>--}}
{{--        <p>Price: ${{ $product->price }}</p>--}}

{{--        <form action="{{ route('product.destroy', $product->id) }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('DELETE')--}}
{{--            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endforeach--}}
{{--@endsection--}}
