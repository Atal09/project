@extends('layouts.web')

@section('content')
    <div class="container">
        <h2>Onze Producten</h2>
        <div>

            @php
            $table ='reviews';
             $columns = \Illuminate\Support\Facades\Schema::getColumnListing($table);
            @endphp

        </div>
    </div>
@endsection
