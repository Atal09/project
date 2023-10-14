@extends('layouts.web')

@section('content')
    <main>
        <section>
            <form method="post" action="{{ route('product.store') }}">
                @csrf
                <div>
                    <h1>Add Product</h1>
                    <button type="submit">Save</button>
                </div>
                <div>
                    <label>Name</label>
                    <input type="text" name="name" value="{{ old('name') }}">
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror
                    <label>Description (optional)</label>
                    <textarea cols="10" rows="5" name="description">{{ old('description') }}</textarea>
                    @error('description')
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
