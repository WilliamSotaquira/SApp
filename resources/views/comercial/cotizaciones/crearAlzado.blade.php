<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-crearAlzado">

    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden='true'>x</span>

                </button>
                <h4 class="modal-title"><strong>Crear alzado</strong></h4>
            </div>
            <div class="body d-flex m-auto">
                <div class="container-fluid">
                    <div class="row" id="botones">

                        <div class="container-fluid">
                            <div class="form-group col-lg-12 col-xs-12">
                                <label for="definicion">Definición</label>
                                <input type="text" id="definicion" name="definicion" class="form-control" placeholder="Ejemplo: Muebles de la isla, Alzado 1... " value="{{old('nombreProyecto')}}">
                            </div>
                        </div>

                        <div class="container-fluid text-center">
                            <div class="form-group col-lg-6 col-xs-6">
                                <button class="btn btn-default">Agregar Mueble</button>
                            </div>
                            <div class="form-group col-lg-6 col-xs-6">
                                <button class="btn btn-default">Agragar Electro</button>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="agregar mueble">
                        <div class="col-sm-3 col-xs-12">
                            <select name="tipoMueble" id="tipoMueble" class="form-control selectpicker" value="{{old('tipoMueble')}}" required="required">
                                <option>Seleccione una opción...</option>
                            </select>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                            <select name="estructura" id="estructura" class="form-control selectpicker" value="{{old('estructura')}}" required="required">
                                <option>Seleccione una opción...</option>
                            </select>
                            <div class="col-sm-3 col-xs-12">
                                <select name="decorativo" id="decorativo" class="form-control selectpicker" value="{{old('decorativo')}}" required="required">
                                    <option>Seleccione una opción...</option>
                                </select>
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