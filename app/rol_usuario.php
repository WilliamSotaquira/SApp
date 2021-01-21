<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rol_usuario extends Model
{
	/*
        El modelo es el encargdo de gestional las tablas de las bases de datos;
    */


        protected $table='role_user';
        protected $primaryKey='id';
        public $timestamps=true;

        protected $filleble=[


          'id',
          'role_id',
          'user_id',
		// 'created_at',
		// 'updated_at',

      ];
      protected $guarded =[

      ];


  }
