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

class ProyectosController extends Controller
{

    ###################################################################################################################################
    ### 1. 	INDEX : Esta es la función con la cual se cargan los datos de las organizaciones en la vista index                         
    ###################################################################################################################################

    public function index(Request $request)
    {

        if ($request) {

            $query = trim($request->get('searchText'));

            $proyectos = DB::table('tbl_proyectos as pro')
                ->where('pro.nombreProyecto', 'LIKE', '%' . $query . '%')
                ->paginate(20);
        }
        // dd($proyectos);

        return view('proyectos.proyectos.index', ["proyectos" => $proyectos, "searchText" => $query]);
    }

    ###################################################################################################################################
    ### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
    ###################################################################################################################################

    public function create()
    {

        return view('productos.categorias.create');
    }


    ###################################################################################################################################
    ### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
    ###################################################################################################################################

    public function store(Request $request)
    {

        // dd($request);

        $categorias = categorias::create($request->all());

        return redirect()->route('productos.categorias.index')->with('success', 'La creación de la actividad ha sido completada con éxito');
    }

    ###################################################################################################################################
    ### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente                      
    ###################################################################################################################################

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        // dd($id);

        $categorias = categorias::findOrFail($id);

        // dd($categorias);

        return view("productos.categorias.edit", ["categorias" => $categorias]);
    }

    ###################################################################################################################################
    ### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
    ###################################################################################################################################

    public function update(Request $request, $idcategoria)
    {
        $id = Crypt::decrypt($idcategoria);
        // dd($id,$request);

        try {

            $categorias = categorias::findOrFail($id);
            $categorias->categoria = $request->get('categoria');
            $categorias->update();

            DB::commit();

            return redirect()->route('productos.categorias.index')->with('warning', 'Registro editado con éxito');
        } catch (Exception $e) {

            DB::rollback();

            return redirect()->route('productos.categorias.index')->with('warning', 'Falla en el proceso de actualización Error excepción: ' . $e);
        }
    }

    ###################################################################################################################################
    ### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
    ###################################################################################################################################

    public function destroy($idcategoria)
    {
        dd($idcategoria);
        $categoria = categorias::findOrFail($idcategoria);
        $categoria->delete();

        return redirect()->route('productos.categorias.index')->with('danger', 'La actividad ha sido eliminada con éxito');
    }

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
            ->select('pro.idproyecto', 'pro.nombreProyecto', 'pro.created_at as inicioproyecto', 'eve.tipoEvento', 'eve.descripcion', 'eve.created_at as creacionevento')
            ->get();

        // dd($productos);




        // dd($id, $productos);

        return view('proyectos.proyectos.show', ["proyectos" => $proyectos, "alzados" => $alzados, "muebles" => $muebles, "productos" => $productos, "eventos"=>$eventos]);
    }
}
