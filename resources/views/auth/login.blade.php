@extends('layouts.public')

@section('title', 'Login')

@section('content')
    <div class="wrapper">
        <div class="row">
            <div class="col text-center">
                {{Form::open(array('route' => 'login', 'class' => 'rounded bg-white shadow p-5'))}}
                @csrf
                <h1 class="fw-bolder fs-1 mb-3">Bentornato</h1>
                <div class="form-floating mb-3">
                    {{ Form::text('username', "",array('class'=>$errors->has('username') ? 'form-control is-invalid' : 'form-control', 'id' => 'username', 'placeholder' => 'Username')) }}
                    {{ Form::label('username', 'Username', array('for' => 'username')) }}
                    @if ($errors->first('username'))
                        @foreach ($errors->get('username') as $message)
                            <div class="invalid-feedback m-0">
                                {{$message}}
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-floating mb-3">
                    {{ Form::password('password',array('class'=>$errors->has('password') ? 'form-control is-invalid' : 'form-control', 'id' => 'password', 'placeholder' => 'Password')) }}
                    {{ Form::label('password', 'Password', array('for' => 'password')) }}
                    @if ($errors->first('password'))
                        @foreach ($errors->get('password') as $message)
                            <div class="invalid-feedback ms-2">
                                {{$message}}
                            </div>
                        @endforeach
                    @endif
                </div>
                {{ Form::submit('Login', ['class' => 'btn submit_btn w-100 my-3']) }}
                <div class="fw-normal text-muted mb-2">
                    <a href="{{ route('signup') }}" class="text-muted fw-bold text-decoration-none">Non hai un account?</a>
                </div>
            </div>
        </div>
    </div>
@endsection
