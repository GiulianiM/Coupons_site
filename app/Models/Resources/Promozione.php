<?php

namespace App\Models\Resources;

use App\Models\Azienda;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{

    protected $table = 'promozione';

    protected $fillable = [
        'descrizione',
        'immagine',
        'titolo',
        'modalita',
        'luogo',
        'inizio',
        'fine',
        'sconto',
        'idAzienda',
    ];

    public function azienda()
    {
        return $this->belongsTo(Azienda::class, 'idAzienda');
    }

    public function gestionePromozione()
    {
        return $this->belongsToMany(User::class, 'gestione_promozione', 'idPromozione', 'idUtente');
    }
}
