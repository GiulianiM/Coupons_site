<?php

namespace App\Models;

use App\Models\Resources\Promozione;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $attributes = [];
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
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $adminId = $this->getDefaultAdminId();

        $this->attributes['idUtente'] = $adminId;
    }

    private function getDefaultAdminId()
    {
        $admin = User::where('livello', 'admin')->first();

        return $admin ? $admin->idUtente : null;
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'idUtente');
    }

    public function promozioni()
    {
        return $this->hasMany(Promozione::class, 'idAzienda');
    }
}
