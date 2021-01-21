@extends ('layouts.base')
@section ('contenido')
@include('servicios.recursos.encabezado')

@can('servicios.show')
<section class="content">


	<div class="box box-primary">
		<div class="box-header with-border"> 
			<h3 class="box-title">Listado de recursos</h3>

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
          <center><a href="{{route ('servicios.recursos.create')}}" ><button class="btn btn-success">Crear Nuevo Registro</button></a></center>
          @endcan
        </div>
      </div>
      <div class="box-body">	


       <div class="table-responsive">
        <table id="tbl_rol" class="table table-striped table-condensed table-hover">
         <thead>

          <th>ID</th>
          <th>Recurso</th>
          <th>Descripción</th>
          <th>Tipo Recurso</th>
          <th colspan="3">Opciones</th>

        </thead>

        <tfoot>

          <tr>

           <th></th>
           <th></th>
           <th></th>
           <th></th>
           <th colspan="3"></th>
         </tr>
       </tfoot>

       <tbody>
        @foreach($recursos as $rec)
        <tr>
         <td>{{$rec->idrecurso}}</td>
         <td>{{$rec->recurso}}</td>
         <td>{{$rec->descripcion}}</td>
         <td>
          @switch($rec->tipo_recurso)
          @case(1)
          Recurso Humano
          @break
          @case(2)
          Recurso Financiero Propio
          @break
          @case(3)
          Recurso Financiero Ajeno
          @break
          @case(4)
          Recurso Tecnológico Tangible
          @break
          @case(5)
          Recurso Financiero Intangible
          @break
          @default
          Recurso Indefinido
          @break          

          @endswitch
        </td>

        <td>
          <a href="{{route('servicios.recursos.show',['id' => Crypt::encrypt($rec->idrecurso)])}}" class="btn btn-sm btn-default"> Ver </a>                     
        </td>
        <td>
          @can('servicios.edit')
          <a href="{{route ('servicios.recursos.edit',['id' => Crypt::encrypt($rec->idrecurso)])}}" class="btn btn-sm btn-info"> Editar </a>
          @endcan
        </td>
        <td>
         <a data-target=" #modal-delete-{{$rec->idrecurso}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 

       </td>
     </tr>

     @include('servicios.recursos.modal')      
     @endforeach
   </tbody>



 </table>
 {{$recursos->render()}}

</div>	

</div>
</div>
</div>

</section>
@endcan
@endsection