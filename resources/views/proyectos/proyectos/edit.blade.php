@extends ('layouts.base')
@section ('contenido')

@include('productos.categorias.breadcrumb')

<section class="content">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Editar Registro</h3>
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



    <div class="container">

      <?php
      $idcategoria = Crypt::encrypt($categorias->idcategoria);
      ?>

      {!!Form::model($categorias,['method'=>'PUT','route'=>['productos.categorias.update',$idcategoria],'files'=>'true'])!!}
      {{Form::token()}}

      <div class="box-body">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10">

            <div class="row">
              <div class="col-xs-12 col-sm-12">
                <div class="form-group">
                  <label for="categoria" class="col-xs-12 col-sm-3">Categoría</label>
                  <div class="col-sm-9">
                    <input type="text" id="categoria" name="categoria" class="form-control" placeholder="" value="{{$categorias->categoria}}" required>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="row">
          <div class="col-sm-12" style="padding-top: 10px; ">

            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

              <a href="{{ URL::previous() }}" class="btn btn-default btn_end" id="back">Atrás</a><br>


            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


              <input type="button" class="btn btn-info btn_end" name="reset_form" value="Recargar" onclick="this.form.reset();">


            </div>
            <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


              <button class="btn btn-danger btn_end" type="submit"> Guardar </button>


            </div>
            <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

          </div>
        </div>


        {!!Form::close()!!}
      </div>
    </div>

</section>
@endsection