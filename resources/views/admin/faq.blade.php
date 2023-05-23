@extends('layouts.admin')

@section('title', 'Gestione FAQ')

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
                        <form class="d-flex" action="{{ route('admin.faq') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control autocomplete" type="search" placeholder="Cerca..."
                                       aria-label="Search" name="search">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                @isset($search)
                                    <button class="btn btn-warning" type="reset" onclick="window.location='{{ route('admin.faq') }}'">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </button>
                                @endisset
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                        @isset($faqs)
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Titolo</th>
                                    <th>Descrizione</th>
                                    <th colspan="2"></th>
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
                    <hr>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Ordina per {{ ucfirst($orderby) }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach(['titolo', 'descrizione'] as $option)
                                <li>
                                    <a class="dropdown-item{{ $orderby === $option ? ' active' : '' }}"
                                       href="{{ route('admin.faq', ['order_by' => $option]) }}">
                                        {{ ucfirst($option) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
