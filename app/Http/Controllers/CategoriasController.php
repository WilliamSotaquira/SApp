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
use App\Http\Requests\CategoriasFormRequest;

use Illuminate\Support\Facades\Crypt;
use App\categorias;
use DB;
use Response;


class CategoriasController extends Controller
{
    
    ###################################################################################################################################
    ### 1. 	INDEX : Esta es la función con la cual se cargan los datos de las organizaciones en la vista index                         
    ###################################################################################################################################

    public function index(Request $request)
    {
        
        if ($request) 
        {
            $query = trim($request->get('searchText'));

            $categorias = DB::table('tbl_categorias')
            ->paginate(20);
        }

        return view('productos.categorias.index', ["categorias" => $categorias, "searchText" => $query]);
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

    public function destroy ($idcategoria)
    {
        dd($idcategoria);
        $categoria= categorias::findOrFail($idcategoria);
        $categoria->delete();

        return redirect()->route('productos.categorias.index')->with('danger', 'La actividad ha sido eliminada con éxito');
    }
}
