<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class muebles extends Model
{
    protected $table = 'tbl_muebles';
    protected $primaryKey = 'idmueble';
    public $timestamps = true;


    protected $filleble = [


        'tipoMueble',
        'estructura',
        'decorativo',
        'panelFondo',
        'panelInferior',
        'ancho',
        'alto',
        'profundo',
        'cantidad',
        'precioUnidad',
        'totalMuebles',
        'idalzados',

    ];

    protected $guarded = [];
}
