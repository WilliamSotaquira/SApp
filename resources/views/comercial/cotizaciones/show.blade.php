@extends ('layouts.base')
@section ('contenido')
@include('servicios.recursos.encabezado')


@can('organizacion.index')
<section class="content">

	<div class="box box-default">
		<div class="box-header with-border">
			<h3 class="box-title">Descripción del recurso</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>   

    <!-- Tabla: roles
    id
    name
    slug
    description       
    created_at
    updated_at
    special
  -->


  <div class="box-body">
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

      <!-- consulta, usuario, pago -->

      <div class="col-xs-12 col-sm-8">

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="idrecurso" class="col-xs-12 col-sm-3">Identificador</label>
              <div class="col-sm-3">
                <input type="text" id="idrecurso" name="idrecurso" class="form-control" placeholder="Nombre de la idrecurso &hellip;" value="{{$consulta->idrecurso}}" >
              </div>            
            </div>            
          </div>            
        </div>    

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="recurso" class="col-xs-12 col-sm-3">Nombre recurso</label>
              <div class="col-sm-9">
                <input type="text" id="recurso" name="recurso" class="form-control" placeholder="Nombre de la recurso &hellip;" value="{{$consulta->recurso}}" >
              </div>            
            </div>            
          </div>            
        </div>            

        <div class="row ">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="descripcion" class="col-xs-12 col-sm-3 control-label">Descripción</label>
              <div class="col-sm-9">
               <textarea name="descripcion" id="descripcion" class="form-control" rows="2" placeholder="Descrición y fuciones de la actividad." >{{$consulta->descripcion}}</textarea>
             </div> 
           </div> 
         </div> 
       </div> 

       <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="tipo_recurso" class="col-xs-12 col-sm-3 control-label">Tipo Recurso</label>
            <div class="col-sm-9">
              <select name="tipo_recurso" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_recurso" >

                @switch($consulta->tipo_recurso)
                @case(1)
                <option value="1" selected="selected" disabled="disabled">Recurso Humano</option>
                @break
                @case(2)
                <option value="2" selected="selected" disabled="disabled">Recurso Financiero Propio</option>
                @break
                @case(3)
                <option value="3" selected="selected" disabled="disabled">Recurso Financiero Ajeno</option>
                @break
                @case(4)
                <option value="4" selected="selected" disabled="disabled">Recurso Tecnológico Tangible</option>
                @break
                @case(5)
                <option value="5" selected="selected" disabled="disabled">Recurso Tecnológico Intangible</option>
                @break
                @default
                <option>sin registro</option>
                @break
                @endswitch

              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="costo" class="col-xs-12 col-sm-3">Valor costo</label>
            <div class="col-sm-9">
              <div class="input-group">
                <span class="input-group-addon">COP $</span>
                <input type="text" id="costo" name="costo" class="form-control money"  placeholder="Valor del recurso &hellip;" value="{{$consulta->costo}}">
                <span class="input-group-addon">.00</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="tipo_cobro" class="col-xs-12 col-sm-3 control-label">Tipo cobro</label>
            <div class="col-sm-9">
              <select name="tipo_cobro" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_cobro"  value="{{$consulta->tipo_cobro}}">

                @switch($consulta->tipo_cobro)
                @case(1)
                <option value="1" selected="selected">Contado</option>
                @break
                @case(2)
                <option value="2" selected="selected">Prorrogado</option>
                @break
                @case(3)
                <option value="3" selected="selected">Especie</option>
                @break
                @default
                <option>Sin informacion</option>
                @break
                @endswitch


              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="users_id" class="col-xs-12 col-sm-3 control-label">Persona</label>
            <div class="col-sm-9">
             <select name="users_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="users_id">

              @if($usuario == null)
              <option selected="selected">Sin informacion</option>
              @else
              @if($usuario->id == $consulta->users_id) 
              <option selected="selected">
                @if($usuario->document == null)
                Sin informacion
                @else
                {{$usuario->document}}
                @endif
                | {{$usuario->name}} {{$usuario->last_name}}</option>
                @endif
                @endif

              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="users_id" class="col-xs-12 col-sm-3 control-label">Persona</label>
            <div class="col-sm-9">
             <select name="users_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="users_id">

              @if($pago == null)
              <option selected="selected">Sin informacion</option>
              @else
              @if($pago->idpago == $consulta->idpago) 
              <option selected="selected">
                {{$pago->idpago}} - 
                @if($pago->descripcion_pago == null)
                Sin descripcion del pago
                @else
                {{$pago->descripcion_pago}}
                @endif
                | {{$pago->valor}}</option>
                @endif
                @endif

              </select>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="box-footer " id="guardar">
  <div class="container-fluid">
    <div class="row-bottons">
      <div class="col-sm-12">
       <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
       <div class="col-sm-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{ URL::previous()}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-sm-2 text-center"  style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-sm-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      
    </div>
  </div>
</div>
</div>
</div>

</section>

@endcan
@endsection
