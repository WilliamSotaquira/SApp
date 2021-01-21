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
use App\Http\Requests\CotizacionesFormRequest;
use App\Http\Requests\DetalleCotizacionesFormRequest;
use App\Http\Requests\ClientesFormRequest;
use Response;
use DB;


class CotizacionesController extends Controller
{

###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{
			$query=trim($request->get('searchText'));

			$cotizaciones=DB::table('tbl_cotizaciones as cot')
			->join('tbl_clientes as cli', 'cot.idClientes','=','cli.id')
			->join('users as us', 'cot.idUser','=','us.id')
			->select('cot.idcotizacion','cot.estadoCotizacion','cot.observaciones','cli.type_user','cli.name as nameCli','cli.type_user','cli.city', 'cli.document', 'us.name as nameUs','us.last_name as lastnUs'  )
			->where('cli.name','LIKE','%'.$query.'%')
			->orwhere('cli.document','LIKE','%'.$query.'%')
			->paginate(20);
		}

		// dd($cotizaciones);
 

		return view ('comercial.cotizaciones.index',["cotizaciones"=>$cotizaciones,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){
		

		$clientes = DB::table('tbl_clientes')->get();
		$usuarios =  DB::table('users')->get();

		// dd($clientes);

		return view ('comercial.cotizaciones.create',['clientes'=>$clientes, 'usuarios' => $usuarios]) ;

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		dd($request);

		try {

			DB::beginTransaction();

			$cotizacion = new Cotizaciones;
			$cotizacion->observaciones = $request->get('Robservaciones');
			$cotizacion->idClientes = $request->get('ridClientes');
			$cotizacion->idUser = $request->get('RidUser');
			$cotizacion->estadoCotizacion = 1;
			$cotizacion->save();

			// if ($request) {

			// 	$detalles_osts = new detalle_ost;
			// 	$detalles_osts->contacto_ost = $request->get('contacto_ost');
			// 	$detalles_osts->tipo_doc = $request->get('tipo_doc');
			// 	$detalles_osts->numero_doc = $request->get('numero_doc');
			// 	$detalles_osts->direccion_ost = $request->get('direccion_ost');
			// 	$detalles_osts->celular_ost = $request->get('celular_ost');
			// 	$detalles_osts->telefono_ost = $request->get('telefono_ost');
			// 	$detalles_osts->email_ost = $request->get('email_ost');
			// 	$detalles_osts->nro_factura = $request->get('nro_factura');
			// 	$detalles_osts->estado_garantia = $request->get('estado_garantia');
			// 	$detalles_osts->nro_serie = $request->get('nro_serie');
			// 	$detalles_osts->falla = $request->get('falla');
			// 	$detalles_osts->ost_id = $osts->idost;
			// 	$detalles_osts->municipio_id = $request->get('municipio_id');
			// 	$detalles_osts->save();


			// 	$idproductos = $request->get('producto_id');
			// 	$referencia = $request->get('referencia');
			// 	$categoria = $request->get('categoria');
			// 	$marca = $request->get('marca');

			// 	// dd($detalles_osts->iddetalleost);

			// 	$cant = 0;
			// 	while ($cant < count($idproductos)) {

			// 		$productos  = new do_productos;
			// 		// dd($productos);
			// 		$productos->detalleost_id = $detalles_osts->iddetalleost;
			// 		$productos->producto_id = $idproductos[$cant];
			// 		$productos->save();

			// 		$cant++;
			// 	}

			// 	DB::commit();


			// 	$user = Auth::user()->id;
			// 	$evento = new evento();
			// 	$evento->tipo_evento = 'Se ha creado OST';
			// 	$evento->descripcion = "user:" . $user . " osts" . $osts . "detalles_osts" . $detalles_osts;
			// 	$evento->estado = 1;
			// 	$evento->save();
			// }

			return redirect()->route('servicios.osts.index')->with('success', 'Servicio creado con exito');
		} catch (Exception $e) {

			DB::rollback();
			return redirect()->route('servicios.osts.index')->with('warning', 'No se ha creado el servicio');
		}
















		$Cotizacion = Cotizaciones::create($request->all());

		return redirect()->route('comercial.cotizaciones.index')->with('success','La creacion de la actividad ha sido completada con éxito');	
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

		return view("comercial.cotizaciones.edit", ["actividades"=>$actividades,"recursos"=>$recursos]); 
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

			return redirect()->route('comercial.cotizaciones.index')->with('warning','Registro editado con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('comercial.cotizaciones.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$Actividades =Actividades::findOrFail($id);
		$Actividades->delete();

		return redirect()->route('comercial.cotizaciones.index')->with('danger','La actividad ha sido eliminada con exito');

	}

	###################################################################################################################################
	### 8. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
	###################################################################################################################################

	public function createCliente()
	{

		return view('comercial.cotizaciones.createCliente');
	}

	###################################################################################################################################
	### 9. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
	###################################################################################################################################

	public function storeCliente(Request $request)
	{

		// dd($request);

		$clientes = cliente::create($request->all());


		return redirect()->route('comercial.cotizaciones.create')->with('success', 'El cliente ha sido creado con éxito');	



}
}


