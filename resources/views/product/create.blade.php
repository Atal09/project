@extends('layouts.app')

@section('content')
    <main>

        <section>
            <form method="post" action="{{ route('product.store') }}" autocomplete="on">
                @csrf
                <div>
                    <h1>Add Product</h1>
                    <button type="submit">Save</button>
                </div>
                <div>
                    <label>Name</label>
                    <input type="text" name="title" value="{{ old('title') }}">
                    @error('title')
                    <p>{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label>Price</label>
                    <input type="number" name="price" value="{{ old('price') }}">
                    @error('price')
                    <p>{{ $message }}</p>
                    @enderror
                </div>

            </form>
        </section>
    </main>
@endsection
