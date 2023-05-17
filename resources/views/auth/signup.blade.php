<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signup</title>
  <link rel="stylesheet" href="{{asset(css/signup.css)}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

@section('content')
    <div class="wrapper">
        <div class="container">
            <form class="rounded bg-white shadow p-5">
                <h1 class="fw-bolder d-flex justify-content-center fs-1 pb-4">Registrati</h1>
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
                            <label for="floatingPhone">Password</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingGender" aria-label="Genere">
                                <option selected disabled>Genere</option>
                                <option value="male">M</option>
                                <option value="female">F</option>
                            </select>
                            <label for="floatingGender">Genere</label>
                        </div>

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
                            <input type="text" class="form-control" id="floatingTelefono" placeholder="Telefono">
                            <label for="floatingTelefono">Telefono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control" id="floatingDate" placeholder="Date">
                            <label for="floatingDate">Data di nascita</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn submit_btn w-100 my-3">Registrati</button>
                <div class="fw-normal text-muted mb-2">
                    <a href="/login" class="text-muted fw-bold text-decoration-none">Hai già un account?</a>
                </div>
            </form>
        </div>
    </div>
@endsection
