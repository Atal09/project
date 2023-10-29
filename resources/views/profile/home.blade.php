@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Welkom, {{ Auth::user()->name }}</div>

                    <div class="card-body">
                        @if(session('updated'))
                            <div class="alert alert-success" role="alert">
                                Je profiel is bijgewerkt.
                            </div>
                        @endif

                            <form method="post" action="{{ route('profile.update', ['user' => Auth::user()]) }}">

                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <label for="name">Gebruikersnaam</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
                            </div>




                            <button type="submit" class="btn btn-primary">Bewerken</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

