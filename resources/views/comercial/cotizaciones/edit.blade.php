@extends ('layouts.base')
@section ('contenido')
@include('servicios.recursos.encabezado')



<section class="content">

  <?php 
  $id= Crypt::encrypt($consulta->idrecurso);
  ?>


  {!!Form::model($consulta,['method'=>'PUT','route'=>['servicios.recursos.update',$id],'files'=>'true'])!!}
  {{Form::token()}}


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Registro</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

    @if (count($errors)>0)
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
        @endforeach
      </ul>
    </div>
    @endif

<!-- Tabla: roles
id
name
slug
description       
created_at
updated_at
special
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
            <option value="1" selected="selected">Recurso Humano</option>
            <option value="2">Recurso Financiero Propio</option>
            <option value="3">Recurso Financiero Ajeno</option>
            <option value="4">Recurso Tecnológico Tangible</option>
            <option value="5">Recurso Tecnológico Intangible</option>
            
            @break
            @case(2)
            <option value="1">Recurso Humano</option>
            <option value="2" selected="selected">Recurso Financiero Propio</option>
            <option value="3">Recurso Financiero Ajeno</option>
            <option value="4">Recurso Tecnológico Tangible</option>
            <option value="5">Recurso Tecnológico Intangible</option>
            @break
            @case(3)
            <option value="1">Recurso Humano</option>
            <option value="2">Recurso Financiero Propio</option>
            <option value="3" selected="selected">Recurso Financiero Ajeno</option>
            <option value="4">Recurso Tecnológico Tangible</option>
            <option value="5">Recurso Tecnológico Intangible</option>
            @break
            @case(4)
            <option value="1">Recurso Humano</option>
            <option value="2">Recurso Financiero Propio</option>
            <option value="3">Recurso Financiero Ajeno</option>
            <option value="4" selected="selected">Recurso Tecnológico Tangible</option>
            <option value="5">Recurso Tecnológico Intangible</option>
            @break
            @case(5)
            <option value="1">Recurso Humano</option>
            <option value="2">Recurso Financiero Propio</option>
            <option value="3">Recurso Financiero Ajeno</option>
            <option value="4">Recurso Tecnológico Tangible</option>
            <option value="5" selected="selected">Recurso Tecnológico Intangible</option>
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
            <option value="2">Prorrogado</option>
            <option value="3">Especie</option>
            @break
            @case(2)
            <option value="1">Contado</option>
            <option value="2" selected="selected">Prorrogado</option>
            <option value="3">Especie</option>            
            @break
            @case(3)
            <option value="1">Contado</option>
            <option value="2">Prorrogado</option>
            <option value="3" selected="selected">Especie</option>            
            @break
            @default
            <option selected="selected" disabled="disabled">Seleccione una opción...</option>
            <option value="1">Contado</option>
            <option value="2">Prorrogado</option>
            <option value="3">Especie</option>  
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
          <option selected="selected" value="">Sin información</option>          


          @foreach($usuario_all as $ua)

          <option value="{{$ua->id}}">

            @if($ua->document == null)
             Sin documento
              @else
             {{$ua->document}}
            @endif
            | {{$ua->name}} {{$ua->last_name}}</option>

            @endforeach


            @else

            @foreach($usuario_all as $ua)

            @if($usuario->id == $consulta->users_id) 
            <option selected="selected" value="{{$ua->id}}" >

              @if($ua->document == null)
              {{$ua->id}}--- Sin documento
              @else
             {{$ua->id}}--- {{$ua->document}}
              @endif
              | {{$ua->name}} {{$ua->last_name}}</option>
              @endif

              @endforeach

              @endif

            </select>
          </div>
        </div>
      </div>
    </div>

    <div class="row"> 
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="idpago" class="col-xs-12 col-sm-3 control-label">Pago</label>
          <div class="col-sm-9">
           <select name="idpago" class="form-control selectpicker" data-size="6" data-live-search="true" id="idpago">

            @if($pago == null)
            <option selected="selected" value="">Sin informacion</option>

            @foreach($pago_all as $pa)
            <option value="{{$pa->idpago}}">

              @if($pa->descripcion_pago == null)
              Sin descripcion del pago
              @else
              <strong>PG{{$pa->idpago}}</strong> | {{$pa->descripcion_pago}}
              @endif
              - COP ${{$pa->valor}}
            </option>

            @endforeach 

            @else

            @foreach($pago_all as $pa)
            @if($pago->idpago == $consulta->idpago) 
            <option selected="selected" value="{{$pa->idpago}}">

              @if($pa->descripcion_pago == null)
              Sin descripcion del pago
              @else
              <strong>PG{{$pa->idpago}}</strong> | {{$pa->descripcion_pago}}
              @endif
              - COP ${{$pa->valor}}</option>
              @endif

              @endforeach  
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
  <div class="row">
    <div class="col-sm-12">

      <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('servicios.recursos.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <a href="{{route('servicios.recursos.edit',['id' => Crypt::encrypt($consulta->idrecurso)])}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

     </div>
     <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


      <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


    </div>
    <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

  </div>

</div>


</div>

</div>
{!!Form::close()!!}
</section>
@endsection


