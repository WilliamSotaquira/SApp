@extends ('layouts.base')
@section ('contenido')

@include('proyectos.novedades.breadcrumb')

<section class="content clearfix">
    <div class="container-fluid">
        <div class="row">

            @foreach($eventos as $eve)

            @if($eve->estadoEvento === 1)

            @switch ($eve->tipoEvento)
            @case(1)
            @break

            @case (2)

            <div class="col-xs-12 col-md-3">
                <div class="box box-solid box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Firma de contrato</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">2021/01/12</span>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{$eve->descripcion}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <span class="info-box-text text-right">
                            <a href="#" class="btn btn-sm btn-default">Aceptar</a>
                        </span>
                    </div>
                </div>
            </div>

            @break
            @case (3)

            <div class="col-xs-12 col-md-3">
                <div class="box box-solid box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Firma de planos</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">2021/01/12</span>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{$eve->descripcion}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <span class="info-box-text text-right">
                            <a href="#" class="btn btn-sm btn-default">Aceptar</a>
                        </span>
                    </div>
                </div>
            </div>
            @break
            @case (4)

            <div class="col-xs-12 col-md-3">
                <div class="box box-solid box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Rectificación</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                            <span class="label label-primary">2021/01/12</span>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        {{$eve->descripcion}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <span class="info-box-text text-right">
                            <a href="#" class="btn btn-sm btn-default">Aceptar</a>
                        </span>
                    </div>
                </div>
            </div>


            @break
            @case (5)
            Despiece
            @break
            @case (6)
            Producción
            @break
            @case (7)
            Ensamble
            @break
            @case (8)
            Instalación
            @break
            @case (9)
            Cierre
            @break
            @case (10)
            Completado
            @break
            @case (11)
            En espera
            @break
            @case (12)
            Aplazado
            @break
            @case (13)
            Cancelado
            @break
            @default:
            Sin información - Información Errada
            @break;
            @endswitch



            @endif



            @endforeach

            @foreach($productos as $pro)
            @if($pro->estadoDProducto === 6)
            <div class="col-xs-12 col-md-3">
                <div class="box box-solid box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Producto con retraso</h3>
                        <div class="box-tools pull-right">
                            <!-- Buttons, labels, and many other things can be placed here! -->
                            <!-- Here is a label for example -->
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <span>{{$pro->created_at}}</span>
                        {{$pro->referencia}}
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <span class="info-box-text text-right">
                            <a href="#" class="btn btn-sm btn-default">Aceptar</a>
                        </span>
                    </div>
                </div>
            </div>


            @endif
            @endforeach


        </div>
    </div>

</section>

@endsection