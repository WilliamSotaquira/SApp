@extends ('layouts.base')
@section ('contenido')
@include('comercial.cotizaciones.encabezado')


<section class="content">


  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Listado de Cotizaciones</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
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
          <h4><i class="icon fa fa-ban"></i> ¡Advertencia!</h4>
          {{session('danger')}}
        </div>
        @elseif(session()->has('warning'))
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> ¡Alerta!</h4>
          {{session('warning')}}
        </div>
        @endif

        <div class="row mt-1 justify-content-between align-items-center">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <center><a href="{{route ('comercial.cotizaciones.create')}}"><button class="btn btn-success">Nuevo Registro</button></a></center>
          </div>
          <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
            @include('comercial.cotizaciones.search')
          </div>

        </div>
        <div class="box-body">


          <div class="table-responsive">
            <table id="tbl_rol" class="table table-striped table-condensed table-hover">
              <thead>

                <th class="text-center">Nro.</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Cliente</th>
                <th>Ciudad</th>
                <th>Estado</th>
                <th>Asesor</th>
                <th style="width: 15%;" colspan="3">Opciones</th>

              </thead>

              <tfoot>

                <tr>

                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th colspan="3"></th>
                </tr>
              </tfoot>

              <tbody>
                @foreach($cotizaciones as $cot)
                <tr>
                  
                  <td class="text-center">COT{{$cot->idcotizacion}}</td>
                  <td>{{$cot->observaciones}}</td>
                  <td>
                    @switch($cot->type_user)
                    @case(0)
                    Persona Natural
                    @break
                    @case(1)
                    Persona Jurídica
                    @break
                    @default
                    @break
                    Sin información
                    @endswitch
                  </td>
                  <td>{{$cot->document}} | {{$cot->nameCli}} </td>
                  <td>{{$cot->city}}</td>
                  <td>{{$cot->estadoCotizacion}}</td>
                  <td>{{$cot->nameUs}} {{$cot->lastnUs}} </td>

                  <td>
                    <a href="{{route('comercial.cotizaciones.show',['id' => Crypt::encrypt($cot->idcotizacion)])}}" class="btn btn-sm btn-default"> Ver </a>
                  </td>
                  <td>
                    @can('comercial.edit')
                    <a href="{{route ('comercial.cotizaciones.edit',['id' => Crypt::encrypt($cot->idcotizacion)])}}" class="btn btn-sm btn-info"> Editar </a>
                    @endcan
                  </td>
                  <td>
                    <a data-target=" #modal-delete-{{$cot->idcotizacion}}" data-toggle="modal"><button class="btn btn-sm btn-danger">Eliminar</button></a>

                  </td>
                </tr>

                @endforeach
              </tbody>



            </table>
            {{$cotizaciones->render()}}

          </div>

        </div>
      </div>
    </div>

</section>

@endsection