<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    const DESCPROD = 'Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est. Sed lacus. Donec lectus. Nullam pretium nibh ut turpis. Nam bibendum. In nulla tortor, elementum vel, tempor at, varius non, purus. Mauris vitae nisl nec metus placerat consectetuer. Donec ipsum. Proin imperdiet est. Phasellus dapibus semper urna. Pellentesque ornare, orci in consectetuer hendrerit, urna elit eleifend nunc, ut consectetuer nisl felis ac diam. Etiam non felis. Donec ut ante. In id eros. Suspendisse lacus turpis, cursus egestas at sem. Phasellus pellentesque. Mauris quam enim, molestie in, rhoncus ut, lobortis a, est.';

    public function run()
    {
        for ($i = 1; $i <= 2; $i++) {
            DB::table('utente')->insert([
                'nome' => ($i == 1) ? 'admin' : 'user',
                'cognome' => ($i == 1) ? 'admin' : 'user',
                'genere' => 1,
                'eta' => 22,
                'email' => Str::random(6) . '@gmail.com',
                'telefono' => '1234567890',
                'username' => ($i == 1) ? 'admin' : 'user',
                'password' => ($i == 1) ? Hash::make('admin') : Hash::make('user'),
                'livello' => ($i == 1) ? 'admin' : 'user',
            ]);
        }

        DB::table('utente')->insert([
            'nome' => 'staff',
            'cognome' => 'staff',
            'genere' => 1,
            'eta' => 22,
            'email' => Str::random(6) . '@gmail.com',
            'telefono' => '1234567890',
            'username' => 'staff',
            'password' => Hash::make('staff') ,
            'livello' => 'staff',
        ]);

        for ($i = 1; $i <= 12; $i++) {
            DB::table('azienda')->insert([
                'idUtente' => 1,
                'nome' => Str::random(10),
                'via' => Str::random(10),
                'citta' => Str::random(10),
                'cap' => '12345',
                'logo' => 'company.png',
                'ragioneSociale' => Str::random(10),
                'descrizione' => self::DESCPROD,
                'tipologia' => Str::random(10),
            ]);

            $idAzienda = DB::getPdo()->lastInsertId();

            for ($j = 1; $j <= 8; $j++) {
                DB::table('promozione')->insert([
                    'idAzienda' => $idAzienda,
                    'titolo' => Str::random(10),
                    'descrizione' => self::DESCPROD,
                    'immagine' => 'promozione.png',
                    'modalita' => 'modalita',
                    'luogo' => 'luogo',
                    'inizio' => '2023-05-15',
                    'fine' => '2023-06-15',
                    'sconto' => '10',
                ]);
            }

            $idPromozione = DB::getPdo()->lastInsertId();
            DB::table('coupon')->insert([
                'idCoupon' => $i,
                'idutente' => 2,
                'idPromozione' => $idPromozione,
                'codice' => Str::random(6),
            ]);

        }

        for ($i = 1; $i <= 6; $i++) {
            DB::table('faq')->insert([
                'idUtente' => 1,
                'titolo' => Str::random(10),
                'descrizione' => self::DESCPROD,
            ]);
        }
    }

}
