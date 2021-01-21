<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// otros

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Crypt;
use App\Actividades;
use App\Http\Requests\ActividadesFormRequest;
use Response;
use DB;

class ActividadesController extends Controller
{

###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{

			$query=trim($request->get('searchText'));

			$actividades=DB::table('actividades as act')
			->select('act.idactividad','act.actividad','act.descripcion','act.referencia','act.created_at', 'act.updated_at')
			->where('act.actividad','LIKE','%'.$query.'%')
			->orwhere('act.descripcion','LIKE','%'.$query.'%')
			->orderBy('act.idactividad','desc')

			->paginate(20);
		}

		// dd($actividades);


		return view ('servicios.actividades.index',["actividades"=>$actividades,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){

		$recursos = DB::table('recursos')->get();

		return view ('servicios.actividades.create',['recursos'=>$recursos]) ;

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		// dd($request);

		$actividades = Actividades::create($request->all());

		return redirect()->route('servicios.actividades.index')->with('success','La creacion de la actividad ha sido completada con éxito');	
	}

###################################################################################################################################
### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente                      
###################################################################################################################################

	public function edit($id)
	{
		$id = Crypt::decrypt($id); 
		// dd($id);

		$actividades=Actividades::findOrFail($id);

		$recursos =  DB::table('recursos as rec')->get();

		// dd($actividades,$recursos);

		return view("servicios.actividades.edit", ["actividades"=>$actividades,"recursos"=>$recursos]); 
	}

###################################################################################################################################
### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
###################################################################################################################################

	public function update(Request $request,$id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id,$request);

		try {

			$actividades=Actividades::findOrFail($id);
			$actividades->referencia=$request->get('referencia');
			$actividades->actividad=$request->get('actividad');
			$actividades->descripcion=$request->get('descripcion');	
			$actividades->idrecurso=$request->get('idrecurso');	
			$actividades->update();

			DB::commit();

			return redirect()->route('servicios.actividades.index')->with('warning','Registro editado con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('servicios.actividades.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$Actividades =Actividades::findOrFail($id);
		$Actividades->delete();

		return redirect()->route('servicios.actividades.index')->with('danger','La actividad ha sido eliminada con exito');

	}
}
