@extends('layouts.admin')

@section('title', 'Form Staff')

@section('content')
    <div class="container">
        <form
            action="{{ isset($staff) ? route('staff.update', ['staff' => $staff->idUtente]) : route('staff.store') }}"
            method="POST" class="rounded shadow p-5">
            @csrf
            @if (isset($staff))
                @method('PUT')
            @endif

            <div class="form-floating mb-3">
                <input type="text" name="nome" id="nome"
                       class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->nome : old('nome') }}" placeholder="Nome">
                <label for="nome">Nome</label>
                @if ($errors->first('nome'))
                    @foreach ($errors->get('nome') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="cognome" id="cognome"
                       class="{{ $errors->has('cognome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->cognome : old('cognome') }}" placeholder="Cognome">
                <label for="cognome">Cognome</label>
                @if ($errors->first('cognome'))
                    @foreach ($errors->get('cognome') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="username" id="username"
                       class="{{ $errors->has('username') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->username : old('username') }}" placeholder="Username">
                <label for="username">Username</label>
                @if ($errors->first('username'))
                    @foreach ($errors->get('username') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            @if (!isset($staff))
            <div class="form-floating mb-3">
                <input type="password" name="password" id="password"
                       class="{{ $errors->has('password') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->password : old('password') }}" placeholder="Password">
                <label for="password">Password</label>
                @if ($errors->first('password'))
                    @foreach ($errors->get('password') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>
            @endif

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.staff') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
