<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coupon</title>
  <link rel="stylesheet" href="{{asset(css/coupon.css)}}">
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
              <a class="nav-link" href="signup.html">Signup</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Coupon -->
  <div class="coupon-container">
    <form class="rounded bg-white shadow p-5">
      <div class="row">
        <div class="col">
          <img class="card-img-top" src="{{asset(css/images/coupon1.png)" alt="Company image cap">
          <h5>Nome azienda</h5>
        </div>
        <div class="col">
          <h1 class="text-dark fw-bolder fs-1 mb-2">Nome prodotto</h1>
          <br>
          <h4>Descrizione prodotto:</h4>
          <h7> Lorem ipsum dolor sit amet, consectetur adipisci elit, sed eiusmod tempor incidunt ut labore et dolore magna aliqua.
            Ut enim ad minim veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur.
            Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
            Excepteur sint obcaecat cupiditat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
          </h7> 
        </div>
        <div class="col colonna">
          <h6>Periodo di validità: 7gg</h6>
          <h6>Dove utilizzarlo: Azienda</h6>
        </div>
      </div>
      <div class="row">
        <div class="col">
        </div>
        <div class="col">
        </div>
        <div class="col colonna">
          <h4>Tipo di sconto:</h4>
          <a class="btn btn-lg px-5 disabled" href="#" role="button">Riscatta</a>
        </div>
      </div>
    </form>
  </div>

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