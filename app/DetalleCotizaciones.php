<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleCotizaciones extends Model
{
	protected $table='detalle_cotizacion';
	protected $primaryKey='iddetalle';
	public $timestamps=true;


	protected $filleble=[


		'iddetalle',
		'idcotizacion',
		'idactividad',
		'descripcion',
		'cantidad',
		'descuento',
		'valor_unidad',
		'valor_total',
		'created_at',
		'updated_at',	

	];
	
	protected $guarded =[

	];
}

