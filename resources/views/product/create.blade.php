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
                <div>
                    <label for="year">Year</label>
                    <select name="year" class="form-control">
                        <option value="">Selecteer jaar</option>
                        @php
                            $startYear = 2019;
                            $currentYear = date('Y');
                        @endphp

                        @for ($year = $currentYear; $year >= $startYear; $year--)
                            <option value="{{ $year }}" {{ (old('year') == $year) ? 'selected' : '' }}>{{ $year }}</option>
                        @endfor
                    </select>

                    @error('year')
                    <p>{{ $message }}</p>
                    @enderror
                </div>



            </form>
        </section>
    </main>
@endsection
