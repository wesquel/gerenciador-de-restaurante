<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosComanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'comanda_id',
        'quantidade',
        'produto_id',
    ];

    public function mesa(){
        return $this->belongsTo(Comanda::class);
    }

    public function produtos(){
        return $this->hasMany(Produtos::class);
    }

}
