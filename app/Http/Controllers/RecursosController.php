<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// otros
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Crypt;
use App\Recursos;
use App\Http\Requests\RecursosFormRequest;
use Response;
use DB;


class RecursosController extends Controller
{

###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{
			$query=trim($request->get('searchText'));

			$recursos=DB::table('recursos as rec')

			->select('rec.idrecurso','rec.recurso','rec.descripcion','rec.tipo_recurso','rec.costo','rec.tipo_cobro')

			->where('rec.recurso','LIKE','%'.$query.'%')
			->orwhere('rec.descripcion','LIKE','%'.$query.'%')
			->orderBy('rec.idrecurso','desc')
			->paginate(20);
		}

		// dd($recursos);


		return view ('servicios.recursos.index',["recursos"=>$recursos,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){

		$usuario =  DB::table('users as user')->get();
		$pago =  DB::table('pagos as pago')->get();

		// dd($pago,$usuario);
		return view ('servicios.recursos.create',['pago'=>$pago, 'usuario'=>$usuario]);

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		// dd($request);

		$Recursos = Recursos::create($request->all());


		return redirect()->route('servicios.recursos.index')->with('success','El Recurso ha sido creado con exito');	



	}

###################################################################################################################################
### 4. 	SHOW : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function show($id)
	{
		$id = Crypt::decrypt($id);
		$mensaje = "Sin información";

		$consulta=DB::table('Recursos as rec') 
		->select('rec.idrecurso','rec.recurso','rec.descripcion','rec.tipo_recurso','rec.costo','rec.tipo_cobro','rec.created_at','rec.updated_at','rec.users_id','rec.idpago')
		->where('rec.idrecurso','=', $id)
		->first();

		$usuario=DB::table('users as user')
		->join('Recursos as rec','user.id','=','rec.users_id')
		->select('user.id','user.name','user.last_name','user.document')
		->where('rec.idrecurso','=',$id)
		->first();

		$pago=DB::table('pagos as pago')
		->join('Recursos as rec','pago.idpago','=','rec.idpago')
		->select('pago.idpago','pago.valor','pago.tipo_pago','pago.descripcion_pago')
		->where('rec.idrecurso','=',$id)
		->first();


	// dd($consulta,$usuario,$pago);

		return view("servicios.recursos.show", ["consulta"=>$consulta,"usuario"=>$usuario,"pago"=>$pago]); 
	}

###################################################################################################################################
### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente          ho            
###################################################################################################################################

	public function edit($id)
	{
		$id = Crypt::decrypt($id);
		$mensaje = "Sin información";

		$consulta=DB::table('Recursos as rec') 
		->select('rec.idrecurso','rec.recurso','rec.descripcion','rec.tipo_recurso','rec.costo','rec.tipo_cobro','rec.created_at','rec.updated_at','rec.users_id','rec.idpago')
		->where('rec.idrecurso','=', $id)
		->first();

		$usuario=DB::table('users as user')
		->join('Recursos as rec','user.id','=','rec.users_id')
		->select('user.id','user.name','user.last_name','user.document')
		->where('rec.idrecurso','=',$id)
		->first();

		$pago=DB::table('pagos as pago')
		->join('Recursos as rec','pago.idpago','=','rec.idpago')
		->select('pago.idpago','pago.valor','pago.tipo_pago','pago.descripcion_pago')
		->where('rec.idrecurso','=',$id)
		->first();

		$usuario_all=DB::table('users')->get();

		$pago_all=DB::table('pagos')->get();



		// dd($consulta,$usuario,$pago);

		return view("servicios.recursos.edit", ["consulta"=>$consulta,"usuario"=>$usuario,"pago"=>$pago,"usuario_all"=>$usuario_all,"pago_all"=>$pago_all]); 
	}

###################################################################################################################################
### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
###################################################################################################################################

	public function update(Request $request,$id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id,$request);

		try {

			$recurso =Recursos::findOrFail($id);

			$recurso->recurso =$request->get('recurso');
			$recurso->descripcion =$request->get('descripcion');
			$recurso->tipo_recurso =$request->get('tipo_recurso');
			$recurso->costo =$request->get('costo');
			$recurso->tipo_cobro =$request->get('tipo_cobro');
			$recurso->users_id =$request->get('users_id');
			$recurso->idpago =$request->get('idpago');

			$recurso->update();

			DB::commit();

			return redirect()->route('servicios.recursos.index')->with('warning','Recurso actualizado con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('servicios.recursos.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$Recursos =Recursos::findOrFail($id);
		$Recursos->delete();

		return redirect()->route('servicios.recursos.index')->with('danger','Recurso eliminado con exito');

	}

}
