@extends('layouts.app')

@section('content')

    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        @method('PATCH')

        <label for="title">Title</label>
        <input type="text" name="title" value="{{ $product->title }}">

        <label for="price">Price</label>
        <input type="text" name="price" value="{{ $product->price }}">

        <label for="year">Year</label>
        <select name="year" class="form-control">
            <option value="">Selecteer jaar</option>
            @php
                $startYear = 2019;
                $currentYear = date('Y');
            @endphp

            @for ($year = $currentYear; $year >= $startYear; $year--)
                <option value="{{ $year }}" {{ ($product->year == $year) ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>

        <button type="submit">Update</button>
    </form>

@endsection
