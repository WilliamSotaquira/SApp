<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\Http\Requests; 
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Http\Requests\UserFormRequest;
use Response;

use DB;

class UserController extends Controller
{

    public function index(Request $request)
    {

        if ($request) {

            $query=trim($request->get('searchText'));

            $users=DB::table('users as u')

            ->where('u.document','LIKE','%'.$query.'%')
            ->orwhere('u.name','LIKE','%'.$query.'%')
            ->orwhere('u.last_name','LIKE','%'.$query.'%')

            ->select('u.id','u.name','u.last_name','u.email','u.document','u.created_at')
            ->orderBy('u.id','desc')

            ->paginate(20);

        }

        return view ('seguridad.users.index',["users"=>$users,"searchText"=>$query]);

    }

    public function show($id)
    {
        //dd($id);
        $users=DB::table('users as u') 
        
        ->select('u.id','u.name','u.last_name','u.email','u.mobile','u.type_doc','u.document','u.direction','u.score','u.created_at','u.updated_at')
        ->where('u.id','=',$id) 
        ->first(); 
        //dd($users);

        return view('seguridad.users.show', ["users"=>$users]); 
    }

    public function create()
    {
        return view ('seguridad.users.create');
    }

    
    public function store(Request $request)
    {

        $password = $request->password;
        $cedula =  $request->document;

        if ($pasword =! null) {

         $users = User::create($request->all());

         $password = Hash::make($users['password']);
         $users->password= $password;
         $users->update();         

     }

     return redirect()->route('seguridad.users.index')->with('success','Usuario guardado con exito');
 }


 public function edit($id)
 {
          //dd($id);
    $users=DB::table('users as u') 

    ->select('u.id','u.name','u.last_name','u.email','u.celular','u.type_doc','u.document','u.password','u.direccion','u.score','u.created_at','u.updated_at')
    ->where('u.id','=',$id) 
    ->first(); 
        //dd($users);

    return view('seguridad.users.edit', ["users"=>$users]); 
}


public function update(Request $request, $id)
{
    $password = $request->password;

    if ($password = null) {
        $users=User::findOrFail($id);
        $users->fill($request->all());

        return redirect()->route('seguridad.users.show', ["users"=>$users])->with('warning','Cliente actualizado con exito');

    }
    else
    {
            //dd('hay clave');
        $users=User::findOrFail($id);
        $users->fill($request->all());
        $password = Hash::make($users['password']);
        $users->password= $password;
        $users->update();  

        
        return redirect()->route('seguridad.users.show', ["users"=>$users])->with('warning','Cliente actualizado con exito');

    }
}
public function destroy($id)
{
    // dd($id); 

    $users = User::findOrFail($id);
    $users->email='Usuario Desactivado';
    $users->password='';
    $users->score='';
    $users->update();

    return redirect()->route('seguridad.users.index', ["formorg"=>$users])->with('darger','Cliente desactivado con exito');

}


}
