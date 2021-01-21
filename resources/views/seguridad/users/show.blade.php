@extends ('layouts.base')
@section ('contenido')
@include('seguridad.users.encabezado')


<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Información del Registro</h3>


      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

<!-- 
Tabla: users 
id
name
apellidos
email
password
celular
tipo_documento
documento
direccion
score
remember_token
created_at
updated_at
-->
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


    <div class="row" id="msg" name="msg">

    </div>

    <form>
      <div class="row">
        <div class="col-xs-12 col-sm-6"> 

          <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="id" class="col-xs-12 col-sm-4">ID</label>
                <div class="col-sm-8">
                  <input type="text" id="id" name="id" class="form-control"  value="{{$users->id}}" disabled="disabled" >
                </div>            
              </div>            
            </div>            
          </div>   

          <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-xs-12 col-sm-4">Nombres</label>
                <div class="col-sm-8">
                  <input type="text" id="name" name="name" class="form-control" value="{{$users->name}}" disabled="disabled">
                </div>            
              </div>            
            </div>            
          </div>

          <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="last_name" class="col-xs-12 col-sm-4">Apellidos</label>
                <div class="col-sm-8">
                  <input type="text" id="last_name" name="last_name" class="form-control" value="{{$users->last_name}}" disabled="disabled">
                </div>            
              </div>            
            </div>            
          </div>            

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="email" class="col-xs-12 col-sm-4">E-mail</label>
                <div class="col-sm-8">
                  <input type="email" id="email" name="email" class="form-control"  value="{{$users->email}}" disabled="disabled">
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="mobile" class="col-xs-12 col-sm-4">Celular</label>
                <div class="col-sm-8"> 
                  <input type="number" id="mobile" name="mobile" class="form-control" value="{{$users->mobile}}" disabled="disabled" >
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
             <div class="form-group">
              <label for="type_doc" class="col-xs-12 col-sm-4" >Tipo Documento</label>
              <div class="col-sm-8">
                <select id="type_doc" name="type_doc" class="form-control selectpicker" data-live-search="true" id="type_doc" >
                  @if($users->type_doc === '1')          
                  <option value="1">Cedula de Ciudadanía</option>
                  @elseif($users->type_doc === '2')
                  <option value="2">Cedula de Extranjería</option>  
                  @elseif($users->type_doc === '3')   
                  <option value="3">Pasaporte</option>
                  @else
                  <option value="">Sin Criterio</option>
                  @endif

                </select>                                              
              </div>          
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="document" class="col-xs-12 col-sm-4">Numero Documento</label>
              <div class="col-sm-8">
                <input type="text" id="document" name="document" class="form-control" value="{{$users->document}}" disabled="disabled">
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="direction" class="col-xs-12 col-sm-4">Dirección</label>
              <div class="col-sm-8">
                <input type="text" id="direction" name="direction" class="form-control"  value="{{$users->direction}}" disabled="disabled" >
              </div>
            </div>
          </div>
        </div>    

      </div>
      <div class="col-xs-12 col-sm-6">

        <div class="row row-first">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="score" class="col-xs-12 col-sm-4">Puntuación</label>
              <div class="col-sm-8">
                @if($users->score === null)
                <input type="text" id="score" name="score" class="form-control"  value="0" disabled="disabled" >
                @else
                <input type="text" id="score" name="score" class="form-control"  value="{{$users->score}}" disabled="disabled" >
                @endif


              </div>
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="created_at" class="col-xs-12 col-sm-4">Creado Desde</label>
              <div class="col-sm-8">
                <input type="text" id="created_at" name="created_at" class="form-control"  value="{{$users->created_at}}" disabled="disabled" >
              </div>
            </div>
          </div>
        </div> 

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="updated_at" class="col-xs-12 col-sm-4">Ultima Actualización</label>
              <div class="col-sm-8">
                <input type="text" id="updated_at" name="updated_at" class="form-control"  value="{{$users->updated_at}}" disabled="disabled" >
              </div>
            </div>
          </div>
        </div> 

        


      </div>
    </div>
  </form>


</div>


</div> 

<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
       <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('seguridad.users.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      
    </div>
  </div>
</div>
</div>
</div>

</section>


@endsection
