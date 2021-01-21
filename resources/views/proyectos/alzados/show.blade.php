@extends ('layouts.base')
@section ('contenido')

@include('proyectos.proyectos.breadcrumb')

<section class="content clearfix">
  <div class="container-fluid">
    <div class="row">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-list-alt"></i>

          <h3 class="box-title">Descripción del alzado</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt>Identificador:</dt>
            <dd>{{$alzados->idalzados}}</dd>
            <dt>observaciones:</dt>
            <dd>{{$alzados->observaciones}}</dd>
            <dt>Fecha de creación:</dt>
            <dd>{{$alzados->created_at}}</dd>
            <dt>Ultima Actualización:</dt>
            <dd>{{$alzados->updated_at}}</dd>
            <br>
            <dt>Pertenece al proyecto:</dt>
            <dd>{{$proyectos->nombreProyecto}} - {{$proyectos->ciudad}}</dd>
          </dl>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <i class="fa fa-table"></i>
          <h3 class="box-title">Descripción Muebles</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->

        @if(!empty($muebles))

        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>Tipo</th>
              <th>Estructura</th>
              <th>Decorativo</th>
              <th>Grosor Fondo</th>
              <th>Panel Inferior</th>
              <th>Ancho</th>
              <th>Alto</th>
              <th>Profundo</th>
              <th>Cant.</th>
              <th>Vr.Unidad</th>
              <th>Vr.Total</th>
              <th>Opciones</th>
            </tr>
            @foreach($muebles as $mue)
            <tr>
              <td>{{$mue->idmueble}}</td>
              <td>
                @switch($mue->tipoMueble)

                @case(1)
                Módulo inferior
                @break

                @case(2)
                Módulo superior
                @break

                @case(3)
                Módulo torre
                @break

                @case(4)
                Decorativo inferior
                @break

                @case(5)
                Decorativo superior
                @break

                @case(6)
                Decorativo torre
                @break

                @case(7)
                Decorativo superior esquinero
                @break

                @case(8)
                Lateral inferior
                @break

                @case(9)
                Lateral superior
                @break

                @case(10)
                Lateral torre
                @break

                @case(11)
                Esquina inferior
                @break

                @case(12)
                Esquina superior
                @break

                @case(13)
                Esquina torre
                @break

                @case(14)
                Lámina decorativa
                @break

                @case(15)
                Tablero de listones
                @break

                @default
                Sin información
                @break

                @endswitch
              </td>
              <td>{{$mue->estructura}}</td>
              <td>{{$mue->decorativo}}</td>
              <td>
                @if($mue->panelFondo == 0)
                3mm
                @else
                6mm RH
                @endif
              </td>
              <td>
                @if($mue->panelInferior == 0)
                No
                @else{
                Sí
                }
                @endif

              </td>
              <td>{{$mue->ancho}}mm</td>
              <td>{{$mue->alto}}mm</td>
              <td>{{$mue->profundo}}mm</td>
              <td>{{$mue->cantidad}}</td>
              <td>{{$mue->precioUnidad}}</td>
              <td>{{$mue->totalMuebles}}</td>
              <td class="text-center m-auto">
                <a href="#" class="btn btn-sm btn-default"> Ver </a>
                <a href="#" class="btn btn-sm btn-info"> Editar </a>
                <a href="" data-target=" #modal-delete-{{$mue->idmueble}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Desactivar</button></a>
              </td>
            </tr>
            @endforeach

          </table>
        </div>
        @endif

        <!-- /.box-body -->

      </div>
      <!-- /.box -->
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <i class="fa fa-table"></i>
          <h3 class="box-title">Productos Adicionales</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>


        <div class="box-body table-responsive">
          <table class="table table-bordered">
            <tr>
              <th style="width: 10px">#</th>
              <th>Referencia</th>
              <th>Descripción</th>
              <th>Cant.</th>
              <th>Factor Medida</th>
              <th>Marca</th>
              <th>Grupo</th>
              <th>Estado</th>
              <th>Opciones</th>
            </tr>
            @foreach($productos as $pro)
            <tr>
              <td>{{$pro->idproducto}}</td>
              <td>{{$pro->referencia}}</td>
              <td>{{$pro->descripcion}}</td>
              <td>{{$pro->cantidad}}</td>
              <td>
                @switch($pro->factorMedida)
                @case(1)
                Unidad
                @break
                @case(2)
                Metro Lineal
                @break
                @case(3)
                Metro Cuadrado
                @break
                @endswitch
              </td>
              <td>{{$pro->marca}}</td>
              <td>{{$pro->categoria}} - {{$pro->subcategoria}}</td>
              <td>
                @switch($pro->estadoDProducto)
                @case(0)
                <span style="color: red; "><strong>CON RETRASO</strong></span>

                @break
                @case(1)
                En reserva
                @break
                @case(2)
                En pedido
                @break
                @case(3)
                En bodega
                @break
                @case(4)
                Agotado
                @break
                @case(5)
                Descontinuado
                @break
                @case(6)
                Sin pedido
                @break
                @default
                Sin información
                @break
                @endswitch
              </td>
              <td class="text-center m-auto">
                <a href="#" class="btn btn-sm btn-default"> Ver </a>
                <a href="#" class="btn btn-sm btn-info"> Editar </a>
                <a href="" data-target=" #modal-delete-{{$mue->idmueble}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Desactivar</button></a>
              </td>
            </tr>
            @endforeach
          </table>
        </div>

      </div>
    </div>
  </div>
</section>

@endsection