@extends('layouts.admin')

@section('title', 'Gestione Utenti')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="border rounded shadow box-content">
                    <div class="d-md-flex align-items-md-center left">
                        <strong class="d-md-flex d-lg-flex align-items-md-center align-items-lg-center">Lista
                            utenti</strong>
                    </div>
                    <div class="right">
                        <form class="d-flex" action="{{ route('admin.users') }}" method="GET">
                            <div class="input-group">
                                <input class="form-control autocomplete" type="search" placeholder="Cerca..."
                                       aria-label="Search" name="search">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                @isset($search)
                                    <button class="btn btn-warning" type="reset" onclick="window.location='{{ route('admin.users') }}'">
                                        <i class="fa-solid fa-rotate-left"></i>
                                    </button>
                                @endisset
                            </div>
                        </form>
                    </div>

                        <div class="table-responsive table table-bordered custom-scrollbar mt-5">
                    @isset($users)
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nome</th>
                                    <th>Cognome</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->nome}}</td>
                                        <td>{{$user->cognome}}</td>
                                        <td>{{$user->email}}</td>
                                        <td><a href="{{ route('user.delete', ['user' => $user->idUtente]) }}"><i class="fas fa-trash table-icon-trash"></i></a></td>
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
                    <hr>
                    <div class="dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Ordina per
                        </button>
                        <ul class="dropdown-menu">
                            @foreach(['nome', 'cognome', 'email'] as $option)
                                <li>
                                    <a class="dropdown-item{{ $orderby === $option ? ' active' : '' }}"
                                       href="{{ route('admin.users', ['order_by' => $option]) }}">
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
