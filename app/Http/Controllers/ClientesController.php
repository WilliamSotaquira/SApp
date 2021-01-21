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
use App\Http\Requests\ClientesFormRequest;

use Illuminate\Support\Facades\Crypt;
use App\cliente;
use DB;
use Response;

class ClientesController extends Controller
{
###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{
			$query=trim($request->get('searchText'));

			$clientes=DB::table('tbl_clientes as per')

			->select('per.id','per.document','per.name','per.email','per.home_address','per.mobile')

			->where('per.document','LIKE','%'.$query.'%')
			->orwhere('per.name','LIKE','%'.$query.'%')
			->orderBy('per.created_at','desc')
			->paginate(20);
		}

		// dd($clientes);


		return view ('clientes.clientes.index',["clientes"=>$clientes,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){

		return view ('clientes.clientes.create') ;

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		// dd($request);

		$clientes = cliente::create($request->all());


		return redirect()->route('clientes.clientes.index')->with('success','El cliente ha sido creado con exito');	



	}

###################################################################################################################################
### 4. 	SHOW : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function show($id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id);

		$consulta=DB::table('tbl_clientes as per') 
		->select('per.id','per.document','per.type_doc','per.name','per.email','per.home_address','per.mobile', 'per.aux_contact','per.score','per.created_at', 'per.updated_at')
		->where('per.id','=',$id) 
		->first(); 
        // dd($consulta);

		return view("clientes.clientes.show", ["consulta"=>$consulta]); 
	}

###################################################################################################################################
### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente                      
###################################################################################################################################

	public function edit($id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id);

		$consulta=DB::table('tbl_clientes as per') 
		->select('per.id','per.document','per.type_doc','per.name','per.email','per.home_address','per.mobile', 'per.aux_contact','per.score','per.created_at', 'per.updated_at')
		->where('per.id','=',$id) 
		->first(); 
        // dd($consulta);

		return view("clientes.clientes.edit", ["consulta"=>$consulta]); 
	}

###################################################################################################################################
### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
###################################################################################################################################

	public function update(Request $request,$id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id,$request);

		try {

			$persona=persona::findOrFail($id);
			$persona->name=$request->get('name');
			$persona->last_name=$request->get('last_name');
			$persona->email=$request->get('email');
			$persona->home_address=$request->get('home_address');
			$persona->mobile=$request->get('mobile');
			$persona->phone=$request->get('phone');
			$persona->type_doc=$request->get('type_doc');
			$persona->document=$request->get('document');
			$persona->score=$request->get('score');
	
			$persona->update();

			DB::commit();

			return redirect()->route('clientes.clientes.index')->with('warning','Persona editada con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('clientes.clientes.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$persona =persona::findOrFail($id);
		$persona->delete();

		return redirect()->route('clientes.clientes.index')->with('danger','Cliente eliminado con exito');

	}
}
