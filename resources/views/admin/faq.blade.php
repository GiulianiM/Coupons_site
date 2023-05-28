@extends('layouts.admin')

@section('title', 'Gestione FAQ')

@section('scripts')
    @parent
    <script src="{{ asset('js/tables.js') }}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            FAQ</strong>
                    </div>
                    <div class="right">
                        @include('layouts.search_admin')
                    </div>
                    <div class="table custom-scrollbar max-height overflow-auto">
                        @isset($faqs)
                            <table class="table" id="table-faq">
                                <thead class="table-light ">
                                <tr>
                                    <th>#</th>
                                    <th>Titolo</th>
                                    <th>Descrizione</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $faq->titolo }}</td>
                                        <td>{{ $faq->descrizione }}</td>

                                        <td><a href="{{ route('faq.edit', ['faq' => $faq->idFaq]) }}"><i
                                                    class="fas fa-pencil-alt table-icon-edit"></i></a></td>
                                        <td><a href="{{ route('faq.delete', ['faq' => $faq->idFaq]) }}"><i
                                                    class="fas fa-trash table-icon-trash"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>

            <div class="col-md-2">
                <div class="border rounded shadow box-content">
                    <strong>Pannello</strong>
                    <div class="d-md-flex justify-content-md-center btn-add-box">
                        <button class="btn btn-warning btn-add" type="button"
                                onclick="window.location='{{ route('faq.create') }}'">Inserisci FAQ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
