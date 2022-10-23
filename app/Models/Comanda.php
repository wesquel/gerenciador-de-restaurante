<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'mesa_id',
        'valor',
        'qntdPessoas',
    ];

    public function mesa(){
        return $this->belongsTo(Mesa::class);
    }

}
