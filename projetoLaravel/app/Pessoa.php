<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
       
    protected $table = 'pessoa';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'nome',
        'nascimento',
        'genero',
        'pais_id'
    ];
}
