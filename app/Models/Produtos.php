<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'valor',
    ];

    public function comanda(){
        return $this->belongsTo(Comanda::class);
    }

}
