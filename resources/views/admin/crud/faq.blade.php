@extends('layouts.admin')

@section('title', 'Form FAQ')

@section('content')
    <div class="container">
        <form
            action="{{ isset($faq) ? route('faq.update', ['faq' => $faq->idFaq]) : route('faq.store') }}"
            method="POST" class="rounded shadow p-5">
            @csrf
            @if (isset($faq))
                @method('PUT')
            @endif

            <div class="form-floating mb-3">
                <input type="text" name="titolo" id="titolo"
                       class="{{ $errors->has('titolo') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($faq) ? $faq->titolo : old('titolo') }}" placeholder="Titolo">
                <label for="titolo">Titolo</label>
                @if ($errors->first('titolo'))
                    @foreach ($errors->get('titolo') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="form-floating mb-3">
                <textarea name="descrizione" id="descrizione"
                          class="{{$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control' }}"
                          placeholder="Descrizione">{{ isset($faq) ? $faq->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>
                @if ($errors->first('descrizione'))
                    @foreach ($errors->get('descrizione') as $message)
                        <div class="invalid-feedback ms-2">
                            {{$message}}
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.faq') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
