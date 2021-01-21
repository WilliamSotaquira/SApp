<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// otros

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Crypt;
use App\Cotizaciones;
use App\cliente;
use App\alzados;
use App\proyectos;
use App\Http\Requests\CotizacionesFormRequest;
use App\Http\Requests\DetalleCotizacionesFormRequest;
use App\Http\Requests\ClientesFormRequest;
use Response;
use DB;

class ApiController extends Controller
{
    public function storeProyecto(request $request)
    {

        // $cotizaciones  =  new Cotizaciones();
        // $cotizaciones->observaciones = $request->observaciones;
        // $cotizaciones->idClientes = $request->idClientes;
        // $cotizaciones->idUser = $request->idUser;
        // // $cotizaciones->save();
        
        $cotizaciones= $request->observaciones;

        return $cotizaciones;
    }
}
