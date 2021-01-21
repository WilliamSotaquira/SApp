@extends ('layouts.base')
@section ('contenido')
@include('servicios.tareas.encabezado')


<section class="content">

  {!!Form::open(array('url'=>'servicios/tareas/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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
                <label for="idactividad" class="col-xs-12 col-sm-3 control-label">Actividad</label>
                <div class="col-sm-5">


                  <select name="idactividad" class="form-control selectpicker" data-size="6" data-live-search="true" id="idactividad"  value="{{old('idactividad')}}" required="required">

                    <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                    <?php 
                    $referencia = "";
                    ?>


                    @foreach($actividades as $actividad)


                    @switch($actividad->referencia)

                    @case(1)
                    <?php 
                    $referencia = 'Diseño y desarrollo Web';
                    ?>
                    @break

                    @case(2)
                    <?php 
                    $referencia = 'Diseño y Desarrollo de software';
                    ?>
                    @break

                    @case(3)
                    <?php 
                    $referencia = 'Mantenimiento de computadores y periféricos';
                    ?>
                    @break

                    @case(4)
                    <?php 
                    $referencia = 'Mantenimiento Web';
                    ?>
                    @break

                    @case(5)
                    <?php 
                    $referencia = 'Soporte Técnico';
                    ?>
                    @break

                    @case(6)
                    <?php 
                    $referencia = 'Servicio Técnico';
                    ?>
                    @break

                    @case(7)
                    <?php  
                    $referencia = 'Diseño Gráfico';
                    ?>
                    @break

                    @case(8)
                    <?php  
                    $referencia = 'Otros';
                    ?>
                    @break

                    @default
                    <?php  
                    $referencia = 'Sin información';
                    ?>
                    @break

                    @endswitch   


                    <option value="{{$actividad->idactividad}}">{{$referencia}} | {{$actividad->actividad}}: {{$actividad->descripcion}}</option>
                    @endforeach


                  </select>
                </div>
              </div>
            </div>
          </div>  

          <div class="row" >
            <div class="col-xs-12 col-sm-12">
              <div class="form-group ">
                <label for="tarea" class="col-xs-12 col-sm-3">Nombre tarea</label>
                <div class="col-sm-9">
                  <input type="text" id="tarea" name="tarea" class="form-control" placeholder="Nombre de la tarea &hellip;" value="{{old('tarea')}}" required>
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

         <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="duracion" class="col-xs-12 col-sm-3">Duración</label>
              <div class="col-sm-5">
                <div class="input-group">
                  <input type="text" id="duracion" name="duracion" class="form-control hours" placeholder="Duracion en horas &hellip;" value="{{old('duracion')}}" required>
                  <span class="input-group-addon">Horas</span>
                </div>


              </div>            
            </div>            
          </div>            
        </div>            

        <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="tipo_tarea" class="col-xs-12 col-sm-3 control-label">Prioridad tarea</label>
              <div class="col-sm-5">
                <select name="tipo_tarea" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_tarea"  value="{{old('tipo_tarea')}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <option value="1">Baja</option>
                  <option value="2">Media</option>
                  <option value="3">Alta</option>
                  <option value="4">Especial</option>
                  <option value="5">Otro</option>

                </select>
              </div>
            </div>
          </div>
        </div> 

        <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="estado_tarea" class="col-xs-12 col-sm-3 control-label">Estado tarea</label>
              <div class="col-sm-5">
                <select name="estado_tarea" class="form-control selectpicker" data-size="6" data-live-search="true" id="estado_tarea"  value="{{old('estado_tarea')}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <option value="1">Activado</option>
                  <option value="2">Desactivado</option>
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

            <a href="{{route('servicios.tareas.index')}}" class="btn btn-info btn_end" id="back" >Atrás</a><br>

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


