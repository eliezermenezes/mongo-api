<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Empresa extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'empresa';

    protected $fillable = [
        'cnpj', 'nome', 'telefone', 'endereco'
    ];
}