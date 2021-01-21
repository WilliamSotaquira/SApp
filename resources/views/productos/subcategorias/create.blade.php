@extends ('layouts.base')
@section ('contenido')

<section class="content-header">

  <h1>                  
    Menú de Personas
    <small>Version 2.0</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
    <li><a href="#">Clientes</a></li>
    <li><a href="{{route('clientes.personas.index')}}">Personas</a></li>
    <li class="active">Crear Nuevo Registro</li>
  </ol>
</section>

<section class="content">

  {!!Form::open(array('url'=>'clientes/personas/store','method'=>'POST','autocomplete'=>'off', 'files'=> true))!!}
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
      <div class="box-body">
        <div class="col-xs-12 col-sm-10 ">

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-xs-12 col-sm-3">Nombres</label>
                <div class="col-sm-9">
                  <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{old('name')}}" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="last_name" class="col-xs-12 col-sm-3">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="" value="{{old('last_name')}}" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-7">
             <div class="form-group">
              <label for="type_doc" class="col-xs-12 col-sm-6" >Tipo Documento</label>
              <div class="col-sm-6">
                <select id="type_doc" name="type_doc" class="form-control selectpicker" data-live-search="true" id="type_doc" required>
                  <option selected disabled="true">Seleccione &hellip;</option>                  
                  <option value="1">Cedula de Ciudadanía</option>
                  <option value="2">Cedula de Extranjería</option>     
                  <option value="3">Pasaporte</option>     
                </select>                                              
              </div>          
            </div>
          </div>
          <div class="col-xs-12 col-sm-5">
            <div class="form-group">
              <label for="document" class="col-xs-12 col-sm-5">N° Documento</label>
              <div class="col-sm-7">
                <input type="text" id="document" name="document" class="form-control" placeholder="" id="document" value="{{old('document')}}" >
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="email" class="col-xs-12 col-sm-3">Email</label>
              <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" placeholder="" id="email" value="{{old('email')}}" required>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="home_address" class="col-xs-12 col-sm-3">Dirección</label>
              <div class="col-sm-9">
                <input type="text" id="home_address" name="home_address" class="form-control" placeholder="" value="{{old('home_address')}}" required>
              </div>            
            </div>            
          </div>            
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="mobile" class="col-xs-12 col-sm-3">Telefono o Movil</label>
              <div class="col-sm-9">
               <input type="text" id="mobile" name="mobile" class="form-control" placeholder="" id="mobile" value="{{old('mobile')}}" required>
             </div>
           </div>
         </div>
       </div>

       <div class="row">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="phone" class="col-xs-12 col-sm-3">Telefono Auxiliar</label>
            <div class="col-sm-9">
             <input type="text" id="phone" name="phone" class="form-control" placeholder="" id="phone" value="{{old('phone')}}">
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

          <button class="btn btn-primary btn_end" type="submit" > Guardar </button>

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

          <input type="button" class="btn btn-danger btn_end" name="reset_form" value="Limpiar" onclick="this.form.reset();">

        </div>
        <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


          <a href="{{ URL::previous() }}" class="btn btn-info btn_end" id="back" >Atras</a><br>


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


