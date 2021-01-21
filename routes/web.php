<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/welcome', function () {
	return view('welcome');
});

Route::get('/', function () {
	return view('welcome');
});


Auth::routes();


Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

			// Formulario en la pagina de bienvenida
Route::post('clientes/contactos/consulta','ContactosController@consulta')->name('clientes.contactos.consulta');	


Route::get('/products', 'welcome@products')->name('products');
Route::get('/contacto', 'welcome@contacto')->name('contacto');
Route::get('/about', 'welcome@about')->name('about');


Route::middleware(['auth'])->group(function(){

//Rutas de Home

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/mantenimiento', 'HomeController@show')->name('mantenimiento');

	/* ---------------------------------------------------------------------------------------------------------------------------------- */

	// Rutas de Alzados

	// Donde crear - guardar 
	Route::post('proyectos/novedades/store', 'NovedadesController@store')->name('proyectos.novedades.store');

	// Donde visualiza el estado
	Route::get('proyectos/novedades', 'NovedadesController@index')->name('proyectos.novedades.index');

	// Donde ver el formulario de creación
	Route::get('proyectos/novedades/create', 'NovedadesController@create')->name('proyectos.novedades.create');

	// Donde actualizar
	Route::put('proyectos/novedades/{id}', 'NovedadesController@update')->name('proyectos.novedades.update');

	// Donde ver el detalle
	Route::get('proyectos/novedades/{id}/show', 'NovedadesController@show')->name('proyectos.novedades.show');

	// Donde eliminar
	Route::delete('proyectos/novedades/{id}', 'NovedadesController@destroy')->name('proyectos.novedades.destroy');

	// Donde ver el formulario de edición
	Route::get('proyectos/novedades/{id}/edit', 'NovedadesController@edit')->name('proyectos.novedades.edit');
	/* ---------------------------------------------------------------------------------------------------------------------------------- */
	/* ---------------------------------------------------------------------------------------------------------------------------------- */

	// Rutas de Alzados

	// Donde crear - guardar 
	Route::post('proyectos/alzados/store', 'AlzadosController@store')->name('proyectos.alzados.store');

	// Donde visualiza el estado
	Route::get('proyectos/alzados', 'AlzadosController@index')->name('proyectos.alzados.index');

	// Donde ver el formulario de creación
	Route::get('proyectos/alzados/create', 'AlzadosController@create')->name('proyectos.alzados.create');

	// Donde actualizar
	Route::put('proyectos/alzados/{id}', 'AlzadosController@update')->name('proyectos.alzados.update');

	// Donde ver el detalle
	Route::get('proyectos/alzados/{id}/show', 'AlzadosController@show')->name('proyectos.alzados.show');

	// Donde eliminar
	Route::delete('proyectos/alzados/{id}', 'AlzadosController@destroy')->name('proyectos.alzados.destroy');

	// Donde ver el formulario de edición
	Route::get('proyectos/alzados/{id}/edit', 'AlzadosController@edit')->name('proyectos.alzados.edit');
	/* ---------------------------------------------------------------------------------------------------------------------------------- */

	// Rutas de Proyectos

	// Donde crear - guardar 
	Route::post('proyectos/proyectos/store', 'proyectosController@store')->name('proyectos.proyectos.store');

	// Donde visualiza el estado
	Route::get('proyectos/proyectos', 'proyectosController@index')->name('proyectos.proyectos.index');

	// Donde ver el formulario de creación
	Route::get('proyectos/proyectos/create', 'proyectosController@create')->name('proyectos.proyectos.create');

	// Donde actualizar
	Route::put('proyectos/proyectos/{id}', 'proyectosController@update')->name('proyectos.proyectos.update');

	// Donde ver el detalle
	Route::get('proyectos/proyectos/{id}/show', 'proyectosController@show')->name('proyectos.proyectos.show');

	// Donde eliminar
	Route::delete('proyectos/proyectos/{id}', 'proyectosController@destroy')->name('proyectos.proyectos.destroy');

	// Donde ver el formulario de edición
	Route::get('proyectos/proyectos/{id}/edit', 'proyectosController@edit')->name('proyectos.proyectos.edit');

	/* ---------------------------------------------------------------------------------------------------------------------------------- */

	// Rutas de Categorias

	// Donde crear - guardar 
	Route::post('productos/categorias/store', 'categoriasController@store')->name('productos.categorias.store');

	// Donde visualiza el estado
	Route::get('productos/categorias', 'categoriasController@index')->name('productos.categorias.index');

	// Donde ver el formulario de creacion
	Route::get('productos/categorias/create', 'categoriasController@create')->name('productos.categorias.create');

	// Donde actualizar
	Route::put('productos/categorias/{id}', 'categoriasController@update')->name('productos.categorias.update');

	// Donde ver el detalle
	Route::get('productos/categorias/{id}/show', 'categoriasController@show')->name('productos.categorias.show');

	// Donde eliminar
	Route::delete('productos/categorias/{id}', 'categoriasController@destroy')->name('productos.categorias.destroy');

	// Donde ver el formulario de edicion
	Route::get('productos/categorias/{id}/edit', 'categoriasController@edit')->name('productos.categorias.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */
	// Rutas de Productos

	// Donde crear - guardar 
	Route::post('productos/productos/store', 'productosController@store')->name('productos.productos.store');

	// Donde visualiza el estado
	Route::get('productos/productos', 'productosController@index')->name('productos.productos.index');

	// Donde ver el formulario de creacion
	Route::get('productos/productos/create', 'productosController@create')->name('productos.productos.create');

	// Donde actualizar
	Route::put('productos/productos/{id}', 'productosController@update')->name('productos.productos.update');

	// Donde ver el detalle
	Route::get('productos/productos/{id}/show', 'productosController@show')->name('productos.productos.show');

	// Donde eliminar
	Route::delete('productos/productos/{id}', 'productosController@destroy')->name('productos.productos.destroy');

	// Donde ver el formulario de edicion
	Route::get('productos/productos/{id}/edit', 'productosController@edit')->name('productos.productos.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */
// Rutas de Clientes

		// Donde crear - guardar 
	Route::post('clientes/clientes/store','ClientesController@store')->name('clientes.clientes.store');	

		// Donde visualiza el estado
	Route::get('clientes/clientes','ClientesController@index')->name('clientes.clientes.index');

		// Donde ver el formulario de creacion
	Route::get('clientes/clientes/create','ClientesController@create')->name('clientes.clientes.create');

		// Donde actualizar
	Route::put('clientes/clientes/{id}','ClientesController@update')->name('clientes.clientes.update');

		// Donde ver el detalle
	Route::get('clientes/clientes/{id}/show','ClientesController@show')->name('clientes.clientes.show');

		// Donde eliminar
	Route::delete('clientes/clientes/{id}','ClientesController@destroy')->name('clientes.clientes.destroy');

		// Donde ver el formulario de edicion
	Route::get('clientes/clientes/{id}/edit','ClientesController@edit')->name('clientes.clientes.edit');

	/* ---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de actividades

		// Donde crear - guardar 
	Route::post('servicios/actividades/store','ActividadesController@store')->name('servicios.actividades.store');	

		// Donde visualiza el estado
	Route::get('servicios/actividades','ActividadesController@index')->name('servicios.actividades.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/actividades/create','ActividadesController@create')->name('servicios.actividades.create');

		// Donde actualizar
	Route::put('servicios/actividades/{id}','ActividadesController@update')->name('servicios.actividades.update');

		// Donde ver el detalle
	Route::get('servicios/actividades/{id}/show','ActividadesController@show')->name('servicios.actividades.show');

		// Donde eliminar
	Route::delete('servicios/actividades/{id}','ActividadesController@destroy')->name('servicios.actividades.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/actividades/{id}/edit','ActividadesController@edit')->name('servicios.actividades.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de recursos

		// Donde crear - guardar 
	Route::post('servicios/recursos/store','RecursosController@store')->name('servicios.recursos.store');	

		// Donde visualiza el estado
	Route::get('servicios/recursos','RecursosController@index')->name('servicios.recursos.index');

		// Donde ver el formulario de creacion
	Route::get('servicios/recursos/create','RecursosController@create')->name('servicios.recursos.create');

		// Donde actualizar
	Route::put('servicios/recursos/{id}','RecursosController@update')->name('servicios.recursos.update');

		// Donde ver el detalle
	Route::get('servicios/recursos/{id}/show','RecursosController@show')->name('servicios.recursos.show');

		// Donde eliminar
	Route::delete('servicios/recursos/{id}','RecursosController@destroy')->name('servicios.recursos.destroy');

		// Donde ver el formulario de edicion
	Route::get('servicios/recursos/{id}/edit','RecursosController@edit')->name('servicios.recursos.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */






	/* ---------------------------------------------------------------------------------------------------------------------------------- */


// Rutas de cotizaciones

		// Donde crear - guardar 
	Route::post('comercial/cotizaciones/store','CotizacionesController@store')->name('comercial.cotizaciones.store');	

		// Donde crear - guardar Cliente
	Route::post('comercial/cotizaciones/storeCliente','CotizacionesController@storeCliente')->name('comercial.cotizaciones.storeCliente');	

		// Donde visualiza el estado
	Route::get('comercial/cotizaciones','CotizacionesController@index')->name('comercial.cotizaciones.index');

		// Donde ver el formulario de creacion
	Route::get('comercial/cotizaciones/create','CotizacionesController@create')->name('comercial.cotizaciones.create');

	// Donde ver el formulario de creacion
	Route::get('comercial/cotizaciones/createCliente','CotizacionesController@createCliente')->name('comercial.cotizaciones.createCliente');

		// Donde actualizar
	Route::put('comercial/cotizaciones/{id}','CotizacionesController@update')->name('comercial.cotizaciones.update');

		// Donde ver el detalle
	Route::get('comercial/cotizaciones/{id}/show','CotizacionesController@show')->name('comercial.cotizaciones.show');

		// Donde eliminar
	Route::delete('comercial/cotizaciones/{id}','CotizacionesController@destroy')->name('comercial.cotizaciones.destroy');

		// Donde ver el formulario de edicion
	Route::get('comercial/cotizaciones/{id}/edit','CotizacionesController@edit')->name('comercial.cotizaciones.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */































######################################################################################################################################
######################                                  Rutas de Seguridad                                  ##########################
######################################################################################################################################

	/* ROLES
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de Roles

		// Donde crear - guardar 
	Route::post('seguridad/roles/store','RolController@store')->name('seguridad.roles.store');	

		// Donde visualiza el estado
	Route::get('seguridad/roles','RolController@index')->name('seguridad.roles.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/roles/create','RolController@create')->name('seguridad.roles.create');

		// Donde actualizar
	Route::put('seguridad/roles/{role}','RolController@update')->name('seguridad.roles.update');

		// Donde ver el detalle
	Route::get('seguridad/roles/{role}','RolController@show')->name('seguridad.roles.show');

		// Donde eliminar
	Route::delete('seguridad/roles/{role}','RolController@destroy')->name('seguridad.roles.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/roles/{edit}/edit','RolController@edit')->name('seguridad.roles.edit');


	/* PERMISOS
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de permisos

		// Donde crear - guardar 
	Route::post('seguridad/permisos/store','PermisoController@store')->name('seguridad.permisos.store');	

		// Donde visualiza el estado
	Route::get('seguridad/permisos','PermisoController@index')->name('seguridad.permisos.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisos/create','PermisoController@create')->name('seguridad.permisos.create');

		// Donde actualizar
	Route::put('seguridad/permisos/{role}','PermisoController@update')->name('seguridad.permisos.update');

		// Donde ver el detalle
	Route::get('seguridad/permisos/{role}','PermisoController@show')->name('seguridad.permisos.show');

		// Donde eliminar
	Route::delete('seguridad/permisos/{role}','PermisoController@destroy')->name('seguridad.permisos.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisos/{edit}/edit','PermisoController@edit')->name('seguridad.permisos.edit');


	/* ROL->USUARIO
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de rolusuario

		// Donde crear - guardar 
	Route::post('seguridad/roluser/store','RolUsuarioController@store')->name('seguridad.roluser.store');	

		// Donde visualiza el estado
	Route::get('seguridad/roluser','RolUsuarioController@index')->name('seguridad.roluser.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/roluser/create','RolUsuarioController@create')->name('seguridad.roluser.create');

		// Donde actualizar
	Route::put('seguridad/roluser/{role}','RolUsuarioController@update')->name('seguridad.roluser.update');

		// Donde ver el detalle
	Route::get('seguridad/roluser/{role}','RolUsuarioController@show')->name('seguridad.roluser.show');

		// Donde eliminar
	Route::delete('seguridad/roluser/{role}','RolUsuarioController@destroy')->name('seguridad.roluser.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/roluser/{edit}/edit','RolUsuarioController@edit')->name('seguridad.roluser.edit');


	/* PERMISOS ->ROLES
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de permisosroles

		// Donde crear - guardar 
	Route::post('seguridad/permisosroles/store','PermisoRolController@store')->name('seguridad.permisosroles.store');	

		// Donde visualiza el estado
	Route::get('seguridad/permisosroles','PermisoRolController@index')->name('seguridad.permisosroles.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisosroles/create','PermisoRolController@create')->name('seguridad.permisosroles.create');

		// Donde actualizar
	Route::put('seguridad/permisosroles/{role}','PermisoRolController@update')->name('seguridad.permisosroles.update');

		// Donde ver el detalle
	Route::get('seguridad/permisosroles/{role}','PermisoRolController@show')->name('seguridad.permisosroles.show');

		// Donde eliminar
	Route::delete('seguridad/permisosroles/{role}','PermisoRolController@destroy')->name('seguridad.permisosroles.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisosroles/{edit}/edit','PermisoRolController@edit')->name('seguridad.permisosroles.edit');


	/* PERMISOS ->USUARIOS
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de permisosusuarios

		// Donde crear - guardar 
	Route::post('seguridad/permisosusuarios/store','PermisoUsuarioController@store')->name('seguridad.permisosusuarios.store');	

		// Donde visualiza el estado
	Route::get('seguridad/permisosusuarios','PermisoUsuarioController@index')->name('seguridad.permisosusuarios.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/permisosusuarios/create','PermisoUsuarioController@create')->name('seguridad.permisosusuarios.create');

		// Donde actualizar
	Route::put('seguridad/permisosusuarios/{role}','PermisoUsuarioController@update')->name('seguridad.permisosusuarios.update');

		// Donde ver el detalle
	Route::get('seguridad/permisosusuarios/{role}','PermisoUsuarioController@show')->name('seguridad.permisosusuarios.show');

		// Donde eliminar
	Route::delete('seguridad/permisosusuarios/{role}','PermisoUsuarioController@destroy')->name('seguridad.permisosusuarios.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/permisosusuarios/{edit}/edit','PermisoUsuarioController@edit')->name('seguridad.permisosusuarios.edit');


	/* PERMISOS ->USUARIOS
	---------------------------------------------------------------------------------------------------------------------------------- */

// Rutas de usuarios

		// Donde crear - guardar 
	Route::post('seguridad/users/store','UserController@store')->name('seguridad.users.store');	

		// Donde visualiza el estado
	Route::get('seguridad/users/index','UserController@index')->name('seguridad.users.index');

		// Donde ver el formulario de creacion
	Route::get('seguridad/users/create','UserController@create')->name('seguridad.users.create');

		// Donde actualizar
	Route::put('seguridad/users/{role}','UserController@update')->name('seguridad.users.update');

		// Donde ver el detalle
	Route::get('seguridad/users/{role}','UserController@show')->name('seguridad.users.show');

		// Donde eliminar
	Route::delete('seguridad/users/{role}','UserController@destroy')->name('seguridad.users.destroy');

		// Donde ver el formulario de edicion
	Route::get('seguridad/users/{edit}/edit','UserController@edit')->name('seguridad.users.edit');


	/* ---------------------------------------------------------------------------------------------------------------------------------- */


######################################################################################################################################
######################                               Fin Rutas de Seguridad                                 ##########################
######################################################################################################################################




});

