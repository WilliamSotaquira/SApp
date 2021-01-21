@extends ('layouts.base')
@section ('contenido')
@include('productos.categorias.breadcrumb')



<section class="content">

	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Listado de las Categorías</h3>

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
						<center><a href="{{route('productos.categorias.create')}}"><button class="btn btn-success" style="margin-top:6px !important;">Crear Nuevo Registro</button></a></center>
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
						@include('productos.categorias.search')
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

					<div class="col-md-6">

						<!-- table------------------------------------------------------------------------------------------------------------------------ -->

						<div class="table-responsive">
							<table id="table_organizacion" class="table table-striped table-condensed table-hover">

								<!-- 
							'idcategoria',
							'categoria',
							'created_at',
							'updated_at'
							-->


								<th>&nbsp;ID</th>
								<th>Categoria</th>
								<th>Creación</th>
								<th class="text-center" colspan="2">Opciones</th>

								</thead>

								<tfoot>

									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th colspan="2"></th>
									</tr>
								</tfoot>

								<tbody>
									@foreach($categorias as $cat)
									<tr>
										<td>{{$cat->idcategoria}}</td>
										<td>{{$cat->categoria}}</td>
										<td>{{$cat->created_at}}</td>


										<td>
											<a href="{{route('productos.categorias.edit',['id' => Crypt::encrypt($cat->idcategoria)])}}" class="btn btn-sm btn-info"> Editar </a>
										</td>
										<td>
											<a href="#" data-target=" #modal-delete-{{$cat->idcategoria}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
										</td>
									</tr>
									@include('productos.categorias.modal')
									@endforeach
								</tbody>
							</table>


						</div>

						<!-- table------------------------------------------------------------------------------------------------------------------------ -->
					</div>

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