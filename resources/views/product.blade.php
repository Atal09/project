@extends('layouts.web')

@section('content')
    <div class="container">
        <h2>Onze Producten</h2>
        @foreach($products as $products)
            <p>{{$products->id}}</p>
            <p>{{$products->title}}</p>
            <p>{{$products->price}}</p>

        @endforeach
    </div>
@endsection

