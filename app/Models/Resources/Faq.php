<?php

namespace App\Models\Resources;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $table = 'faq';
    protected $primaryKey = 'idFaq';
    public $timestamps = false;

    protected $fillable = [
        'titolo',
        'descrizione',
    ];

    public function admin() {
        return $this->belongsTo(User::class, 'idUtente');
    }
}
