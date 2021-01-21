@extends ('layouts.base')
@section ('contenido')
@include('servicios.recursos.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'servicios/recursos/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Agregar Nuevo Registro</h3>
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

    <div class="container-fluid">

      <div class="box-body">
        <div class="col-xs-12 col-sm-10 ">

          <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="recurso" class="col-xs-12 col-sm-3">Nombre recurso</label>
                <div class="col-sm-9">
                  <input type="text" id="recurso" name="recurso" class="form-control" placeholder="Nombre de la recurso &hellip;" value="{{old('recurso')}}" required autofocus="autofocus">
                </div>            
              </div>            
            </div>            
          </div>            

          <div class="row ">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="descripcion" class="col-xs-12 col-sm-3 control-label">Descripción</label>
                <div class="col-sm-9">
                 <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descrición y fuciones de la actividad." value="{{old('descripcion')}}"></textarea>
               </div> 
             </div> 
           </div> 
         </div> 

         <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="tipo_recurso" class="col-xs-12 col-sm-3 control-label">Tipo Recurso</label>
              <div class="col-sm-9">
                <select name="tipo_recurso" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_recurso"  value="{{old('tipo_recurso')}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <option value="1">Recurso Humano</option>
                  <option value="2">Recurso Financiero Propio</option>
                  <option value="3">Recurso Financiero Ajeno</option>
                  <option value="4">Recurso Tecnológico Tangible</option>
                  <option value="5">Recurso Tecnológico Intangible</option>

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
                  <input type="text" id="costo" name="costo" class="form-control money"  placeholder="Valor del recurso &hellip;" value="{{old('costo')}}">
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
                <select name="tipo_cobro" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_cobro"  value="{{old('tipo_cobro')}}">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <option value="1">Contado</option>
                  <option value="2">Prorrogado</option>
                  <option value="3">Especie</option>

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
               <select name="users_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="users_id"  value="{{old('users_id')}}">

                <option selected="selected" disabled="disabled">Seleccione una opción...</option>              
                @foreach($usuario as $user) 
                <option value="{{$user->id}}">{{$user->document}} | {{$user->name}} {{$user->last_name}}</option>
                @endforeach

              </select>
            </div>
          </div>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="idpago" class="col-xs-12 col-sm-3 control-label">Referencia Pago</label>
            <div class="col-sm-9">
             <select name="idpago" class="form-control selectpicker" data-size="6" data-live-search="true" id="idpago"  value="{{old('idpago')}}">

              <option selected="selected" disabled="disabled">Seleccione una opción...</option>
              @foreach($pago as $pg) 
              <option value="{{$pg->idpago}}">{{$pg->descripcion_pago}} {{$pg->tipo_pago}} | <strong>{{$pg->valor}}</strong></option>
              @endforeach

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
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <button class="btn btn-primary btn_end" type="submit" > Guardar </button>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <input type="button" class="btn btn-danger btn_end" name="reset_form" value="Limpiar" onclick="this.form.reset();">

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{ URL::previous()}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

        </div>
        <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

      </div>
    </div>
  </div>
</div>
</div>



{!!Form::close()!!}

</section>


@endsection

@section('scripts')


@endsection

