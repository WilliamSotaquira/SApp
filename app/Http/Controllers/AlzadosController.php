<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*Otros*/
use Carbon\Carbon;
use Auth;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ProyectosFormRequest;

use Illuminate\Support\Facades\Crypt;
use App\proyectos;
use App\muebles;
use DB;
use Response;
use SebastianBergmann\Environment\Console;


class AlzadosController extends Controller
{

    public function show($id)
    {

        $id = Crypt::decrypt($id);

        $alzados =  DB::table('tbl_alzados')
            ->where('tbl_alzados.idalzados', '=', $id)
            ->first();

        $productos = DB::table('tbl_detalleproductos as dpro')
            ->join('tbl_productos as pro', 'dpro.idproducto', '=', 'pro.idproducto')
            ->join('tbl_marca as mar','pro.idmarca','=','mar.idmarca')
            ->join('tbl_subcategoria as scat', 'pro.idSubcategoria','=', 'scat.idsubcategoria')
            ->join('tbl_categorias as cat','scat.idcategoria','=','cat.idcategoria')
            ->where('dpro.idalzados', '=', $id)
            ->get();

        $muebles = DB::table('tbl_muebles as mue')
            ->join('tbl_alzados as alz', 'mue.idalzados', '=', 'alz.idalzados')
            ->where('alz.idalzados', '=', $id)
            ->get();


        $proyectos = DB::table('tbl_proyectos as pro')
        ->join('tbl_alzados as alz','pro.idProyecto','=','alz.idProyecto')
        ->where('alz.idalzados', '=', $id)
            ->first();

        // dd($productos);


        return view('proyectos.alzados.show', ["alzados" => $alzados, "muebles" => $muebles, "productos"=>$productos,"proyectos"=>$proyectos]);
    }
}
