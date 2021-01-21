<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizaciones extends Model
{
	protected $table = 'tbl_cotizaciones';
	protected $primaryKey = 'idcotizacion';
	public $timestamps = true;


	protected $filleble = [


		'idcotizacion',
		'subtotal',
		'descuento',
		'impuestoCotizacion',
		'totalCotizacion',
		'observaciones',
		'estadoCotizacion',
		'created_at',
		'updated_at',
		'idClientes',
		'idUser',

	];

	protected $guarded = [];
}
