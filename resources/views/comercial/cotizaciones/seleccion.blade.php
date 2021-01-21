<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-seleccion">

	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden='true'>x</span>

				</button>
				<h4 class="modal-title"><strong>Seleccione un opción</strong></h4>
			</div>
			<div class="body d-flex m-auto">
				<div class="container-fluid">
					<div class="row text-center" id="botones" style="height: 300px; margin: 6%;">

						<div class="col-lg-6 col-xs-12">
							<a href="#" id="GoCliente" data-dismiss="modal">
								<div class="small-box bg-navy">
									<div class="inner">
										<h1 class="display-4">Cliente <br>Existente</h1>
										<p>Seleccione su cliente</p>
									</div>
									<div class="icon m-5">
										<ion-icon class="mt-2" name="document-text-outline"></ion-icon>
									</div>
									<span class="small-box-footer">Aqui <i class="fa fa-arrow-circle-right"></i></span>
								</div>
							</a>
						</div>

						<div class="col-lg-6 col-xs-12">
							<a href="{{route('comercial.cotizaciones.createCliente')}}">
								<div class="small-box bg-yellow ">
									<div class="inner">
										<h1 class="display-4">Cliente <br> 	 Nuevo</h1>
										<p>Agregue un cliente nuevo al sistema</p>
									</div>
									<div class="icon m-5">
										<ion-icon class="mt-2" name="document-text-outline"></ion-icon>
									</div>
									<span class="small-box-footer">Aqui <i class="fa fa-arrow-circle-right"></i></span>
								</div>
							</a>
						</div>


					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>

		</div>
	</div>

</div>