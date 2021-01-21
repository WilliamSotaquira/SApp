@extends ('layouts.base')
@section ('contenido')
@include('servicios.actividades.encabezado')

@can('servicios.index')
<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border"> 
			<h3 class="box-title">Listado de actividades</h3>

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
          <center><a href="{{route ('servicios.actividades.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
      </div>
      <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th>ID</th>
          <th>Referencia</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th colspan="2">Opciones</th>

        </thead>

        <tfoot>

          <tr>

           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="2"></th>
         </tr>
       </tfoot>

       <tbody>
        @foreach($actividades as $act)
        <tr>
         <td class="text-center">{{$act->idactividad}}</td>
         <td >
          @switch($act->referencia)

          @case(1)
          Diseño y desarrollo Web
          @break
          @case(2)
          Diseño y Desarrollo de software
          @break
          @case(3)
          Mantenimiento de computadores y periféricos
          @break
          @case(4)
          Mantenimiento Web
          @break
          @case(5)
          Soporte Técnico
          @break
          @case(6)
          Servicio Técnico
          @break
          @case(7)
          Diseño Gráfico
          @break
          @case(8)
          Otros
          @break
          @default
          Sin información
          @break

          @endswitch        

        </td>
        <td>{{$act->actividad}}</td>
        <td>{{$act->descripcion}}</td>

        <td>
          @can('servicios.edit')
          <a href="{{route ('servicios.actividades.edit', ['id' => Crypt::encrypt($act->idactividad)] )}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a href="" data-target=" #modal-delete-{{$act->idactividad}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 

       </td>
     </tr>

     @include('servicios.actividades.modal')      

     @endforeach
   </tbody>



 </table>
 {{$actividades->render()}}

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