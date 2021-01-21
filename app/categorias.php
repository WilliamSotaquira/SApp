<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categorias extends Model
{
    protected $table = 'tbl_categorias';
    protected $primaryKey = 'idcategoria';
    public $timestamps = true;


    protected $filleble = [

        'idcategoria',
        'categoria',
        'created_at',
        'updated_at',

    ];
    protected $guarded = [];
}
