<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Otros*/
use Carbon\Carbon;
use Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\organizacionFormRequest;

use Illuminate\Support\Facades\Crypt;
use App\organizacion;
use DB;
use Response;


class NovedadesController extends Controller
{
    ###################################################################################################################################
    ### 8. 	SHOW : Muestra en detalle los registros       
    ###################################################################################################################################

    public function show($idproyecto)
    {

        $id = Crypt::decrypt($idproyecto);

        $proyectos = DB::table('tbl_proyectos')
            ->where('idproyecto', '=', $id)
            ->first();

        $alzados = DB::table('tbl_alzados')
            ->where('idProyecto', '=', $id)
            ->get();


        $muebles = DB::table('tbl_muebles as mue')
            ->join('tbl_alzados as alz', 'mue.idalzados', '=', 'alz.idalzados')
            ->where('alz.idProyecto', '=', $id)
            ->get();

        $productos = DB::table('tbl_detalleproductos as dpro')
        ->join('tbl_productos as pro', 'dpro.idProducto', '=', 'pro.idproducto')
            ->join('tbl_alzados as alz', 'dpro.idalzados', '=', 'alz.idalzados')
            ->where('alz.idProyecto', '=', $id)
            ->get();

        $eventos =  DB::table('tbl_eventos as eve')
            ->join('tbl_proyectos as pro', 'eve.idProyecto', '=', 'pro.idproyecto')
            ->where('eve.idProyecto', '=', $id)
            ->select('pro.idproyecto', 'pro.nombreProyecto', 'pro.created_at as inicioproyecto', 'eve.tipoEvento', 'eve.descripcion', 'eve.created_at as creacionevento', 'eve.estadoEvento')
            ->get();







        // dd($productos);

        return view('proyectos.novedades.show', ["proyectos" => $proyectos, "alzados" => $alzados, "muebles" => $muebles, "productos" => $productos, "eventos" => $eventos]);
    }
}
