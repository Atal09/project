
@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Onze Producten
        @foreach($products as $product)

                <tr>
                    <td colspan="8" class="has-text-centered">&copy; Mijn reserveringen</td>
                </tr>
            <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>


                <td>
                    <form method="post" action="{{ route('product.destroy', ['product' => $product]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
                <td>
{{--                    <form method="get" action="{{ route('product.edit', ['product' => $product]) }}">--}}
{{--                        <button type="submit">Edit</button>--}}
{{--                    </form>--}}
                </td>

            </tr>
        @endforeach
    </div>
@endsection
