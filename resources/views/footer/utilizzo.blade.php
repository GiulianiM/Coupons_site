@extends('layouts.public')

@section('title', 'Utilizzo')

@section('content')
    <div class="company-container">
        <form class="rounded bg-white shadow p-5">
            <h1 class="text-dark fw-bolder fs-1 mb-2">Come utilizzare il nostro sito:</h1>
            <br>
            <p class="fs-5"> Il nostro sito è progettato per rendere il processo di utilizzo dei coupon estremamente facile ed efficiente, tutto ciò che devi fare è effettuare il <a href="{{route('login')}}" class="text-dark fw-bold fs-5 text-decoration-none">login</a> o <a href="{{route('signup')}}" class="text-dark fw-bold fs-5 text-decoration-none">registrarti</a> per accedere alle nostre offerte.</p>
            <br>
             <p class="fs-5"> Se sei già un utente registrato, basta inserire le tue credenziali di accesso per accedere al tuo account personale. Se invece sei un nuovo utente è necessario registrarsi compilando un breve modulo con alcune informazioni di base.
                Quando trovi un coupon che desideri riscattare, clicca semplicemente su di esso per visualizzare il codice promozionale. Copia il codice e dirigiti al negozio online o fisico dell'azienda in questione. Durante il processo di pagamento
                o al momento dell'acquisto, inserisci il codice promozionale nella casella apposita per applicare lo sconto o l'offerta speciale.
                Ti ricordiamo che i coupon possono avere diverse restrizioni e condizioni di utilizzo, come una data di scadenza o un importo minimo di spesa. Assicurati di leggere attentamente i dettagli del coupon per garantire un riscatto senza intoppi.</p>
            <br>
            <p class="fs-5"> Ti invitiamo a unirti a noi sul nostro sito di coupon e a sfruttare al massimo le fantastiche offerte e sconti che abbiamo da offrire. Il risparmio è a portata di clic!</p>
        </form>
    </div>
@endsection
