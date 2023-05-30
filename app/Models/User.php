<?php

namespace App\Models;

use App\Models\Resources\Coupon;
use App\Models\Resources\Promozione;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use hasFactory;

    protected $table = 'utente';

    protected $primaryKey = 'idUtente';

    protected $fillable = [
        'nome',
        'cognome',
        'genere',
        'eta',
        'telefono',
        'username',
        'password',
        'email',
        'livello',
        'visibile'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function aziende()
    {
        return $this->hasMany(Azienda::class, 'idUtente');
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'idUtente');
    }

    public function promozioni()
    {
        return $this->hasManyThrough(Promozione::class, Coupon::class, 'idUtente', 'idPromozione');
    }

    public function hasLivello($livello)
    {
        return $this->livello === $livello;
    }

    public function hasCoupon(Coupon $coupon)
    {
        return $this->coupons()->where('idCoupon', $coupon->idCoupon)->exists();
    }

}
