<?php

namespace Database\Seeders;

use App\Models\Azienda;
use App\Models\Resources\Coupon;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utente')->insert([
            [
                'username' => 'adminadmin',
                'password' => Hash::make('JmoxlJ1q'),
                'livello' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
                'nome' => null,
                'cognome' => null,
                'genere' => null,
                'eta' => null,
                'email' => null,
                'telefono' => null,
            ],
            [
                'username' => 'staffstaff',
                'password' => Hash::make('JmoxlJ1q'),
                'nome' => 'Mario',
                'cognome' => 'Rossi',
                'livello' => 'staff',
                'created_at' => now(),
                'updated_at' => now(),
                'genere' => null,
                'eta' => null,
                'email' => null,
                'telefono' => null,
            ],
            [
                'username' => 'useruser',
                'password' => Hash::make('JmoxlJ1q'),
                'nome' => 'Luca',
                'cognome' => 'Verdi',
                'livello' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
                'genere' => 'M',
                'eta' => 21,
                'email' => 'luca@verdi.it',
                'telefono' => '3333333333',
            ]
        ]);

        DB::table('faq')->insert([
            [
                'idUtente' => 1,
                'titolo' => 'Come funziona il riscatto dei coupon sul sito?',
                'descrizione' => 'Per riscattare un coupon sul nostro sito, devi essere registrato e aver effettuato l\'accesso al tuo account. Una volta trovato il coupon desiderato, fai clic sul pulsante di riscatto e il coupon verrà aggiunto al tuo profilo. Ricorda che ogni coupon può essere riscattato una sola volta per utente.'
            ],
            [
                'idUtente' => 1,
                'titolo' => 'Posso riscattare più volte lo stesso coupon?',
                'descrizione' => 'No, ogni coupon può essere riscattato una sola volta per utente. Una volta che hai riscattato un coupon e lo hai aggiunto al tuo profilo, non sarà più possibile riscattarlo nuovamente.'
            ],
            [
                'idUtente' => 1,
                'titolo' => 'Dove posso trovare i coupon che ho già riscattato?',
                'descrizione' => 'Tutti i coupon che hai riscattato saranno visibili nella sezione del tuo profilo. Accedi al tuo account e vai alla sezione "Coupon riscattati" per visualizzare l\'elenco completo dei coupon che hai già utilizzato.'
            ],
            [
                'idUtente' => 1,
                'titolo' => 'Posso condividere i coupon riscattati con altre persone?',
                'descrizione' => 'I coupon riscattati sono strettamente personali e non possono essere condivisi con altre persone. Ogni utente può riscattare e utilizzare i propri coupon, ma non è possibile trasferirli o condividerli con altri utenti.'
            ],
            [
                'idUtente' => 1,
                'titolo' => 'Come posso modificare i miei dati personali?',
                'descrizione' => 'Per modificare i tuoi dati personali, accedi al tuo account e vai alla sezione "Profilo". Qui potrai modificare i tuoi dati personali e aggiornarli.'
            ],
            [
                'idUtente' => 1,
                'titolo' => 'Dove possono essere utilizzati i coupon riscattati?',
                'descrizione' => 'I coupon riscattati potranno essere presso il punto vendita indicato nel coupon. Per maggiori informazioni, consulta la descrizione della promozione.'
            ]
        ]);

        DB::table('azienda')->insert([
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Apple',
                'via' => 'Via dei Giardini',
                'numero_civico' => 10,
                'citta' => 'Milano',
                'cap' => '20100',
                'logo' => 'apple.svg',
                'ragione_sociale' => 'Inc.',
                'descrizione' => 'Apple Inc. è un\'azienda statunitense che produce dispositivi e software. È conosciuta principalmente per i suoi prodotti come iPhone, iPad, Mac e Apple Watch. Apple è nota per il design innovativo, l\'elevata qualità e l\'ecosistema integrato che offre ai suoi utenti. Con sede a Cupertino, California, Apple è diventata una delle aziende più influenti nel settore della tecnologia.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Samsung',
                'via' => 'Via Roma',
                'numero_civico' => 20,
                'citta' => 'Roma',
                'cap' => '00100',
                'logo' => 'samsung.svg',
                'ragione_sociale' => 'Corporation',
                'descrizione' => 'Samsung è un\'azienda sudcoreana specializzata nella produzione di dispositivi elettronici. Offre una vasta gamma di prodotti tra cui smartphone, tablet, televisori, elettrodomestici e componenti per computer. Samsung è nota per la sua innovazione tecnologica, la qualità dei suoi prodotti e la sua presenza globale. È uno dei principali concorrenti di Apple nel settore della tecnologia.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'OnePlus',
                'via' => 'Via Venezia',
                'numero_civico' => 30,
                'citta' => 'Firenze',
                'cap' => '50100',
                'logo' => 'oneplus.svg',
                'ragione_sociale' => 'Technology',
                'descrizione' => 'OnePlus è un produttore cinese di smartphone di alta qualità. L\'azienda si è guadagnata una reputazione per offrire dispositivi con specifiche tecniche avanzate a un prezzo competitivo. I telefoni OnePlus sono noti per le loro prestazioni eccellenti, il design elegante e l\'interfaccia utente personalizzata basata su Android chiamata OxygenOS. OnePlus ha sviluppato una base di fan fedeli grazie alla sua combinazione di valore e qualità.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Logitech',
                'via' => 'Via Garibaldi',
                'numero_civico' => 40,
                'citta' => 'Torino',
                'cap' => '10100',
                'logo' => 'logitech.svg',
                'ragione_sociale' => 'Inc.',
                'descrizione' => 'Logitech è un\'azienda svizzera specializzata nella produzione di periferiche informatiche. Offre una vasta gamma di prodotti tra cui tastiere, mouse, altoparlanti, webcam e molto altro. Logitech è conosciuta per la qualità e l\'innovazione delle sue periferiche, che sono utilizzate sia dagli utenti domestici che dai professionisti. Grazie alla sua esperienza e alla sua reputazione, Logitech è diventata un marchio di riferimento nel settore delle periferiche informatiche.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Corsair',
                'via' => 'Via Cavour',
                'numero_civico' => 50,
                'citta' => 'Napoli',
                'cap' => '80100',
                'logo' => 'corsair.svg',
                'ragione_sociale' => 'Corporation',
                'descrizione' => 'Corsair è un\'azienda statunitense specializzata nella produzione di componenti e periferiche per computer. Offre una vasta gamma di prodotti destinati ai giocatori e agli appassionati di PC, tra cui tastiere, mouse, schede grafiche, alimentatori e molto altro. Corsair è conosciuta per la qualità e le prestazioni dei suoi prodotti, che sono spesso scelti dai giocatori professionisti e dagli overclocker. L\'azienda ha costruito una solida reputazione nel settore dei componenti per computer di alta qualità.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'HP',
                'via' => 'Via Dante',
                'numero_civico' => 60,
                'citta' => 'Bologna',
                'cap' => '40100',
                'logo' => 'hp.svg',
                'ragione_sociale' => 'HP Inc.',
                'descrizione' => 'HP, acronimo di Hewlett-Packard, è un\'azienda statunitense che produce dispositivi e software. Offre una vasta gamma di prodotti tra cui stampanti, computer portatili, desktop, workstation e molto altro. HP è conosciuta per la sua lunga storia di innovazione e qualità. I suoi prodotti sono ampiamente utilizzati sia a livello domestico che aziendale. HP è uno dei principali attori nel settore della tecnologia e fornisce soluzioni per le esigenze informatiche di milioni di persone in tutto il mondo.',
                'tipologia' => 'Tecnologia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Conad',
                'via' => 'Via Mazzini',
                'numero_civico' => 70,
                'citta' => 'Genova',
                'cap' => '16100',
                'logo' => 'conad.svg',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Conad è una catena italiana di supermercati che offre una vasta selezione di prodotti alimentari e non alimentari. I negozi Conad sono presenti in tutto il paese e offrono un\'ampia scelta di prodotti di alta qualità a prezzi competitivi. Conad si impegna a soddisfare le esigenze dei suoi clienti offrendo una combinazione di prodotti freschi, convenienza e servizio eccellente. È diventato un punto di riferimento per gli acquisti quotidiani degli italiani.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Crai',
                'via' => 'Via Matteotti',
                'numero_civico' => 80,
                'citta' => 'Verona',
                'cap' => '37100',
                'logo' => 'crai.svg',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Crai è una catena italiana di supermercati che si concentra sulla qualità e l\'autenticità dei prodotti. I negozi Crai offrono una vasta selezione di alimentari freschi, prodotti locali, vini e molto altro. L\'azienda si impegna a sostenere i produttori locali e a offrire prodotti di alta qualità ai suoi clienti. Grazie alla sua attenzione per la qualità e alla sua presenza diffusa sul territorio, Crai è diventato un punto di riferimento per gli acquirenti che cercano prodotti autentici.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Esselunga',
                'via' => 'Via Garibaldi',
                'numero_civico' => 90,
                'citta' => 'Milano',
                'cap' => '20100',
                'logo' => 'esselunga.png',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Esselunga è una catena italiana di supermercati che si distingue per la qualità dei suoi prodotti e il servizio ai clienti. I negozi Esselunga offrono una vasta gamma di prodotti alimentari, bevande, prodotti per la casa e altro ancora. L\'azienda ha una forte attenzione per l\'eccellenza dei prodotti, la sostenibilità e l\'innovazione. Esselunga è un marchio di fiducia per molti consumatori italiani che cercano qualità e convenienza.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Si con te',
                'via' => 'Via Roma',
                'numero_civico' => 100,
                'citta' => 'Roma',
                'cap' => '00100',
                'logo' => 'si_con_te.png',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Si con te è una catena italiana di supermercati che si impegna a offrire prodotti sani e di qualità. I negozi Si con te mettono al centro il benessere dei clienti, offrendo una vasta selezione di prodotti biologici, senza glutine e adatti a diverse esigenze dietetiche. L\'azienda si impegna anche in iniziative di responsabilità sociale e sostenibilità ambientale. Si con te è una scelta ideale per coloro che cercano prodotti alimentari salutari e sostenibili.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Auchan',
                'via' => 'Via Torino',
                'numero_civico' => 110,
                'citta' => 'Milano',
                'cap' => '20100',
                'logo' => 'auchan.svg',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Auchan è una catena internazionale di ipermercati che offre una vasta selezione di prodotti alimentari e non alimentari. I negozi Auchan si distinguono per la loro ampiezza e la varietà di prodotti disponibili. L\'azienda si impegna a offrire prezzi competitivi e una buona esperienza di shopping ai suoi clienti. Auchan è presente in diversi paesi ed è un marchio riconosciuto a livello globale nel settore della grande distribuzione.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Carrefour',
                'via' => 'Via Garibaldi',
                'numero_civico' => 120,
                'citta' => 'Torino',
                'cap' => '10100',
                'logo' => 'carrefour.svg',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Carrefour è una catena internazionale di supermercati che offre una vasta gamma di prodotti alimentari, prodotti per la casa, elettronica e molto altro. L\'azienda è impegnata nella promozione di uno stile di vita sano e sostenibile, offrendo una selezione di prodotti biologici, a basso impatto ambientale e di qualità. Carrefour si distingue anche per il suo impegno sociale e ambientale attraverso diverse iniziative. È un marchio di fiducia per milioni di consumatori in tutto il mondo.',
                'tipologia' => 'Alimentari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Adidas',
                'via' => 'Via della Vittoria',
                'numero_civico' => 130,
                'citta' => 'Firenze',
                'cap' => '50100',
                'logo' => 'adidas.svg',
                'ragione_sociale' => 'AG',
                'descrizione' => 'Adidas è un\'azienda tedesca specializzata nella produzione di abbigliamento sportivo, calzature e accessori. L\'azienda è famosa per il suo design innovativo, la qualità dei suoi prodotti e la presenza di celebrità e atleti di fama mondiale come testimonial. Adidas offre una vasta gamma di prodotti per diverse attività sportive e lifestyle. È un marchio iconico nel settore della moda sportiva e un punto di riferimento per gli appassionati di sport e stile di tutto il mondo.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Nike',
                'via' => 'Via Milano',
                'numero_civico' => 140,
                'citta' => 'Roma',
                'cap' => '00100',
                'logo' => 'nike.svg',
                'ragione_sociale' => 'Inc.',
                'descrizione' => 'Nike è un\'azienda statunitense specializzata nella produzione di abbigliamento, calzature e accessori sportivi. È uno dei marchi più riconoscibili e influenti nel settore della moda sportiva. Nike offre una vasta gamma di prodotti per diverse discipline sportive, combinando innovazione tecnologica e design di tendenza. L\'azienda è nota per la sua partnership con numerosi atleti di fama mondiale e per il suo impegno per la sostenibilità ambientale. Nike rappresenta uno stile di vita attivo e dinamico.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Obey',
                'via' => 'Via Garibaldi',
                'numero_civico' => 150,
                'citta' => 'Milano',
                'cap' => '20100',
                'logo' => 'obey.svg',
                'ragione_sociale' => 'Clothing',
                'descrizione' => 'Obey è un marchio di abbigliamento e accessori con sede negli Stati Uniti. Fondata dal famoso artista di street art Shepard Fairey, Obey è conosciuta per il suo stile unico e audace. Il marchio si ispira alla cultura urbana e alla politica, creando design distintivi che riflettono l\'individualità e l\'attitudine dei suoi clienti.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Vans',
                'via' => 'Via Roma',
                'numero_civico' => 160,
                'citta' => 'Roma',
                'cap' => '00100',
                'logo' => 'vans.png',
                'ragione_sociale' => 'Inc.',
                'descrizione' => 'Vans è un\'azienda americana di calzature e abbigliamento con un focus particolare sullo skateboarding e lo stile di vita giovanile. Vans è famosa per le sue iconiche scarpe da skate, come le Vans Authentic e le Vans Old Skool, ma offre anche una vasta gamma di abbigliamento e accessori di tendenza. Il marchio si distingue per il suo spirito di libertà, creatività e autenticità.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Zara',
                'via' => 'Via Garibaldi',
                'numero_civico' => 170,
                'citta' => 'Milano',
                'cap' => '20100',
                'logo' => 'zara.svg',
                'ragione_sociale' => 'S.p.A.',
                'descrizione' => 'Zara è una catena di negozi di abbigliamento spagnola nota per la sua moda veloce e accessibile. L\'azienda offre una vasta gamma di abbigliamento, calzature e accessori per uomo, donna e bambini. Zara si distingue per il suo design di tendenza, la qualità dei suoi prodotti e la sua capacità di rispondere rapidamente alle ultime tendenze di moda. Con negozi presenti in tutto il mondo, Zara è diventato un marchio di moda globale apprezzato da molti consumatori.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idUtente' => 1,
                'visibile' => true,
                'nome' => 'Puma',
                'via' => 'Via Venezia',
                'numero_civico' => 180,
                'citta' => 'Firenze',
                'cap' => '50100',
                'logo' => 'puma.svg',
                'ragione_sociale' => 'SE',
                'descrizione' => 'Puma è un\'azienda tedesca di abbigliamento sportivo che offre una varietà di prodotti, inclusi abbigliamento, calzature e accessori per diverse discipline sportive. Puma è famosa per il suo design innovativo e il suo impegno verso l\'alto prestazioni. L\'azienda è sponsor di numerosi atleti e squadre sportive, e si dedica a promuovere uno stile di vita attivo e dinamico.',
                'tipologia' => 'Moda',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        DB::table('promozione')->insert([
            [
                'idAzienda' => 1,
                'titolo' => 'APPLE iPhone 14 128GB Mezzanotte',
                'descrizione' => 'L\'iPhone 14 è l\'ultima innovazione di Apple nel mondo degli smartphone. Questo straordinario dispositivo incarna l\'eccellenza tecnologica e il design elegante che hanno reso famoso l\'iPhone. Con una combinazione di potenza, funzionalità e stile, l\'iPhone 14 ridefinisce l\'esperienza utente e porta l\'utilizzo degli smartphone a un livello superiore.',
                'immagine' => 'iphone_14.webp',
                'modalita' => 'Online',
                'luogo' => 'Tutti gli apple store online',
                'inizio' => now(),
                'fine' => now()->addDays(30),
                'sconto' => 'percentuale',
                'valore_sconto' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'idAzienda' => 1,
                'titolo' => 'APPLE Watch Ultra GPS + Cellular, 49mm Cassa in titanio con Trail Loop giallo/beige - S/M',
                'descrizione' => 'L\'Apple Watch è un orologio intelligente di alta qualità che unisce stile, funzionalità e tecnologia avanzata. Con il suo design elegante e raffinato, l\'Apple Watch è il compagno perfetto per chi desidera tenere il polso al passo con il progresso tecnologico. Dotato di un display retina luminoso e nitido, l\'Apple Watch offre una chiara visualizzazione delle informazioni, delle notifiche e delle applicazioni. Puoi personalizzare il quadrante dell\'orologio con una vasta gamma di sfondi, complicazioni e stili, per adattarlo al tuo stile personale e alle tue esigenze.',
                'immagine' => 'apple_watch.webp',
                'modalita' => 'Online',
                'luogo' => 'Tutti gli apple store online',
                'inizio' => now()->subDays(2),
                'fine' => now()->addDays(14),
                'sconto' => 'prezzo_fisso',
                'valore_sconto' => '899.99',
                'created_at' => now()->subDays(2),
                'updated_at' => now()->subDays(2),
            ],
            [
                'idAzenda' => 2,
                'titolo' => 'Galaxy S23 Ultra Silicone Grip Case',
                'descrizione' => 'La custodia in silicone Grip Case è progettata per offrire una protezione completa al tuo Galaxy S23 Ultra. La custodia è realizzata in silicone di alta qualità, che offre una presa sicura e una protezione ottimale contro urti e graffi. La custodia è disponibile in una varietà di colori vivaci, per adattarsi al tuo stile personale.',
                'immagine' => 'cover_s23.avif',
                'modalita' => 'Negozio',
                'luogo' => 'Tutti i negozi Samsung',
                'inizio' => now()->subDays(5),
                'fine' => now()->addDays(10),
                'sconto' => 'quantita',
                'valore_sconto' => '2x1',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'idAzenda' => 2,
                'titolo' => 'Neo QLED 4K 43" QN90B TV 2022',
                'descrizione' => 'Il Neo QLED 4K 43" QN90B TV 2022 è un televisore di alta qualità che offre una straordinaria esperienza di visione. Il Neo QLED 4K 43" QN90B TV 2022 è dotato di un display QLED 4K, che offre una qualità dell\'immagine eccezionale. Il Neo QLED 4K 43" QN90B TV 2022 è dotato di un processore Quantum 4K, che offre una qualità dell\'immagine eccezionale. Il Neo QLED 4K 43" QN90B TV 2022 è dotato di un processore Quantum 4K, che offre una qualità dell\'immagine eccezionale. Il Neo QLED 4K 43" QN90B TV 2022 è dotato di un processore Quantum 4K, che offre una qualità dell\'immagine eccezionale.',
                'immagine' => 'neo_tv.avif',
                'modalita' => 'Online',
                'luogo' => 'Store online Samsung',
                'inizio' => now()->subDays(7),
                'fine' => now()->addDays(12),
                'sconto' => 'prezzo_fisso',
                'valore_sconto' => '799,00',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ],
            [
                'idAzenda' => 3,
                'titolo' => 'OnePlus 11 5G',
                'descrizione' => 'Il OnePlus 11 5G è uno smartphone di alta qualità che offre una straordinaria esperienza utente. Il OnePlus 11 5G è dotato di un display AMOLED da 6,55 pollici, che offre una qualità dell\'immagine eccezionale. Il OnePlus 11 5G è dotato di un processore Snapdragon 888, che offre prestazioni eccezionali. Il OnePlus 11 5G è dotato di una fotocamera principale da 50 MP, che offre una qualità dell\'immagine eccezionale. Il OnePlus 11 5G è dotato di una batteria da 4500 mAh, che offre un\'autonomia eccezionale.',
                'immagine' => 'oneplus_11.png',
                'modalita' => 'Online',
                'luogo' => 'Store online OnePlus',
                'inizio' => now()->subDays(5),
                'fine' => now()->addDays(20),
                'sconto' => 'prezzo_fisso',
                'valore_sconto' => '849,00',
                'created_at' => now()->subDays(5),
                'updated_at' => now()->subDays(5),
            ]
        ]);

//        User::factory()->admin()->create();
//        User::factory()->staff()->create();
//        User::factory()->user()->create();
//
//        Faq::factory()->count(6)->create();
//
//        Azienda::factory()->count(18)->create();
//
//        Azienda::all()->each(function ($azienda) {
//            $azienda->promozioni()->saveMany(
//                Promozione::factory()->count(2)->make()
//            );
//        });
//
//        Promozione::all()->each(function ($promozione) {
//            if($promozione->inizio <= now()) {
//                $promozione->coupon()->save(
//                    Coupon::factory()->create(['idPromozione' => $promozione->idPromozione])
//                );
//            }
//        });

    }
}
