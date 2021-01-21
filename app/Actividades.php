<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    
	protected $table='actividades';
	protected $primaryKey='idactividad';
	public $timestamps=true;


	protected $filleble=[

		'idactividad',
		'referencia',
		'actividad',
		'descripcion',
		// 'created_at',
		// 'updated_at',
		'idrecurso',

	];
	protected $guarded =[

	];
}
