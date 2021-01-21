@extends ('layouts.base')
@section ('contenido')
@include('comercial.cotizaciones.encabezado')
@include('comercial.cotizaciones.seleccion')


<section class="content">
  <div class="row">

  {!!Form::open(array('url'=>'comercial/cotizaciones/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

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

    <div class="col-md-6 order-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">1. Crear Cotización</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>


        <div class="box-body" id="formularios">
          <div class="container-fluid ">
            <div class="row">
              <div class="col-md-12">

                <div class="row">

                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                      <label for="ridClientes">Cliente</label>
                      <select name="ridClientes" id="ridClientes" class="form-control selectpicker" data-size="6" data-live-search="true" value="{{old('tipo_recurso')}}" required="required">
                        <option value="0" selected disabled>Seleccione una opción...</option>
                        @foreach($clientes as $cli)
                        <option value="{{$cli->id}}_{{$cli->type_user}}_{{$cli->name}}_{{$cli->city}}_{{$cli->mobile}}_{{$cli->home_address}}">{{$cli->document}} | {{$cli->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-xs-12 col-md-6">
                    <div class="form-group">
                      <label for="RidUser">Asesor</label>
                      <select name="RidUser" class="form-control selectpicker" data-size="6" data-live-search="true" id="RidUser" value="{{old('RidUser')}}" required="required">

                        <option selected="selected" disabled>Seleccione una opción...</option>
                        @foreach($usuarios as $user)
                        <option value="{{$user->id}}">{{$user->name}} {{$user->last_name}}</option>
                        @endforeach

                      </select>
                    </div>
                  </div>


                </div>

                <div class="row">
                  <div class="col-xs-12 col-sm-12">
                    <div class="form-group">
                      <label for="Robservaciones">Descripción <small>(Opcional)</small></label>
                      <textarea name="Robservaciones" id="Robservaciones" class="form-control" rows="3" placeholder="Breve información de la cotización" value="{{old('Robservaciones')}}"></textarea>
                    </div>
                  </div>
                </div>

              </div>




            </div>
          </div>
        </div>
        <div class="box-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 text-right">
                <button type="button" class="btn btn-success" id="btn_showProyecto">Continuar</button>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="box box-default" id="addProyecto">
        <div class="box-header with-border">
          <h3 class="box-title">2. Crear Proyecto</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
              <i class="fa fa-minus"></i>
            </button>
          </div>
        </div>
        <div class="clearfix">
          <div class="box-body">
            <div class="container-fluid">

              <div class="row">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="RtipoProyecto">Tipo Proyecto</label>
                    <select name="RtipoProyecto" id="RtipoProyecto" class="form-control selectpicker" data-size="6" data-live-search="true" value="{{old('tipo_recurso')}}" >
                      <option value="1" selected>Cocina</option>
                      <option value="2">Baño</option>
                      <option value="3">Piso</option>
                      <option value="4">Cortinas</option>
                      <option value="5">Grupo</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row d-inline ml-5">
                <div class="col-xs-12 col-sm-12 col-lg-6">


                  <div class="form-group">
                    <label for="RnombreProyecto">Nombre Proyecto</label>
                    <input type="text" id="RnombreProyecto" name="RnombreProyecto" class="form-control" placeholder="Nombre del proyecto" value="{{old('RnombreProyecto')}}" >
                  </div>

                  <div class="form-group">
                    <label for="RtelContacto">Teléfono</label>
                    <input type="phone_us" id="RtelContacto" name="RtelContacto" class="form-control phone_us" placeholder="" value="{{old('RtelContacto')}}" >
                  </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-lg-6">

                  <div class="form-group">
                    <label for="Rdireccion">Dirección</label>
                    <input type="text" id="Rdireccion" name="Rdireccion" class="form-control" placeholder="" value="{{old('Rdireccion')}}" >
                  </div>

                  <div class="form-group">
                    <label for="Rciudad">Ciudad</label>
                    <input type="text" id="Rciudad" name="Rciudad" class="form-control" placeholder="" value="{{old('Rciudad')}}" >
                  </div>

                </div>

              </div>




            </div>

          </div>
          <div class="box-footer">
            <div class="container-fluid">
              <div class="row text-right">
                <button type="button" class="btn btn-default" id="btn_auto">Autocompletar</button>
                <button type="button" class="btn btn-default" id="btn_limpiar">Limpiar</button>
                <button type="button" class="btn btn-success" id="btn_insertar">Continuar</button>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="col-md-6 order-xs-12">


      <div class="box box-solid" id="Dtbl_proyectos">
        <div class="box-header with-border">
          <i class="fa fa-arrow-circle-right"></i>

          <h3 class="box-title">Tabla Proyectos</h3>
        </div>
        <div class="box-body table-responsive-md">
          <div>
          </div>
          <table class="table table-bordered table-sm" id="tbl_proyectos">
            <tr>
              <th style="width: 25%;">Opciones</th>
              <th>#</th>
              <th>Nombre del proyecto</th>
              <th>Ciudad</th>
            </tr>
          </table>


        </div>
        <div class="box-footer text-right" id="guardar">
          <button type="submit" class="btn btn-success">Guardar y Continuar</button>
        </div>
      </div>
    </div>

  {!!Form::close()!!}
  </div>




</section>
@endsection

@section('scripts')
<script>
  var s1 = 0;
  var s2 = 0;
  var cont = 0;


  $(document).ready(function() {


    $('#addProyecto').hide();
    $('#addAlzado').hide();
    $('#Dtbl_proyectos').hide();
    $('#guardar').hide();


    // $('#modal-seleccion').modal('toggle');

    $('#btn_showProyecto').click(function() {
      varificarSeleccion1();
    });

    $('#btn_auto').click(function() {
      attrProyecto();

    });


    $('#btn_limpiar').click(function() {
      clearForm();
      console.log('hola');
    });


    $('#btn_insertar').click(function() {
      // agregarProyecto();
      agregar();
    })
  });

  $(document).ready(function() {
    $('#ridClientes').change(function() {
      attrProyecto();
      s1++;
      console.log(s1);

    })
  })

  $(document).ready(function() {
    $('#RidUser').change(function() {
      s2++;
      console.log(s2);

    })
  })


  $(document).ready(function() {
    $('#GoCliente').click(function() {
      antiguo();


    });
  });

  function varificarSeleccion1(params) {
    if (s1 > 0 && s2 > 0) {
      $('#addProyecto').show();

    } else {
      alert('Complete la selección')
    }


  }

  function modalSeleccion() {
    $('#myModal').on('shown.bs.modal', function() {
      $('#myInput').trigger('focus')
    })
  }



  function clearForm() {

    $("#RnombreProyecto").val('');
    $("#RtelContacto").val('');
    $("#Rdireccion").val('');
    $("#Rciudad").val('');
    $("#RtipoProyecto").val('default').selectpicker("refresh");
  }

  function agregarProyecto() {

    $("#addAlzado").show();

    var select = document.getElementById('ridClientes').value.split('_');
    var idClientes = select[0];

    var Robservaciones = $('#Robservaciones').val();
    var RidUser = $('#RidUser').val();
    var RnombreProyecto = $('#RnombreProyecto').val();
    var RtelContacto = $('#RtelContacto').val();
    var Rdireccion = $('#Rdireccion').val();
    var Rciudad = $('#Rciudad').val();
    var RtipoProyecto = $('#RtipoProyecto').val();
    var _token = '{{csrf_token()}}';

    var datos = {
      _token: _token,
      Robservaciones: Robservaciones,
      RidClientes: idClientes,
      RidUser: RidUser,
      RnombreProyecto: RnombreProyecto,
      RtelContacto: RtelContacto,
      Rciudad: Rciudad,
      Rdireccion: Rdireccion,
      RtipoProyecto: RtipoProyecto,
    };

    // console.log(datos);

    // if (datos === null) {
    //   console.log('Sin datos');
    // } else {
    //   // console.log(datos);
    //   $.ajax({
    //     type: 'post',
    //     url: "{{route('api.storeProyecto')}}",
    //     data: datos,
    //   }).done(function(data) {
    //     // console.log(datos);
    //   }).fail(function(data) {
    //     console.log('error');
    //   });
    // }

  }

  function attrProyecto() {
    // alert('Auntocompletado');

    var select = document.getElementById('ridClientes').value.split('_');
    // console.log(select);
    id = select[0];
    type_user = select[1];
    name = select[2];
    city = select[3];
    mobile = select[4];
    home_address = select[5];
    console.log(id + " " + type_user + " " + name + " " + city + " " + mobile + " " + home_address);

    $("#RnombreProyecto").val(name);
    $("#Rdireccion").val(home_address);
    $("#RtelContacto").val(mobile);
    $("#Rciudad").val(city);

  }

  function agregar() {

    let i = cont + 1;

    let RidClientes = $('#RidClientes').val();
    let Robservaciones = $('#Robservaciones').val();
    let RidUser = $('#RidUser').val();
    let RnombreProyecto = $('#RnombreProyecto').val();
    let RtelContacto = $('#RtelContacto').val();
    let Rdireccion = $('#Rdireccion').val();
    let Rciudad = $('#Rciudad').val();
    let RtipoProyecto = $('#RtipoProyecto').val();
    let RfechaEntrada = $('#RtipoProyecto').val();
    let _token = '{{csrf_token()}}';

    let datos = {
      _token: _token,
      Robservaciones: Robservaciones,
      RidClientes: RidClientes,
      RidUser: RidUser,
      RnombreProyecto: RnombreProyecto,
      RtelContacto: RtelContacto,
      Rciudad: Rciudad,
      Rdireccion: Rdireccion,
      RtipoProyecto: RtipoProyecto,
    };

    $('#Dtbl_proyectos').show();
    console.log(datos);


    if (RtipoProyecto != "" && RnombreProyecto != "" && RtelContacto != "" && Rdireccion != "" && Rciudad != "") {

      var fila = '<tr class="selected" id="fila' + cont + '"><td class="d-flex text-center"><button type="button" class="btn btn-sm btn-danger" onclick="eliminar(' + cont + ');">Eliminar</button></td><td>' + i + '</td><td><input type="hidden" name="tipoProyecto[]" value="' + RtipoProyecto + '"><input type="hidden" name="nombreProyecto[]" value="' + RnombreProyecto + '"><input type="hidden" name="direccion[]" value="' + Rdireccion + '"><input type="hidden" name="telContacto[]" value="' + RtelContacto + '">' + RnombreProyecto + '</td><td><input type="hidden" name="ciudad[]" value="' + Rciudad + '">' + Rciudad + '</td></tr>';
      $('#tbl_proyectos').append(fila);

      cont++;
      i++;
      clearForm();

      $("#guardar").show();

    } else {
      alert("Error al agregar proyectos, revise el formulario y complete los datos");
      if (cont === 0) {
        $('#Dtbl_proyectos').hide();
      }
    }
    // }
  }

  function eliminar(index) {
    if (cont === 1) {

      $("#Dtbl_proyectos").hide();
      $("#fila" + index).remove();
      cont--;

      clearForm();

    } else {

      $("#fila" + index).remove();
      cont--;

      clearForm();

    }
  }
</script>

@endsection




<!-- <div class="box-footer " id="guardar">
//       <div class="container-fluid">
//         <div class="row-bottons">
//           <div class="col-sm-12">
//             <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
//             <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

//               <button class="btn btn-primary btn_end" type="submit"> Guardar </button>

//             </div>
//             <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

//               <button type="button" class="btn btn-danger btn_end" id="resetBtn">Limpiar</button>


//             </div>
//             <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

//               <a href="{{ URL::previous()}}" class="btn btn-info btn_end" id="back">Atrás</a><br>

//             </div>
//             <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

//           </div>
//         </div>
//       </div>
//     </div> -->