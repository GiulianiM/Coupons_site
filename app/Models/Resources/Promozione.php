<?php

namespace App\Models\Resources;

use App\Models\Azienda;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promozione extends Model
{
    use hasFactory;

    protected $table = 'promozione';

    protected $primaryKey = 'idPromozione';

    protected $fillable = [
        'idAzienda',
        'titolo',
        'descrizione',
        'immagine',
        'modalita',
        'luogo',
        'inizio',
        'fine',
        'sconto',
        'valore_sconto',
    ];

    public function azienda()
    {
        return $this->belongsTo(Azienda::class, 'idAzienda');
    }

    public function coupon()
    {
        return $this->hasMany(Coupon::class, 'idPromozione');
    }
}
