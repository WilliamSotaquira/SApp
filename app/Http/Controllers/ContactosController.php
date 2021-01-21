<?php

namespace App\Http\Controllers;

use App\Http\Requests\contactoFormRequest;
use App\Http\Requests\organizacionFormRequest;
use App\Http\Requests\personaFormRequest;
use App\Mail\welcome;
use App\contacto;
use App\organizacion;
use App\persona;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Response;
use Session;

class ContactosController extends Controller
{

###################################################################################################################################
### 1. 	INDEX : Esta es la funcion con la cual se cargan los datos de las organizaciones en la vista index                         
###################################################################################################################################

	public function index(Request $request){

		if ($request)
		{
			$query=trim($request->get('searchText'));

			$contactos=DB::table('contactos as cont')
			->join('organizaciones as org','cont.idorganizacion','=','org.idorganizacion')
			->join('clientes as cli','cont.clientes_id','=','cli.id')

			->select('cont.idcontacto','cli.id','cli.document','cli.name','cli.last_name','cont.clientes_id','org.idorganizacion','organizacion','org.nit','cont.observaciones','cont.created_at', 'cont.updated_at')

			->where('cli.document','LIKE','%'.$query.'%')
			->orwhere('org.nit','LIKE','%'.$query.'%')
			->orderBy('cont.idcontacto','desc')
			->paginate(20);
		}

		// dd($contactos);


		return view ('clientes.contactos.index',["contactos"=>$contactos,"searchText"=>$query]) ;
	}

###################################################################################################################################
### 2. 	CREATE : Esta es la funcion que se encarga redirigir a la vista de creacion de registro                       
###################################################################################################################################

	public function create(){

		$organizaciones =  DB::table('organizaciones as org')->select('org.idorganizacion', 'org.organizacion', 'org.nit')->get();
		$personas = DB::table('clientes as cli')->select('cli.id','cli.name','cli.last_name','cli.document')->get(); 

		// dd($organizaciones,$personas);

		return view ('clientes.contactos.create',["organizaciones"=>$organizaciones,"personas"=>$personas]) ;

	}

###################################################################################################################################
### 3. 	STORE : Esta es la funcion que se encarga de procesar y almacenar registros nuevos                        
###################################################################################################################################

	public function store(Request $request){

		// dd($request);

		$contacto = contacto::create($request->all());

		return redirect()->route('clientes.contactos.index')->with('success','La asignación de persona a organización ha sido completada con éxito');	
	}

###################################################################################################################################
### 5. 	EDIT : Realiza la consulta de los datos solicitados por el cliente                      
###################################################################################################################################

	public function edit($id)
	{
		$id = Crypt::decrypt($id); 
		// dd($id);

		$contactos=contacto::findOrFail($id);
		// dd($contactos);

		$organizaciones =  DB::table('organizaciones as org')->select('org.idorganizacion', 'org.organizacion', 'org.nit')->get();
		$personas = DB::table('clientes as cli')->select('cli.id','cli.name','cli.last_name','cli.document')->get();

		return view("clientes.contactos.edit", ["contactos"=>$contactos,"organizaciones"=>$organizaciones,"personas"=>$personas]); 
	}

###################################################################################################################################
### 6. 	UPDATE : Se encarga de almacenar los datos modificados por el usuario en la base de datos                    
###################################################################################################################################

	public function update(Request $request,$id)
	{
		$id = Crypt::decrypt($id); 
        // dd($id,$request);

		try {

			$contacto=contacto::findOrFail($id);
			$contacto->idorganizacion=$request->get('idorganizacion');
			$contacto->clientes_id=$request->get('clientes_id');
			$contacto->observaciones=$request->get('observaciones');	
			$contacto->update();

			DB::commit();

			return redirect()->route('clientes.contactos.index')->with('warning','Contacto editado con éxito');

		} catch (Exception $e) {

			DB::rollback();

			return redirect()->route('clientes.contactos.index')->with('warning','Falla en el proceso de actualizacion Error excepcion: '.$e);

		}
	}

###################################################################################################################################
### 7. 	DELETE : Se encarga de eliminar el registro correspondiente                  
###################################################################################################################################

	public function destroy($id)
	{
		$contacto =contacto::findOrFail($id);
		$contacto->delete();

		return redirect()->route('clientes.contacto.index')->with('danger','Asignacion eliminada con exito');

	}

###################################################################################################################################
### 7. 	Consulta : Se encarga de enviar correo al administrador con informacion de contacto.                  
###################################################################################################################################

	public function consulta(Request $request)
	{
		try {

			// dd($request);


			$nombres=$request->get('nombres');
			$apellidos=$request->get('apellidos');
			$email=$request->get('email');
			$celular=$request->get('celular');
			$tipo_consulta=$request->get('tipo_consulta');	
			$descripcion=$request->get('descripcion');
			$conforme = $request->get('conforme');

			switch ($tipo_consulta) 
			{
				case '1':
				$tipo_consulta='Diseño y desarrollo responsivo';
				break;
				case '2':
				$tipo_consulta='Desarrollo de software';
				break;
				case '3':
				$tipo_consulta='Mantenimiento WEB';
				break;
				case '4':
				$tipo_consulta='Servicio técnico';
				break;
				case '5':
				$tipo_consulta='Soporte técnico';
				break;
				case '6':
				$tipo_consulta='Diseño gráfico';
				break;
				case '7':
				$tipo_consulta='Otra consulta';
				break;
				default:
				$tipo_consulta='Sin información';
				break;
			}	

			switch ($conforme) {
				case 'on':
				$conforme='Manejo de datos aceptado por el usuario';
				break;

				default:
				$conforme = 'Error en la aceptación, rechazo de consulta';
				break;
			}


			$data = array(

				'nombres' => $nombres, 
				'apellidos' => $apellidos, 
				'email' => $email, 
				'celular' => $celular, 
				'tipo_consulta'=>$tipo_consulta,
				'descripcion' => $descripcion, 
				'conforme'=>$conforme,

			);

			// return new welcome($data);

			Mail::to('weirdoware.sapp@gmail.com')->send(new welcome($data));


			return redirect('/')->with('success','Sus datos han sido enviados con éxito, pronto nos pondremos en contacto con usted. Gracias!!!');

			
		} catch (Exception $e) {
			
			return redirect('');
		}
		
	}
}


