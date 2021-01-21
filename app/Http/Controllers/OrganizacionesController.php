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

class OrganizacionesController extends Controller
{
    

###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{
			$query=trim($request->get('searchText'));

			$org=DB::table('organizaciones as org')

			->select('org.idorganizacion','org.nit','org.direccion','org.organizacion','org.telefono_uno','org.telefono_dos','org.conmutador','org.email')

			->where('org.nit','LIKE','%'.$query.'%')
			->orwhere('org.organizacion','LIKE','%'.$query.'%')
			->orderBy('org.created_at','desc')
			->paginate(20);
		}

		// dd($org);


		return view ('clientes.organizaciones.index',["org"=>$org,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){

		return view ('clientes.organizaciones.create') ;

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		// dd($request);

		$organizacion = organizacion::create($request->all());


		return redirect()->route('clientes.organizaciones.index')->with('success','Organizacion creada con exito');	



	}

###################################################################################################################################
### 4. 	SHOW : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function show($id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id);

		$consulta=DB::table('organizaciones as org') 
		->select('org.idorganizacion','org.nit','org.direccion','org.organizacion','org.telefono_uno','org.telefono_dos','org.conmutador','org.email','org.created_at', 'org.updated_at')
		->where('org.idorganizacion','=',$id) 
		->first(); 
        // dd($consulta);

		return view("clientes.organizaciones.show", ["consulta"=>$consulta]); 
	}

###################################################################################################################################
### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente                      
###################################################################################################################################

	public function edit($id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id);

		$consulta=DB::table('organizaciones as org') 
		->select('org.idorganizacion','org.nit','org.direccion','org.organizacion','org.telefono_uno','org.telefono_dos','org.conmutador','org.email','org.created_at', 'org.updated_at')
		->where('org.idorganizacion','=',$id) 
		->first(); 
        // dd($consulta);

		return view("clientes.organizaciones.edit", ["consulta"=>$consulta]); 
	}

###################################################################################################################################
### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
###################################################################################################################################

	public function update(Request $request,$id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id,$request);

		try {

			$organizacion=organizacion::findOrFail($id);
			$organizacion->organizacion=$request->get('organizacion');
			$organizacion->nit=$request->get('nit');
			$organizacion->direccion=$request->get('direccion');
			$organizacion->telefono_uno=$request->get('telefono_uno');
			$organizacion->telefono_dos=$request->get('telefono_dos');
			$organizacion->conmutador=$request->get('coonmutador');
			$organizacion->email=$request->get('email');
			$organizacion->update();

			DB::commit();

			return redirect()->route('clientes.organizaciones.index')->with('warning','Organizacion editada con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('clientes.organizaciones.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$organizacion =organizacion::findOrFail($id);
		$organizacion->delete();

		return redirect()->route('clientes.organizaciones.index')->with('danger','Cliente eliminado con exito');

	}
}
