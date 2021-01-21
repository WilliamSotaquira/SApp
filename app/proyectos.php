<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyectos extends Model
{

    protected $table = 'tbl_proyectos';
    protected $primaryKey = 'idproyecto';
    public $timestamps = true;


    protected $filleble = [

        'idproyecto',
        'tipoProyecto',
        'nombreProyecto',
        'direccion',
        'telContacto',
        'ciudad',
        'estadoProyecto',
        'fechaPlano',
        'fechaRectificacion',
        'fechaEntrada',
        'fechaCierre',
        'created_at',
        'updated_at',
        'idcotizacion',

    ];
    protected $guarded = [];

}