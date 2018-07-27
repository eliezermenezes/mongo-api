<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Endereco extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'endereco';

    protected $fillable = [
        'cep', 'rua', 'numero', 'bairro', 'cidade', 'estado'
    ];
}