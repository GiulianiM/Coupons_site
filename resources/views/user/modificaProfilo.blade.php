@extends('layouts.public')

@section('title', 'Modifica Profilo')

@section('content')

    <!-- Modifica profilo -->
    <section class="wrapper">
        <div class="container">
            <form class="rounded bg-white shadow p-5">
                <h1 class="text-dark fw-bolder fs-1 mb-2">Modifica profilo</h1>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingUsername" placeholder="Username">
                            <label for="floatingUsername">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingNome" placeholder="Nome">
                            <label for="floatingNome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPhone">Vecchia password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPhone">Conferma password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingGender" aria-label="Genere">
                                <option selected disabled>Genere</option>
                                <option value="male">M</option>
                                <option value="female">F</option>
                            </select>
                            <label for="floatingGender">Genere</label>
                        </div>
                        <button type="submit" class="btn submit_btn w-100 my-3">Salva</button>

                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingEmail" placeholder="Email">
                            <label for="floatingEmail">Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingCognome" placeholder="Cognome">
                            <label for="floatingCognome">Cognome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPhone">Nuova password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingTelefono" placeholder="Telefono">
                            <label for="floatingTelefono">Telefono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingDate" placeholder="Date">
                            <label for="floatingDate">Data di nascita</label>
                        </div>
                        <button type="submit" class="btn submit_btn w-100 my-3">Annulla</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
