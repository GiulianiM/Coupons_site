@extends('layouts.public')

@section('title', 'Signup')

@section('content')
    <div class="empty-space"></div>
    <div class="wrapper">
        <div class="container">
            <form action="{{ route('signup') }}" method="POST" class="rounded bg-white shadow p-5">
                @csrf
                <h1 class="fw-bolder text-center  mb-4">Registrati</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" name="username"
                                   class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" id="username"
                                   placeholder="Username" value="{{ old('username') }}">
                            <label for="username">Username</label>
                            @if ($errors->has('username'))
                                @foreach ($errors->get('username') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="nome"
                                   class="form-control{{ $errors->has('nome') ? ' is-invalid' : '' }}" id="nome"
                                   placeholder="Nome" value="{{ old('nome') }}">
                            <label for="nome">Nome</label>
                            @if ($errors->has('nome'))
                                @foreach ($errors->get('nome') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password"
                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password"
                                   placeholder="Password">
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                @foreach ($errors->get('password') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <select name="genere" class="form-select{{ $errors->has('genere') ? ' is-invalid' : '' }}"
                                    id="genere">
                                <option value="" {{ (old('genere') == null) ? 'selected' : '' }} disabled>Seleziona il genere</option>
                                <option value="M" {{ old('genere') == 'M' ? 'selected' : '' }}>Maschio</option>
                                <option value="F" {{ old('genere') == 'F' ? 'selected' : '' }}>Femmina</option>
                            </select>
                            <label for="genere">Genere</label>
                            @if ($errors->has('genere'))
                                @foreach ($errors->get('genere') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" name="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email"
                                   placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @if ($errors->has('email'))
                                @foreach ($errors->get('email') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="cognome"
                                   class="form-control{{ $errors->has('cognome') ? ' is-invalid' : '' }}" id="cognome"
                                   placeholder="Cognome" value="{{ old('cognome') }}">
                            <label for="cognome">Cognome</label>
                            @if ($errors->has('cognome'))
                                @foreach ($errors->get('cognome') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" id="telefono"
                                   placeholder="Telefono" value="{{ old('telefono') }}">
                            <label for="telefono">Telefono</label>
                            @if ($errors->has('telefono'))
                                @foreach ($errors->get('telefono') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" name="eta"
                                   class="form-control{{ $errors->has('eta') ? ' is-invalid' : '' }}" id="eta"
                                   placeholder="Età" value="{{ old('eta') }}"
                                   min="16"
                                   max="99">
                            <label for="eta">Età</label>
                            @if ($errors->has('eta'))
                                @foreach ($errors->get('eta') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{ $message }}
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn submit_btn w-100 my-3">Registrati</button>
                <div class="fw-normal text-muted mb-2">
                    <a href="{{ route('login') }}" class="text-muted fw-bold text-decoration-none">Hai già un
                        account?</a>
                </div>
            </form>
        </div>
    </div>
    <div class="empty-space"></div>
@endsection
