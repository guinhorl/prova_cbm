<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;
    protected $table = 'cidades';
    protected $primaryKey = 'ibge';
    protected $fillable = [
        'ibge',
        'nome',
        'estado_cod'
    ];

    public function estado()
    {
        return $this->hasOne(Estado::class, 'estado_cod','estado_cod');
    }
}
