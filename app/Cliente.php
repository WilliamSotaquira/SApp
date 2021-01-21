<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
	protected $table='tbl_clientes';
	protected $primaryKey='id';
	public $timestamps=true;


	protected $filleble=[

		'id',
		'type_user',
		'name',
		'email',
		'home_address',
		'city',
		'mobile',
		'aux_contact',
		'type_doc',
		'document',
		'score',
		'remember_token',
		'created_at',
		'updated_at',



	];
	protected $guarded =[

	];
}
