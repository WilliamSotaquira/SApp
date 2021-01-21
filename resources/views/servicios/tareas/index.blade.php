@extends ('layouts.base')
@section ('contenido')
@include('servicios.tareas.encabezado')

@can('servicios.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border"> 
			<h3 class="box-title">Listado de tareas</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<!-- /.box-header -->
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
        <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
        {{session('danger')}}          
      </div>
      @elseif(session()->has('warning'))
      <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
        {{session('warning')}}          
      </div>
      @endif

      <div class="row mt-1 justify-content-between align-items-center" >
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
          @can('servicios.create')
          <center><a href="{{route ('servicios.tareas.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
      </div>
      <div class="box-body">	


       <div class="table-responsive align-baseline ">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th style="width: 5%;">ID</th>
          <th style="width: 15%;">Tarea</th>
          <th style="width: 15%;">Descripción</th>
          <th style="width: 10%;">Duración</th>
          <th style="width: 10%;">Riesgo</th>
          <th style="width: 10%;">Estado </th>
          <th style="width: 20%;">Actividad</th>
          <th style="width: 15%; "colspan="2" >Opciones</th>

        </thead>

        <tfoot>

          <tr>

           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="2"></th>
         </tr>
       </tfoot>

       <tbody>
        @foreach($tareas as $tarea)
        <tr>
         <td class="text-center">{{$tarea->idtarea}}</td>
         <td>{{$tarea->tarea}}</td>
         <td>{{$tarea->descripcion}}</td>
         <td>{{$tarea->duracion}} horas</td>
         <td>
          @switch($tarea->tipo_tarea)

          @case(1)
          Bajo
          @break

          @case(2)
          Medio
          @break

          @case(3)
          Alto
          @break

          @case(4)
          Especial
          @break

          @case(5)
          Otro
          @break

          @default
          Sin información
          @break

          @endswitch
        </td>
        <td>
          @switch($tarea->estado_tarea)

          @case(1)
          Activado
          @break

          @case(2)
          Desactivado
          @break

          @default
          Sin información
          @break
          @endswitch

        </td>
        <td>

          @if($tarea->idactividad == null)
          Sin información
          @else

          @foreach($actividades as $actividad)

                    <?php 
          $referencia = "";
          ?>
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


          @if($tarea->idactividad == $actividad->idactividad)
          {{$referencia}} | {{$actividad->actividad}}
          @endif
          @endforeach

          @endif
        </td>

        <td>
          @can('servicios.edit')
          <a href="{{route ('servicios.tareas.edit', ['id' => Crypt::encrypt($tarea->idtarea)] )}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a href="" data-target=" #modal-delete-{{$tarea->idtarea}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 

       </td>
     </tr>

     @include('servicios.tareas.modal')      

     @endforeach
   </tbody>



 </table>
 {{$tareas->render()}}

</div>	

</div>

<!-- /.box-body -->
		<!-- <div class="box-footer text-center"
			<a href="javascript:void(0)" class="uppercase"></a>
		</div> -->
		<!-- /.box-footer -->

  </div>
</div>

</section>
@endcan
@endsection