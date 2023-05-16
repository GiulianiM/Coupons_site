<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Aziende</title>
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler"
          aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.html">
          <img src="{{asset('images/logo.png')}}" class="d-inline-block align-top" alt="Logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="aziende.html">Aziende</a>
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

  <!-- Tutte le aziende grid view -->
  <div class="company-container">
    <h1 class="d-flex justify-content-center">Aziende</h1>
    <div class="grid-view">
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 1</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 2</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 3</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 4</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 5</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 6</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 7</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 8</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 9</h5>
          </a>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('images/company.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="azienda.html" class="card-link">
            <h5 class="card-title">Nome azienda 10</h5>
          </a>
        </div>
      </div>
      <!-- Add more cards as needed -->
    </div>
  </div>

  <!-- Footer -->
  <footer class="row row-cols-5 row-cols-sm-5 row-cols-md-5 pt-5 mt-5 mx-0 border-top">
    <div class="col mb-3">
      <a href="index.html" class="d-flex align-items-center link-dark text-decoration-none">
        <img src="{{asset('images/logo.png')}}" alt="logo">
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
