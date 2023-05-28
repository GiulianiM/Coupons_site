@extends('layouts.admin')

@section('title', 'Form Staff')

@section('scripts')
    @parent
    <script src="{{ asset('js/form_validation.js') }}"></script>

    <script>
        $(function (){
            const actionUrl = "{{ isset($staff) ? route('staff.update', ['staff' => $staff->idUtente]) : route('staff.store') }}";
            const formId = $('.container > form').attr('id');
            validateForm(actionUrl, formId);
        })
    </script>
@endsection

@section('content')
    <div class="container">
        <form
            id="staffform"
            action="{{ isset($staff) ? route('staff.update', ['staff' => $staff->idUtente]) : route('staff.store') }}"
            method="POST" class="rounded shadow p-5">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="nome" id="nome"
                       class="{{ $errors->has('nome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->nome : old('nome') }}" placeholder="Nome">
                <label for="nome">Nome</label>
            </div>

            <div class="form-floating mb-3">
                <input type="text" name="cognome" id="cognome"
                       class="{{ $errors->has('cognome') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($staff) ? $staff->cognome : old('cognome') }}" placeholder="Cognome">
                <label for="cognome">Cognome</label>
            </div>

            @if (!isset($staff))

                <div class="form-floating mb-3">
                    <input type="text" name="username" id="username"
                           class="{{ $errors->has('username') ? 'form-control is-invalid' : 'form-control' }}"
                           value="{{ isset($staff) ? $staff->username : old('username') }}" placeholder="Username">
                    <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" id="password"
                           class="{{ $errors->has('password') ? 'form-control is-invalid' : 'form-control' }}"
                           value="{{ isset($staff) ? $staff->password : old('password') }}" placeholder="Password">
                    <label for="password">Password</label>
                </div>
            @endif

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.staff') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
