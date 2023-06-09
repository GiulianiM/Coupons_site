<?php

namespace App\Models;

use App\Models\Resources\Promozione;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    use hasFactory;

    protected $table = 'azienda';
    protected $primaryKey = 'idAzienda';
    protected $fillable = [
        'nome',
        'via',
        'citta',
        'cap',
        'numero_civico',
        'logo',
        'ragione_sociale',
        'descrizione',
        'tipologia',
        'idAdmin',
        'idUtente',
        'visibile',
    ];

    protected $attributes = [
        'idUtente' => '1',
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
