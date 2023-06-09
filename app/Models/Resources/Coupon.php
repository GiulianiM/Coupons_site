<?php

namespace App\Models\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use hasFactory;

    protected $table = 'coupon';
    protected $primaryKey = 'idCoupon';
    public $timestamps = false;

    protected $fillable = [
        'codice',
        'idPromozione',
        'idUtente',
    ];

    public function promozione() {
        return $this->belongsTo(Promozione::class, 'idPromozione');
    }

    public function utente() {
        return $this->belongsTo(User::class, 'idUtente');
    }
}
