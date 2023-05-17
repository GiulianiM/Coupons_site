@extends('layouts.public')

@section('title', 'Login')

@section('content')
  <div class="wrapper">
    <div class="container">
        <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
            <form class="rounded bg-white shadow p-5">
                <h1 class="fw-bolder fs-1 mb-2">Bentornato</h1>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingUsername" placeholder="Username">
                    <label for="floatingUsername">Username</label>
                  </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <a class="btn submit_btn w-100 my-2" href="/">Login</a>
                <div class="fw-normal text-muted mb-2">
                    <a href="/signup" class="text-muted fw-bold text-decoration-none">Non hai un account?</a>
                  </div>
            </form>
        </div>
    </div>
</div>
@endsection
