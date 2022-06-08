<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;
    protected $table = 'enderecos';
    protected $fillable = [
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'cidade_ibge'
    ];

    public function cidade()
    {
        return $this->belongsTo(Cidade::class);
        //return $this->hasOne(Proprietario::class, 'id', 'proprietario_id');
    }
}
