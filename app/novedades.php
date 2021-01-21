<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class novedades extends Model
{
    protected $table = 'tbl_eventos';
    protected $primaryKey = 'ideventos';
    public $timestamps = true;


    protected $filleble = [

        'ideventos',
        'tipoEvento',
        'descripcion',
        'estadoEvento',
        'created_at',
        'updated_at',
        'idProyecto',

    ];

    protected $guarded = [];
}
