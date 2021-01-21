@extends ('layouts.base')
@section ('contenido')
@include('comercial.cotizaciones.encabezado')
@include('comercial.cotizaciones.seleccion')


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

        {{ csrf_field() }}
<section class="content">
  <div class="row">

    <div class="col-sm-6 order-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Agregar Nuevo Registro</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>


        <div class="box-body" id="formularios">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-xs-12 col-md-6 ">

                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="RidClientes">Cliente</label>
                      <select name="RidCliente" id="RidCliente" class="form-control selectpicker" data-size="6" data-live-search="true" value="{{old('tipo_recurso')}}" required="required">
                        <option value="0" selected>Seleccione una opción...</option>
                        @foreach($clientes as $cli)
                        <option value="{{$cli->id}}_{{$cli->type_user}}_{{$cli->name}}_{{$cli->city}}_{{$cli->mobile}}_{{$cli->home_address}}">{{$cli->document}} | {{$cli->name}}</option>
                        @endforeach
                      </select>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-6 ">

                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="users_id">Asesor</label>
                      <select name="users_id" class="form-control selectpicker" data-size="6" data-live-search="true" id="users_id" value="{{old('users_id')}}" required="required">

                        <option selected="selected">Seleccione una opción...</option>
                        @foreach($usuarios as $user)
                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="descripcion">Descripción <small>(Opcional)</small></label>
                  <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Breve información de la cotización" value="{{old('descripcion')}}"></textarea>
                </div>
              </div>
            </div>

          </div>

        </div>
      </div>

      <div class="box box-default" id="addAlzado">
        <div class="box-header with-border">
          <h3 class="box-title">Datos de Proyecto</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
          <div class="clearfix">
            <div class="box-body">
              <div class="container-fluid">

                <div class="row d-inline ml-5">
                  <div class="col-xs-12 col-sm-12 col-lg-6">


                    <div class="form-group">
                      <label for="nombreProyecto">Nombre Proyecto</label>
                      <input type="text" id="nombreProyecto" name="nombreProyecto" class="form-control" placeholder="Nombre del proyecto" value="{{old('nombreProyecto')}}" required="required">
                    </div>

                    <div class="form-group">
                      <label for="telContacto">Teléfono</label>
                      <input type="text" id="telContacto" name="telContacto" class="form-control" placeholder="" value="{{old('telContacto')}}" required="required">
                    </div>

                  </div>

                  <div class="col-xs-12 col-sm-12 col-lg-6">

                    <div class="form-group">
                      <label for="direccion">Dirección</label>
                      <input type="text" id="direccion" name="direccion" class="form-control" placeholder="" value="{{old('direccion')}}" required="required">
                    </div>

                    <div class="form-group">
                      <label for="ciudad">Ciudad</label>
                      <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="" value="{{old('ciudad')}}" required="required">
                    </div>

                  </div>

                </div>
                <div class="row">
                  <div class="col-sm-7">
                    <div class="form-group">
                      <label for="tipoProyecto">Tipo Proyecto</label>
                      <select name="tipoProyecto" id="tipoProyecto" class="form-control selectpicker" data-size="6" data-live-search="true" value="{{old('tipo_recurso')}}" required="required">
                        <option value="1" selected>Cocina</option>
                        <option value="2">Baño</option>
                        <option value="3">Piso</option>
                        <option value="4">Cortinas</option>
                        <option value="5">Grupo</option>
                      </select>
                    </div>
                  </div>
   
                </div>



              </div>

            </div>
          </div>
      </div>
    </div>

    <div class="col-sm-6 order-xs-12">

      <div class="box box-info" id="addAlzado">
        <div class="box-header with-border">
          <h3 class="box-title">Componentes</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>

        <div class="clearfix">
          <div class="box-body">
            <div class="container-fluid">

              <label for="definicion">Definición</label>
              <div class="input-group input-group-sm">
                <input type="text" class="form-control" name="definicion" id="definicion" placeholder="Ejemplo: Alzado 1, Muebles Isla, etc..">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-success btn-flat" id="agregarAlzado">Agregar</button>
                </span>
              </div>


            </div>
          </div>

        </div>
      </div>


      <div class="box box-solid" id="tbl_alzados">
        <div class="box-header with-border">
          <i class="fa fa-arrow-circle-right"></i>

          <h3 class="box-title">Alzados</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>Identificador</th>
              <th style="width: 50%">Opciones</th>
            </tr>
            <tr>
              <td>1.</td>
              <td>Update software</td>
              <td>
                <div class="text-center">
                  <button class="btn btn-sm btn-default">Agregar Mueble</button>
                  <button class="btn btn-sm btn-default">Agragar Electro</button>
                </div>
              </td>
            </tr>

          </table>

        </div>
        <!-- /.box-body -->
      </div>
    </div>

  </div>











</section>
@endsection

@section('scripts')

<script>
  $(document).ready(function() {

    $('#tbl_alzados').hide();
    $('#tbl_alzados').hide();

    $('#modal-seleccion').modal('toggle');

    $('#resetBtn').click(function(params) {
      clearForm();
    });



    $('#agregarAlzado').click(function(params) {
      agregarAlzado();
    })
  });

  $(document).ready(function() {
    $('#RidCliente').change(function() {
      attrProyecto();
    })
  })


  $(document).ready(function() {
    $('#GoCliente').click(function() {
      antiguo();


    });
  });

  function modalSeleccion() {
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  }



  function clearForm() {
    // clearForm();

    $('#btn_crear').show();
    $("#users_id").val('default').selectpicker("refresh");
    $("#idCliente").val('default').selectpicker("refresh");
    $("#descripcion").val('');
  }


  function attrProyecto() {
    // alert('Auntocompletado');

    var select = document.getElementById('RidCliente').value.split('_');
    // console.log(select);
    id = select[0];
    type_user = select[1];
    name = select[2];
    city = select[3];
    mobile = select[4];
    home_address = select[5];
    console.log(id + " " + type_user + " " + name + " " + city + " " + mobile + " " + home_address);

    $("#nombreProyecto").val(name);
    $("#direccion").val(home_address);
    $("#ciudad").val(city);
    $("#telContacto").val(mobile);
  }

  function agregarAlzado() {

    $("#tbl_alzados").show();

    var detalle = $('#definicion').val();
    var token = '{{csrf_token()}}';
    var datos = {
      detalle: detalle,
      token: token
    };
    console.log(datos);

    $.ajax({
      type: 'post',
      url: "{{route('api.storeAlzado')}}",
      data: datos,
    }).done(function(data) {
      console.log("Llego");
    }).fail(function(data) {
      console.log('error');
    });

  }

</script>

@endsection




<!-- <div class="box-footer " id="guardar">
      <div class="container-fluid">
        <div class="row-bottons">
          <div class="col-sm-12">
            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <button class="btn btn-primary btn_end" type="submit"> Guardar </button>

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <button type="button" class="btn btn-danger btn_end" id="resetBtn">Limpiar</button>


            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <a href="{{ URL::previous()}}" class="btn btn-info btn_end" id="back">Atrás</a><br>

            </div>
            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

          </div>
        </div>
      </div>
    </div> -->