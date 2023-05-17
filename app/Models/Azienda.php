<?php

namespace App\Models;

use App\Models\Resources\Promozione;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{

    protected $table = 'azienda';

    protected $fillable = [
        'nome',
        'via',
        'citta',
        'cap',
        'logo',
        'ragioneSociale',
        'descrizione',
        'tipologia',
        'idAdmin',
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'idUtente');
    }

    public function promozioni()
    {
        return $this->hasMany(Promozione::class, 'idAzienda');
    }
}
