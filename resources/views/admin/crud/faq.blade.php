@extends('layouts.admin')

@section('title', 'Form FAQ')

@section('scripts')
    @parent
    <script src="{{ asset('js/form_validation.js') }}"></script>

    <script>
        $(function (){
            const actionUrl = "{{ isset($faq) ? route('faq.update', ['faq' => $faq->idFaq]) : route('faq.store') }}";
            const formId = $('.container > form').attr('id');
            validateForm(actionUrl, formId);
        })
    </script>
@endsection

@section('content')
    <div class="container">
        <form
            id="faqform"
            action="{{ isset($faq) ? route('faq.update', ['faq' => $faq->idFaq]) : route('faq.store') }}"
            method="POST" class="rounded shadow p-5">
            @csrf

            <div class="form-floating mb-3">
                <input type="text" name="titolo" id="titolo"
                       class="{{ $errors->has('titolo') ? 'form-control is-invalid' : 'form-control' }}"
                       value="{{ isset($faq) ? $faq->titolo : old('titolo') }}" placeholder="Titolo">
                <label for="titolo">Titolo</label>
            </div>

            <div class="form-floating mb-3">
                <textarea name="descrizione" id="descrizione"
                          class="{{$errors->has('descrizione') ? 'form-control is-invalid' : 'form-control' }}"
                          placeholder="Descrizione">{{ isset($faq) ? $faq->descrizione : old('descrizione') }}</textarea>
                <label for="descrizione">Descrizione</label>
            </div>

            <button type="reset" class="btn btn-danger" onclick="window.location.href='{{ route('admin.faq') }}'">
                Annulla
            </button>
            <button type="submit" class="btn btn-success">Salva</button>
        </form>
    </div>
@endsection
