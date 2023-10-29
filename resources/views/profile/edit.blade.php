@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="{{ route('profile.update', $user) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control @error('name')is-invalid @enderror" name="name" value="{{old('name', $user->name)}}">
                    @error('name')
                        <p>{{$message}}</p>

                    @enderror

                    <button type="submit" class="btn btn-primary">
                        Change
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
