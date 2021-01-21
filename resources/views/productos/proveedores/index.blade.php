@extends ('layouts.base')
@section ('contenido')

<section class="content-header">
	<h1>
		Menú de Personas
		<small>Version 2.0</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
		<li><a href="#">Clientes</a></li>
		<li class="active">Personas</li>
	</ol>
</section>

<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">			
			<h3 class="box-title">Listado de las personas</h3>

			<div class="box-tools pull-right">
				<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				</button>
				<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
			</div> 
		</div>
		<!-- /.box-header -->



		<div class="box-body box-body-wdw">		
			<div class="container-fluid">

				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<center><a href="{{route('clientes.personas.create')}}" ><button class="btn btn-success"style="margin-top:6px !important;">Crear Nuevo Registro</button></a></center>
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
						@include('clientes.personas.search')
					</div> 
				</div>

				@if(session()->has('success'))
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> ¡Completado!</h4>
					{{session('success')}}    
				</div>
				@elseif(session()->has('danger'))
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> ¡Peligro!</h4>
					{{session('danger')}}          
				</div>
				@elseif(session()->has('warning'))
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
					{{session('warning')}}          
				</div>
				@endif
				

				<div class="row justify-content-between align-items-center">

					<!-- table------------------------------------------------------------------------------------------------------------------------ -->

					<div class="table-responsive">
						<table id="table_organizacion" class="table table-striped table-condensed table-hover">
							<thead>
							<!-- 

								1.'id',
								2.'name', !important;
								3.'last_name', !important;
								4.'email',!important;
								5.'home_address',!important;
								6.'mobile',!important;
								7.'phone',
								8.'type_doc',
								9.'document',
								10.'score',
								11.'remember_token',
								12.'created_at',
								13.'updated_at', 
							-->


							<th>&nbsp;Documento</th>
							<th>Nombre</th>
							<th>E-mail</th>
							<th>Dirección</th>
							<th>Celular</th>
							<th class="text-center" colspan="3">Opciones</th>

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
							@foreach($personas as $per)
							<tr>
								<td>&nbsp;{{$per->document}}</td>
								<td>{{$per->name}}&nbsp;{{$per->last_name}}</td>
								<td>{{$per->email}}</td>
								<td>{{$per->home_address}}</td>
								<td>{{$per->mobile}}</td>
								<td>
									<a href="{{route('clientes.personas.show',['id' => Crypt::encrypt($per->id)])}}" class="btn btn-sm btn-default"> Ver </a>
								</td>
								<td>
									<a href="{{route('clientes.personas.edit',['id' => Crypt::encrypt($per->id)])}}" class="btn btn-sm btn-info"> Editar </a>
								</td>
								<td>
									<a href="#" data-target=" #modal-delete-{{$per->id}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a> 
								</td>
							</tr>
							@include('clientes.personas.modal')
							@endforeach
						</tbody>

					</table>

				</div>

				<!-- table------------------------------------------------------------------------------------------------------------------------ -->
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
@endsection