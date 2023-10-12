@extends('layouts.web')

@section('content')
    <div class="container">
        <h2>Onze Producten
        @foreach($products as $product)


            <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}</td>
            </tr>
        @endforeach
    </div>
@endsection
