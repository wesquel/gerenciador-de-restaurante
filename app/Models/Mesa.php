<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'numero',
        'lugares',
        'status'
    ];

    public function comanda(){
        return $this->hasOne(Comanda::class);
    }

}
