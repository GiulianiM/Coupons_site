@extends('layouts.public')

@section('title', 'Signup')

@section('content')
    <div class="wrapper">
        <div class="container">

            {{ Form::open(array('route' => 'signup', 'class' => 'rounded bg-white shadow p-5')) }}
            @csrf
            <h1 class="fw-bolder d-flex justify-content-center fs-1 pb-4">Registrati</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        {{ Form::text('username', "",array('class'=>$errors->has('username') ? 'form-control is-invalid' : 'form-control', 'id' => 'username', 'placeholder' => 'Username')) }}
                        {{ Form::label('username', 'Username', array('for' => 'username')) }}
                        @if ($errors->first('username'))
                                @foreach ($errors->get('username') as $message)
                                    <div class="invalid-feedback ms-2">
                                        {{$message}}
                                    </div>
                                @endforeach
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::text('nome', "",array('class'=>'form-control', 'id'=>"nome", 'placeholder'=>'Nome')) }}
                        {{ Form::label('nome', 'Nome', array('for' => 'nome')) }}
                        @if ($errors->first('nome'))
                            <ul class="errors">
                                @foreach ($errors->get('nome') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::password('password',array('class'=>'form-control', 'id'=>"password", 'placeholder'=>'Password')) }}
                        {{ Form::label('password', 'Password', array('for' => 'password')) }}
                        @if ($errors->first('password'))
                            <ul class="errors">
                                @foreach ($errors->get('password') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::select('genere', ['1' => '1', '0' => '0'], '1', ['class' => 'form-select', 'id'=>"genere", 'placeholder'=>'Genere']) }}
                        {{ Form::label('genere', 'Genere', array('for' => 'genere')) }}
                        @if ($errors->first('genere'))
                            <ul class="errors">
                                @foreach ($errors->get('genere') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                        {{ Form::email('email', "",array('class'=>'form-control', 'id'=>"email", 'placeholder'=>'Email')) }}
                        {{ Form::label('email', 'Email', array('for' => 'email')) }}
                        @if ($errors->first('email'))
                            <ul class="errors">
                                @foreach ($errors->get('email') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::text('cognome', "",array('class'=>'form-control', 'id'=>"cognome", 'placeholder'=>'Cognome')) }}
                        {{ Form::label('cognome', 'Cognome', array('for' => 'surname')) }}
                        @if ($errors->first('cognome'))
                            <ul class="errors">
                                @foreach ($errors->get('cognome') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::number('telefono', "",array('class'=>'form-control', 'id'=>"telefono", 'placeholder'=>'Telefono')) }}
                        {{ Form::label('telefono', 'Telefono', array('for' => 'telefono')) }}
                        @if ($errors->first('telefono'))
                            <ul class="errors">
                                @foreach ($errors->get('telefono') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-floating mb-3">
                        {{ Form::number('eta', "",array('class'=>'form-control', 'id'=>"eta", 'placeholder'=>'Età')) }}
                        {{ Form::label('eta', 'Età', array('for' => 'eta')) }}
                        @if ($errors->first('eta'))
                            <ul class="errors">
                                @foreach ($errors->get('eta') as $message)
                                    <li>{{ $message }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
                {{ Form::submit('Registrati', ['class' => 'btn submit_btn w-100 my-3']) }}
            <div class="fw-normal text-muted mb-2">
                <a href="{{ route('login') }}" class="text-muted fw-bold text-decoration-none">Hai già un account?</a>
            </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection
