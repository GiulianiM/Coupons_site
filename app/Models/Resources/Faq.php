<?php

namespace App\Models\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{

    protected $table = 'faq';
    protected $primaryKey = 'idFaq';

    protected $fillable = [
        'titolo',
        'descrizione',
    ];

    public function admin() {
        return $this->belongsTo(User::class, 'idUtente');
    }
}
