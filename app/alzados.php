<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alzados extends Model
{


    protected $table = 'tbl_alzados';
    protected $primaryKey = 'idalzados';
    public $timestamps = true;


    protected $filleble = [

        'idalzados',
        'observaciones',
        'created_at',
        'updated_at',
        'idProyecto',

    ];
    protected $guarded = [];

}
