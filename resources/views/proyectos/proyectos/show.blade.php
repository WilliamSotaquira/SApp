@extends ('layouts.base')
@section ('contenido')

@include('proyectos.proyectos.breadcrumb')
@include('proyectos.proyectos.novedades')

<section class="content clearfix">


  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-star"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Ultimas Novedades</span>
          <span class="info-box-number">En desarrollo</span>
          <span class="info-box-text text-right">
            <a href="#" data-target="#modal-novedades-{{$proyectos->idproyecto}}" data-toggle="modal"><button id="btn_novedad" class="btn btn-sm btn-default">Ver Más</button></a>
          </span>

        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa  fa-check"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Completado (ED)</span>
          <span class="info-box-number">En desarrollo</span>
          <span class="info-box-text text-right"><a href="#" class="btn btn-default">Ver Más</a></span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-exclamation"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">Alertas</span>
          <span class="info-box-number">En desarrollo</span>
          <span class="info-box-number text-right">
            <a href="{{route('proyectos.novedades.show',['id' => Crypt::encrypt($proyectos->idproyecto)])}}" class="btn btn-sm btn-default">Ver Más</a>
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-remove"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">advertencias (ED)</span>
          <span class="info-box-number">En desarrollo</span>
          <span class="info-box-text text-right"><a href="#" class="btn btn-default">Ver Más</a></span>
        </div>
      </div>
    </div>

  </div>
  <!-- /.row -->



  <div class="row">
    <div class="col-md-6">

      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Generalidades del Registro</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>

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
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{session('danger')}}
          </div>
          @elseif(session()->has('warning'))
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
            {{session('warning')}}
          </div>
          @endif
        </div>


        <div class="box-body">
          <div class="container-fluid">

            <div class="row d-inline ml-5">
              <div class="col-xs-12 col-sm-12 col-lg-6">
                <div class="clearfix">

                  <div class="form-group ml-3">
                    <label for="tipoProyecto">Tipo Proyecto</label>
                    <input type="text" class="form-control" id="tipoProyecto" name="tipoProyecto" value="{{$proyectos->tipoProyecto}}" disabled>
                  </div>


                  <div class="form-group">
                    <label for="nombreProyecto">Nombre Proyecto</label>
                    <input type="text" id="nombreProyecto" name="nombreProyecto" class="form-control" placeholder="Nombre del proyecto" value="{{$proyectos->nombreProyecto}}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" id="direccion" name="direccion" class="form-control" placeholder="" value="{{$proyectos->direccion}}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="telContacto">Teléfono</label>
                    <input type="text" id="telContacto" name="telContacto" class="form-control" placeholder="" value="{{$proyectos->telContacto}}" disabled>
                  </div>

                  <div class="form-group">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" class="form-control" placeholder="" value="{{$proyectos->ciudad}}" disabled>
                  </div>


                  <div class="form-group">
                    <label for="estado">Estado Proyecto</label>
                    <input type="text" id="estado" name="estado" class="form-control" placeholder="" value="{{$proyectos->estadoProyecto}}" disabled>
                  </div>

                </div>



              </div>

              <div class="col-xs-12 col-sm-12 col-lg-6">

                <div class="form-group">
                  <label for="created_at">Fecha de creación</label>
                  <input type="text" id="created_at" name="created_at" class="form-control" placeholder="" id="created_at" value="{{$proyectos->created_at}}" disabled="disabled">
                </div>


                <div class="form-group">
                  <label for="fechaPlano">Firma de Planos</label>
                  <input type="text" id="fechaPlano" name="fechaPlano" class="form-control" placeholder="" id="fechaPlano" value="{{$proyectos->fechaPlano}}" disabled="disabled">
                </div>


                <div class="form-group">
                  <label for="fechaRectificacion">Fecha de Rectificación</label>
                  <input type="text" id="fechaRectificacion" name="fechaRectificacion" class="form-control" placeholder="" id="fechaRectificacion" value="{{$proyectos->fechaRectificacion}}" disabled="disabled">
                </div>

                <div class="form-group">
                  <label for="fechaEntrada">Entrada del Proyecto</label>
                  <input type="text" id="fechaEntrada" name="fechaEntrada" class="form-control" placeholder="" id="fechaEntrada" value="{{$proyectos->fechaEntrada}}" disabled="disabled">
                </div>

                <div class="form-group">
                  <label for="updated_at">Ultima actualización</label>
                  <input type="text" id="updated_at" name="updated_at" class="form-control" placeholder="" id="updated_at" value="{{$proyectos->updated_at}}" disabled="disabled">
                </div>

                <div class="form-group">
                  <label for="fechaCierre">Fecha de Cierre</label>
                  <input type="text" id="fechaCierre" name="fechaCierre" class="form-control" placeholder="" id="fechaCierre" value="{{$proyectos->fechaCierre}}" disabled="disabled">
                </div>

              </div>

            </div>

          </div>
        </div>

        <div class="box-footer">
          <div class="container-fluid">
            <div class="row m-auto">

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
                <!-- <a href="{{ URL::previous() }}" class="btn btn-md btn-default btn_end" id="back">Atrás</a> -->
                <a href="{{route('clientes.clientes.edit',['id' => Crypt::encrypt($proyectos->idproyecto)])}}" class=" m-5 btn btn-md btn-warning">Modificar</a>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>

    <?php
    $i = 1;
    ?>

    @foreach($alzados as $alz)

    <div class="col-md-6">

      <div class="row">

      </div>

      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-arrow-circle-right"></i>

          <h3 class="box-title">Alzado {{$i}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Definición </dt>
            <dd class="text-uppercase"><strong>{{$alz->definicion}}</strong></dd>


            @foreach($muebles as $mue)

            @if($alz->idalzados === $mue->idalzados)

            <dt>Mueble

              @switch($mue->tipoMueble)
              @case (1)
              Alto
              @break
              @case(2)
              Bajo
              @break
              @default
              Sin información
              @break
              @endswitch
              # {{$mue->idmueble}}:

            </dt>

            <dd>Estructura: ({{$mue->estructura}}), Decorativo: ({{$mue->decorativo}}).</dd>
            @endif


            @endforeach


            <dt>Agregados:</dt>
            @foreach($productos as $pro)


            @if($pro->idalzados === $alz->idalzados)
            <dd>
              ({{$pro->cantidad}}){{$pro->referencia}}.
            </dd>
            @endif

            @endforeach



            <dd class="text-right"><a href="{{route('proyectos.alzados.show',['id' => Crypt::encrypt($alz->idalzados)])}}" class="btn btn-default">Ver Más</a></dd>
          </dl>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <?php
    $i++;
    ?>

    @endforeach

  </div>
</section>
<script>
  $(document).ready(function() {
    estadoproyecto();
    tipoproyecto();

  });


  function estadoproyecto() {

    var estado = $("#estado").val();

    switch (estado) {
      case '0':
        $('#estado').val('Con retraso');
        break;
      case '1':
        $('#estado').val('En ejecución');
        break;
      case '2':
        $('#estado').val('Completado');
        break;
      case '3':
        $('#estado').val('Aplazado');
        break;
      case '4':
        $('#estado').val('Cancelado');
        break;
      default:
        $('#estado').val('Sin información - Información Errada');
        break;
    }
  }

  function tipoproyecto() {

    var tipo = $("#tipoProyecto").val();

    switch (tipo) {
      case '1':
        $('#tipoProyecto').val('Cocina');
        break;
      case '2':
        $('#tipoProyecto').val('Baño');
        break;
      case '3':
        $('#tipoProyecto').val('Piso');
        break;
      case '4':
        $('#tipoProyecto').val('Cortinas');
        break;
      case '5':
        $('#tipoProyecto').val('Grupo');
        break;
      default:
        $('#tipoProyecto').val('Otros');
        break;

    }
  }
</script>

@endsection