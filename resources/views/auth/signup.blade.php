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

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
          aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">
          <img src="{{asset(css/images/logo.png)}}" class="d-inline-block align-top" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aziende.html">Aziende</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="faq.html">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="signup.html">Signup</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="wrapper">
    <div class="container">
      <form class="rounded bg-white shadow p-5">
      <h1 class="fw-bolder fs-1 mb-2">Registrati</h1>
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
        <a href="login.html" class="text-muted fw-bold text-decoration-none">Hai già un account?</a>
      </div>
    </form>
    </div>
  </section>


  <!-- Footer -->
  <footer class="row row-cols-5 row-cols-sm-5 row-cols-md-5 pt-5 mt-5 mx-0 border-top">
    <div class="col mb-3">
      <a href="index.html" class="d-flex align-items-center link-dark text-decoration-none">
        <img src="{{asset(css/images/logo.png)}}" alt="logo">
      </a>
    </div>

    <div class="col mb-3">

    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>

    <div class="col mb-3">
      <h5>Section</h5>
      <ul class="nav flex-column">
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
        <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
      </ul>
    </div>
  </footer>
  <!-- Footer -->

  <!-- Add any necessary JavaScript files here -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/49d9d591d6.js" crossorigin="anonymous"></script>

</body>

</html>