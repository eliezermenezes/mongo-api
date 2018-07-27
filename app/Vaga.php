<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Vaga extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'vaga';

    protected $fillable = [
        'funcao', 'salario', 'descricao', 'empresa', 'area'
    ];
}