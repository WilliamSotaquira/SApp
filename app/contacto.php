<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contacto extends Model
{

	protected $table='contactos';
	protected $primaryKey='idcontacto';
	public $timestamps=true;


	protected $filleble=[

		'idcontacto',
		'idorganizacion',
		'clientes_id',
		'observaciones',
		'created_at',
		'updated_at',

	];
	protected $guarded =[

	];
}

