@extends ('layouts.base')
@section ('contenido')

@include('productos.categorias.breadcrumb')

<section class="content">

  {!!Form::open(array('url'=>'productos/categorias/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
  {{ csrf_field() }}

  <div class="box box-primary">

    <div class="box-header with-border">
      <h3 class="box-title">Agregar Nuevo Registro</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
      </div>
    </div>

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


    <div class="container-fluid">
      <div class="box-body d-flex">
        <div class="col-xs-12 col-md-6 m-auto justify-content-center">

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="categoria" class="col-xs-12 col-sm-3">Categoría</label>
                <div class="col-sm-9">
                  <input type="text" id="categoria" name="categoria" class="form-control" placeholder="" value="{{old('categoria')}}" required>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="box-footer " id="guardar">
      <div class="container-fluid">
        <div class="row-bottons">
          <div class="col-sm-12">
            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <button class="btn btn-primary btn_end" type="submit"> Guardar </button>

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <input type="button" class="btn btn-danger btn_end" name="reset_form" value="Limpiar" onclick="this.form.reset();">

            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


              <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back">Atras</a><br>


            </div>
            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

          </div>
        </div>
      </div>
    </div>
  </div>

  {!!Form::close()!!}

</section>

@endsection