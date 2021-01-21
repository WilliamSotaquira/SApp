@extends ('layouts.base')
@section ('contenido')
@include('servicios.actividades.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'servicios/actividades/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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

         <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="referencia" class="col-xs-12 col-sm-3 control-label">Tipo Referencia</label>
              <div class="col-sm-5">
                <select name="referencia" class="form-control selectpicker" data-size="6" data-live-search="true" id="referencia"  value="{{old('referencia')}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <option value="1">Diseño y desarrollo Web</option>
                  <option value="2">Diseño y Desarrollo de software</option>
                  <option value="3">Mantenimiento de computadores y periféricos</option>
                  <option value="4">Mantenimiento Web</option>
                  <option value="5">Soporte Técnico</option>
                  <option value="6">Servicio Técnico</option>
                  <option value="7">Diseño Gráfico</option>
                  <option value="8">Otros</option>

                </select>
              </div>
            </div>
          </div>
        </div>   

        <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="actividad" class="col-xs-12 col-sm-3">Referencia Actividad</label>
                <div class="col-sm-9">
                  <input type="text" id="actividad" name="actividad" class="form-control" placeholder="Nombre de la actividad &hellip;" value="{{old('actividad')}}" required>
                </div>            
              </div>            
            </div>            
          </div>            

          <div class="row ">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="descripcion" class="col-xs-12 col-sm-3 control-label">Descripción</label>
                <div class="col-sm-9">
                 <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descrición y fuciones de la actividad." value="{{old('descripcion')}}" required></textarea>
               </div> 
             </div> 
           </div> 
         </div> 

          <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="idrecurso" class="col-xs-12 col-sm-3 control-label">Recurso</label>
              <div class="col-sm-5">
                <select name="idrecurso" class="form-control selectpicker" data-size="6" data-live-search="true" id="idrecurso"  value="{{old('idrecurso')}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>

                  @foreach($recursos as $recurso)
                  <option value="{{$recurso->idrecurso}}">{{$recurso->idrecurso}} | {{$recurso->recurso}}: {{$recurso->descripcion}}</option>
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

          <a class="btn btn-danger btn_end" type="reset" id="limpiar">Limpiar</a>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">

          <a href="{{route('servicios.actividades.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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


