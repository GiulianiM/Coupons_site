@extends('layouts.admin')

@section('title', 'Inserimento Prodotti')

@section('content')
<div class="static">
    <h3>Aggiungi Prodotti</h3>
    <p>Utilizza questa form per inserire un nuovo prodotto nel Catalogo</p>

    <div class="container-contact">
        <div class="wrap-contact">
            {{ Form::open(array('route' => 'newproduct.store', 'id' => 'addproduct', 'files' => true, 'class' => 'contact-form')) }}
            {{ Form::token() }}
            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('name', 'Nome Prodotto', ['class' => 'label-input']) }}
                {{ Form::text('name', '', ['class' => 'input', 'id' => 'name']) }}
                @if ($errors->first('name'))
                <ul class="errors">
                    @foreach ($errors->get('name') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('catId', 'Categoria', ['class' => 'label-input']) }}
                {{ Form::select('catId', $cats, '', ['class' => 'input','id' => 'catId']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('image', 'Immagine', ['class' => 'label-input']) }}
                {{ Form::file('image', ['class' => 'input', 'id' => 'image']) }}
                @if ($errors->first('image'))
                <ul class="errors">
                    @foreach ($errors->get('image') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('descShort', 'Descrizione Breve', ['class' => 'label-input']) }}
                {{ Form::text('descShort', '', ['class' => 'input', 'id' => 'descShort']) }}
                @if ($errors->first('descShort'))
                <ul class="errors">
                    @foreach ($errors->get('descShort') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('price', 'Prezzo', ['class' => 'label-input']) }}
                {{ Form::text('price', '', ['class' => 'input', 'id' => 'price']) }}
                @if ($errors->first('price'))
                <ul class="errors">
                    @foreach ($errors->get('price') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('discountPerc', 'Sconto (%)', ['class' => 'label-input']) }}
                {{ Form::text('discountPerc', '', ['class' => 'input', 'id' => 'discountPerc']) }}
                @if ($errors->first('discountPerc'))
                <ul class="errors">
                    @foreach ($errors->get('discountPerc') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('discounted', 'In Sconto', ['class' => 'label-input']) }}
                {{ Form::select('discounted', ['1' => 'Si', '0' => 'No'], 1, ['class' => 'input','id' => 'discounted']) }}
            </div>

            <div  class="wrap-input  rs1-wrap-input">
                {{ Form::label('descLong', 'Descrizione Estesa', ['class' => 'label-input']) }}
                {{ Form::textarea('descLong', '', ['class' => 'input', 'id' => 'descLong', 'rows' => 2]) }}
                @if ($errors->first('descLong'))
                <ul class="errors">
                    @foreach ($errors->get('descLong') as $message)
                    <li>{{ $message }}</li>
                    @endforeach
                </ul>
                @endif
            </div>

            <div class="container-form-btn">
                {{ Form::submit('Aggiungi Prodotto', ['class' => 'form-btn1']) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>

</div>
@endsection


