@extends ('layouts.base')
@section ('contenido')

<section class="content-header">
	<h1>                  
		Menú de Clientes
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="#">Clientes</a></li>
    <li><a href="{{route('clientes.personas.index')}}">Clientes</a></li>
    <li class="active">Ver Registro</li>
  </ol>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Informacion del Registro</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>

    <div class="container-fluid">

      @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
        {{session('success')}}    
      </div>
      @elseif(session()->has('danger'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> Error!</h4>
        {{session('danger')}}          
      </div>
      @elseif(session()->has('warning'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
        {{session('warning')}}          
      </div>
      @endif



      <div class="box-body">
        <div class="col-xs-12 col-sm-12 col-lg-10">

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-xs-12 col-sm-3">Nombres</label>
                <div class="col-sm-9">
                  <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{$consulta->name}}" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="last_name" class="col-xs-12 col-sm-3">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="" value="{{$consulta->last_name}}" disabled>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-7">
             <div class="form-group">
              <label for="type_doc" class="col-xs-12 col-sm-6" >Tipo Documento</label>
              <div class="col-sm-6">
                <select id="type_doc" name="type_doc" class="form-control selectpicker" data-live-search="true" id="type_doc" disabled>

                  @switch($consulta->type_doc)

                  @case(1)
                  <option value="1" selected>Cedula de Ciudadanía</option>
                  @break

                  @case(2)
                  <option value="2" selected>Cedula de Extranjería</option>     
                  @break

                  @case(2)                 
                  <option value="3"selected>Pasaporte</option>  
                  @break

                  @default
                  <option default>Seleccione &hellip;</option>
                  @break

                  @endswitch

                </select>                                              
              </div>          
            </div>
          </div>
          <div class="col-xs-12 col-sm-5">
            <div class="form-group">
              <label for="document" class="col-xs-12 col-sm-5">N° Documento</label>
              <div class="col-sm-7">
                <input type="text" id="document" name="document" class="form-control" placeholder="" id="document" value="{{$consulta->document}}" disabled="disabled" >
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="email" class="col-xs-12 col-sm-3">Email</label>
              <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" placeholder="" id="email" value="{{$consulta->email}}" disabled>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="home_address" class="col-xs-12 col-sm-3">Dirección</label>
              <div class="col-sm-9">
                <input type="text" id="home_address" name="home_address" class="form-control" placeholder="" value="{{$consulta->home_address}}" disabled>
              </div>            
            </div>            
          </div>            
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="mobile" class="col-xs-12 col-sm-3">Telefono o Movil</label>
              <div class="col-sm-9">
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="" id="mobile" value="{{$consulta->mobile}}" disabled>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="phone" class="col-xs-12 col-sm-3">Telefono Auxiliar</label>
              <div class="col-sm-9">
               <input type="text" id="phone" name="phone" class="form-control" placeholder="" id="phone" value="{{$consulta->phone}}" disabled="disabled">
             </div>
           </div>
         </div>
       </div>

       <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="score" class="col-xs-12 col-sm-3">Puntuacion</label>
            <div class="col-sm-9">
             <input type="text" id="score" name="score" class="form-control" placeholder="" id="score" value="{{$consulta->score}}" disabled="disabled">
           </div>
         </div>
       </div>
     </div>

     <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="created_at" class="col-xs-12 col-sm-3">Fecha de creación</label>
          <div class="col-sm-9">
            <input type="text" id="created_at" name="created_at" class="form-control" placeholder="" id="created_at" value="{{$consulta->created_at}}" disabled="disabled" >
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="updated_at" class="col-xs-12 col-sm-3">Fecha de actualización</label>
          <div class="col-sm-9">
            <input type="text" id="updated_at" name="updated_at" class="form-control" placeholder="" id="updated_at" value="{{$consulta->updated_at}}" disabled="disabled">
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<div class="box-footer">
  <div class="container-fluid">
    <div class="row">

      <div class="col-xs-6 col-sm-6 text-sm-right col-md-6 col-lg-1 text-center">
        <a href="{{route('clientes.personas.edit',['id' => Crypt::encrypt($consulta->id)])}}" class="btn btn-md btn-info">Editar</a>
      </div>
      <div class="col-xs-6 col-sm-6 text-sm-left col-md-6 col-lg-1 text-center">
        <a href="{{ URL::previous() }}" class="btn btn-md btn-default btn_end" id="back" >Atrás</a>
      </div>
    </div>
  </div>
</div>

</section>

@endsection





