@extends('layouts.public')

@section('title', 'Azienda')

@section('content')

  <!-- Descrizione azienda -->
    <div class="company-container">
      <form class="rounded bg-white shadow p-5">
        <div class="row">
          <div class="col">
              <div class="image">
                  @include('helpers.aziendaImg', ['attrs' => 'card-img-top', 'imgFile' => $azienda->logo])
              </div>
          </div>
          <div class="col">
            <h1 class="text-dark fw-bolder fs-1 mb-2">{{$azienda->nome}}</h1>
            <br>
            <h4>Info azienda:</h4>
            <h7>{{$azienda->descrizione}}</h7>
          </div>
        </div>
      </form>
    </div>

    <!-- Coupon azienda -->
    @isset($promozioni)
    <div class="coupons-container">
      <h1 class="d-flex justify-content-center">Promozioni dell'azienda</h1>
      <div class="grid-view">
          @foreach($promozioni as $promozione)
              <div class="card">
                  <div class="image">
                      @include('helpers.promozioneImg', ['attrs' => 'card-img-top', 'imgFile' => $promozione->immagine])
                  </div>
                  <div class="card-body">
                      <a href="/promozione/{{$promozione->idPromozione}}" class="card-link">
                          <h5 class="card-title">{{ $promozione->titolo }}</h5>
                      </a>
                      <p class="card-text">{{ $promozione->sconto }}</p>
                  </div>
              </div>
          @endforeach
      </div>
    </div>
    <div class="d-flex justify-content-center">
        @include('pagination.paginator', ['paginator' => $promozioni])
    </div>
    @endisset
@endsection
