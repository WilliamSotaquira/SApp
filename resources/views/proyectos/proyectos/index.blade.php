@extends ('layouts.base')
@section ('contenido')
@include('proyectos.proyectos.breadcrumb')



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
						<center><a href="{{route('proyectos.proyectos.create')}}"><button class="btn btn-success" style="margin-top:6px !important;">Crear Nuevo Registro</button></a></center>
					</div>
					<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
						@include('proyectos.proyectos.search')
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


				<div class="row">

					<!-- table------------------------------------------------------------------------------------------------------------------------ -->

					<div class="table-responsive">
						<table id="table_organizacion" class="table table-striped table-condensed table-hover">


							<th>&nbsp;ID</th>
							<th>Tipo</th>
							<th>Proyecto</th>
							<th>Dirección</th>
							<th>Teléfono</th>
							<th>Ciudad</th>
							<th>Estado</th>
							<!-- <th>F. Plano</th> -->
							<!-- <th>F. Rectificación</th> -->
							<th>F. Entrada</th>
							<!-- <th>F. Creación</th> -->
							<th>U Modificación</th>
							<!-- <th>F. Cierre</th> -->
							<!-- <th>Diseñador</th> -->
							<!-- <th>Factura</th> -->
							<th class="text-center" colspan="3">Opciones</th>

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
									<th></th>
									<!-- <th></th> -->
									<!-- <th></th> -->
									<!-- <th></th> -->
									<!-- <th></th> -->
									<th colspan="3"></th>
								</tr>
							</tfoot>

							<tbody>
								@foreach($proyectos as $pro)
								<tr>
									<td>{{$pro->idproyecto}}</td>
									<td>
										@switch($pro->tipoProyecto)
										@case (1)
										Cocina
										@break
										@case (2)
										Baño
										@break
										@case (3)
										Piso
										@break
										@case (4)
										Cortinas
										@break
										@case (5)
										Grupo
										@break
										default:
										Otros
										@break
										@endswitch
									</td>
									<td>{{$pro->nombreProyecto}}</td>
									<td>{{$pro->direccion}}</td>
									<td>{{$pro->telContacto}}</td>
									<td>{{$pro->ciudad}}</td>
									<td>
										@switch ($pro->estadoProyecto)
										@case (0)
										Con retraso
										@break;
										@case (1)
										En ejecución
										@break;
										@case (2)
										Completado
										@break;
										@case (3)
										Aplazado
										@break;
										@case (4)
										Cancelado
										@break;
										@default:
										Sin información - Información Errada
										@break;
										@endswitch

									</td>
									<!-- <td>{{$pro->fechaPlano}}</td> -->
									<!-- <td>{{$pro->fechaRectificacion}}</td> -->
									<td>{{$pro->fechaEntrada}}</td>
									<!-- <td>{{$pro->fechaCierre}}</td> -->
									<!-- <td>{{$pro->created_at}}</td> -->
									<td>{{$pro->updated_at}}</td>
									<!-- <td>{{$pro->idcotizacion}}</td> -->


									<td>
										<a href="{{route('proyectos.proyectos.show',['id' => Crypt::encrypt($pro->idproyecto)])}}" class="btn btn-sm btn-default">Ver más </a>
									</td>
									<td>
										<a href="{{route('productos.categorias.edit',['id' => Crypt::encrypt($pro->idproyecto)])}}" class="btn btn-sm btn-warning"> Editar </a>
									</td>
									<td>
										<a href="#" data-target=" #modal-delete-{{$pro->idproyecto}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>


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