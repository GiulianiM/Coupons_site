<?php

namespace Database\Seeders;

use App\Models\Resources\Coupon;
use App\Models\Resources\Faq;
use App\Models\Resources\Promozione;
use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Azienda;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->admin()->create();
        User::factory()->staff()->create();
        User::factory()->user()->create();

        Faq::factory()->count(6)->create();

        Azienda::factory()->count(18)->create();

        Azienda::all()->each(function ($azienda) {
            $azienda->promozioni()->saveMany(
                Promozione::factory()->count(2)->make()
            );
        });

        Promozione::all()->each(function ($promozione) {
            if($promozione->inizio <= now()) {
                $promozione->coupon()->save(
                    Coupon::factory()->create(['idPromozione' => $promozione->idPromozione])
                );
            }
        });

    }
}
