<?php

namespace Database\Seeders;

use Faker\Provider\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */


    public function run()
    {
        $faker = Faker::create();
        $company_tipologia = [
            'tecnologia',
            'moda',
            'alimentari',
        ];


        DB::table('utente')->insert([
            'username' => 'admin',
            'password' => Hash::make('adminadmin'),
            'livello' => 'admin',
        ]);

        DB::table('utente')->insert([
            'nome' => 'staff',
            'cognome' => 'staff',
            'username' => 'staff',
            'password' => Hash::make('staffstaff'),
            'livello' => 'staff',
        ]);

        DB::table('utente')->insert([
            'nome' => $faker->firstName,
            'cognome' => $faker->lastName,
            'genere' => $faker->randomElement(['M', 'F']),
            'eta' => $faker->numberBetween(18, 60),
            'email' => $faker->unique()->safeEmail,
            'telefono' => $faker->unique()->regexify('3[0-9]{9}'),
            'username' => 'user',
            'password' => Hash::make('useruser'),
        ]);


        for ($i = 0; $i < count($company_tipologia); $i++) {
            $tipologia = $company_tipologia[$i];

            for ($j = 0; $j < 6; $j++) {

                DB::table('azienda')->insert([
                    'idUtente' => 1,
                    'nome' => $faker->company,
                    'via' => $faker->streetName,
                    'citta' => $faker->city,
                    'numero_civico' => $faker->buildingNumber,
                    'cap' => str_pad($faker->numberBetween(0, 99100), 5, '0', STR_PAD_BOTH),
                    'logo' => $faker->image('public/images/aziende/', 640, 480, 'companies', false),
                    'ragione_sociale' => $faker->companySuffix,
                    'descrizione' => $faker->text,
                    'tipologia' => $tipologia,
                ]);


                $idAzienda = DB::getPdo()->lastInsertId();

                for($k = 1; $k <= 2; $k++) {
                    if($k==1){
                        $luogo = $faker->url;
                        $modalita = 'online';
                    }else{
                        $luogo = $faker->address;
                        $modalita = 'negozio';
                    }
                    for ($l = 1; $l <= 2; $l++) {
                        DB::table('promozione')->insert([
                            'idAzienda' => $idAzienda,
                            'titolo' => $faker->sentence,
                            'descrizione' => $faker->text,
                            'immagine' => $faker->image('public/images/promozioni/', 640, 480, 'promos', false),
                            'modalita' => $modalita,
                            'luogo' => $luogo,
                            'inizio' => $faker->dateTimeBetween('-1 week', '+1 day'),
                            'fine' => $faker->dateTimeBetween('-2 day', '+1 week'),
                            'sconto' => 'prezzo_fisso',
                            'valore_sconto' => '10€',
                        ]);
                    $idPromozione = DB::getPdo()->lastInsertId();
                    DB::table('coupon')->insert([
                        'idutente' => 3,
                        'idPromozione' => $idPromozione,
                        'codice' => Str::random(6),
                    ]);
                    }
                }
            }
        }
        /* for ($i = 1; $i <= 40; $i++) {
             DB::table('azienda')->insert([
                 'idUtente' => 1,
                 'nome' => $faker->company,
                 'via' => $faker->streetName,
                 'citta' => $faker->city,
                 'numero_civico' => $faker->buildingNumber,
                 'cap' => str_pad($faker->numberBetween(0, 99100), 5, '0', STR_PAD_BOTH),
                 //'logo' => 'company.png',
                 'ragione_sociale' => $faker->companySuffix,
                 'descrizione' => $faker->text,
                 'tipologia' => $faker->randomElement(['moda', 'tecnologia', 'alimentari']),
             ]);

             $idAzienda = DB::getPdo()->lastInsertId();

             for ($j = 1; $j <= 2; $j++) {
                 DB::table('promozione')->insert([
                     'idAzienda' => $idAzienda,
                     'titolo' => $faker->sentence,
                     'descrizione' => $faker->text,
                     //'immagine' => 'promozione.png',
                     'modalita' => 'online',
                     'luogo' => $faker->url,
                     'inizio' => $faker->dateTimeBetween('-1 week', '+1 day'),
                     'fine' => $faker->dateTimeBetween('-2 day', '+1 week'),
                     'sconto' => 'prezzo fisso',
                     'valore_sconto' => '-10€',
                 ]);
             }

             $idPromozione = DB::getPdo()->lastInsertId();
             DB::table('coupon')->insert([
                 'idCoupon' => $i,
                 'idutente' => 3,
                 'idPromozione' => $idPromozione,
                 'codice' => Str::random(6),
             ]);

         }*/

        for ($i = 1; $i <= 6; $i++) {
            DB::table('faq')->insert([
                'idUtente' => 1,
                'titolo' => $faker->sentence,
                'descrizione' => $faker->text,
            ]);
        }
    }

}
