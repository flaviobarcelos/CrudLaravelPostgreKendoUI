<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
       
    protected $table = 'pais';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome'
    ];
}
