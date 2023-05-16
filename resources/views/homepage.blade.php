<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
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
          <img src="{{asset('css/images/logo.png')}}" class="d-inline-block align-top" alt="logo">
        </a>
        <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.html">Home</a>
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

  <div class="search-container container-fluid">
    <form class="d-flex" role="search">
      <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>

  <!-- Nuovi Coupon carousel -->
  <div class="coupons-container">
    <h1 class="d-flex justify-content-center fw-bold">Nuovi Coupon</h1>
    <div class="carousel-container">
      <!-- Add left arrow -->
      <div class="carousel-arrow carousel-arrow-left">
        <i class="fa-solid fa-arrow-left"></i>
      </div>
      <div class="carousel-wrapper">
        <div class="carousel">
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 1 title</h5>
                </a>
                <p class="card-text">-10%</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 2 title</h5>
                </a>
                <p class="card-text">-20$</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 3 title</h5>
                </a>
                <p class="card-text">-30%</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 4 title</h5>
                </a>
                <p class="card-text">-40$</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 5 title</h5>
                </a>
                <p class="card-text">-15%</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 6 title</h5>
                </a>
                <p class="card-text">-5$</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 7 title</h5>
                </a>
                <p class="card-text">-30%</p>
              </div>
            </div>
          </div>
          <div class="slide">
            <div class="card">
              <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
              <div class="card-body">
                <a href="coupon.html" class="card-link">
                  <h5 class="card-title">Coupon 8 title</h5>
                </a>
                <p class="card-text">-40$</p>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-arrow carousel-arrow-right">
          <i class="fa-solid fa-arrow-right"></i>
        </div>
      </div>
    </div>
  </div>


  <!-- Tutti i coupon grid view -->
  <div class="coupons-container">
    <h1 class="d-flex justify-content-center fw-bold">Tutti i Coupon</h1>
    <div class="grid-view">
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 1 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 2 title</h5>
          </a>
          <p class="card-text">-20$</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 3 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 4 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 5 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 6 title</h5>
          </a>
          <p class="card-text">-20$</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 7 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <div class="card">
        <img class="card-img-top" src="{{asset('css/images/coupon1.png')}}" alt="Card image cap">
        <div class="card-body">
          <a href="coupon.html" class="card-link">
            <h5 class="card-title">Coupon 8 title</h5>
          </a>
          <p class="card-text">-10%</p>
        </div>
      </div>
      <!-- Add more cards as needed -->
    </div>
  </div>
  </div>

  <!-- Footer -->
  <footer class="row row-cols-5 row-cols-sm-5 row-cols-md-5 pt-5 mt-5 mx-0 border-top">
    <div class="col mb-3">
      <a href="index.html" class="d-flex align-items-center link-dark text-decoration-none">
        <img src="{{asset('css/images/company.png')}}" alt="coupon1">
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <script>
    $(document).ready(function () {
      $('.carousel').slick({
        dots: true,
        arrows: true,
        infinite: true,
        speed: 500,
        slidesToShow: 4,
        slidesToScroll: 4,
        adaptiveHeight: true,
        prevArrow: $('.carousel-arrow-left'),
        nextArrow: $('.carousel-arrow-right'),
        responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
        ]
      });
    });
  </script>
</body>

</html>