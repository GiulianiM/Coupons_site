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
                'nome' => Str::random(10),
                'cognome' => Str::random(10),
                'genere' => 1,
                'eta' => 20,
                'email' => Str::random(10) . '@gmail.com',
                'telefono' => '1234567890',
                'username' => Str::random(10),
                'password' => Hash::make('password'),
                'livello' => ($i == 1) ? 'staff' : 'user',
            ]);
        }

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
