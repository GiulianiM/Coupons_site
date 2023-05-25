<?php

namespace App\Models\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use hasFactory;
    protected $table = 'faq';
    protected $primaryKey = 'idFaq';

    protected $fillable = [
        'titolo',
        'descrizione',
        'idUtente'
    ];

    public function admin() {
        return $this->belongsTo(User::class, 'idUtente');
    }
}
