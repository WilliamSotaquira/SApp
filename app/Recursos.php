<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recursos extends Model
{
	protected $table='recursos';
	protected $primaryKey='idrecurso';
	public $timestamps=true;


	protected $filleble=[

		'idrecurso',
		'recurso',
		'descripcion',
		'tipo_recurso',
		'costo',
		'tipo_cobro',
		'created_at',
		'updated_at',
		'users_id',
		'idpago',

	];
	protected $guarded =[

	];
}









