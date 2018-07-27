<?php

namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AreaConhecimento extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'area';

    protected $fillable = [
        'descricao'
    ];
}