<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class organizacion extends Model
{

	protected $table='organizaciones';
    protected $primaryKey='idorganizacion';
    public $timestamps=true;


    protected $filleble=[
      
	'organizacion',
	'nit',
	'direccion',
	'telefono_uno',
	'telefono_dos',
	'conmutador',
    'email',
    'created_at',
    'updated_at',



    ];
    protected $guarded =[
    	
    ];
					
    
}


