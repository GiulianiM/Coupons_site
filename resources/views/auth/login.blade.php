@extends('layouts.public')

@section('title', 'Login')

@section('content')
    @if (session('message'))
        <div class="alert alert-warning text-center" id="alert">
            <i class="fas fa-exclamation-triangle"></i> {{ session('message') }}
        </div>
    @endif

    <div class="wrapper">
        <div class="row">
            <div class="col text-center">
                <form method="POST" action="{{ route('login') }}" class="rounded shadow p-5">
                    @csrf
                    <h1 class="fw-bolder mb-3">Bentornato</h1>
                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username" placeholder="Username" value="{{ old('username') }}">
                        <label for="username" class="form-label">Username</label>
                        @if ($errors->first('username'))
                            @foreach ($errors->get('username') as $message)
                                <div class="invalid-feedback m-2">
                                    {{ $message }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" placeholder="Password">
                        <label for="password" class="form-label">Password</label>
                        @if ($errors->first('password'))
                            @foreach ($errors->get('password') as $message)
                                <div class="invalid-feedback ms-2">
                                    {{ $message }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <button type="submit" class="btn submit_btn w-100 my-3">Login</button>
                    <div class="fw-normal text-muted mb-2">
                        <a href="{{ route('signup') }}" class="text-muted fw-bold text-decoration-none">Non hai un account?</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
