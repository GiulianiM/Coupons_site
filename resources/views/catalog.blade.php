@extends('layouts.public')

@section('title', 'Catalogo Prodotti')

<!-- inizio sezione prodotti -->
@section('content')
<div id="content">
  @isset($products)
    @foreach ($products as $product)
    <div class="prod">
        <div class="prod-bgtop">
            <div class="prod-bgbtm">
                <div class="oneitem">
                    <div class="image">
                        @include('helpers/productImg', ['attrs' => 'imagefrm', 'imgFile' => $product->image])
                    </div>
                    <div class="info">
                        <h1 class="title">Prodotto: {{ $product->name }}</h1>
                        <p class="meta">Descrizione Breve: {{ $product->descShort }}</p>
                    </div>
                    <div class="pricebox">
                        @include('helpers/productPrice')
                    </div>
                </div>
                <div class="entry">
                    <p>Descrizione Estesa: {!! $product->descLong !!}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!--Paginazione-->
    @include('pagination.paginator', ['paginator' => $products])

  @endisset()
</div>

<!-- fine sezione prodotti -->

<div id="sidebar">
    <ul>
        <li>
            <h2>Categorie</h2>
            <ul>
                @foreach ($topCategories as $category)
                <li><a href="{{ route('catalog2', [$category->catId]) }}">{{ $category->name }}</a><span>{{ $category->desc }}</span></li>
                @endforeach
            </ul>
        </li>

        @isset($selectedTopCat)
        <li>
            <h2>In {{ $selectedTopCat->name }}</h2>
            <ul>
                @foreach ($subCategories as $subCategory)
                <li><a href="{{ route('catalog3', [$selectedTopCat->catId, $subCategory->catId]) }}">{{ $subCategory->name }}</a><span>{{ $subCategory->desc }}</span></li>
                @endforeach
            </ul>
        </li>
        @endisset
    </ul>
</div>
<!-- fine sezione laterale -->
@endsection


