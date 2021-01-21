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
    <li class="active">Editar Registro </li>
  </ol>
</section>

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
      $id= Crypt::encrypt($consulta->id);
      ?>

      {!!Form::model($consulta,['method'=>'PUT','route'=>['clientes.personas.update',$id],'files'=>'true'])!!}
      {{Form::token()}}

      <div class="box-body"> 

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-10"> 

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="name" class="col-xs-12 col-sm-3">Nombres</label>
                <div class="col-sm-9">
                  <input type="text" id="name" name="name" class="form-control" placeholder="" value="{{$consulta->name}}" required>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12">
              <div class="form-group">
                <label for="last_name" class="col-xs-12 col-sm-3">Apellidos</label>
                <div class="col-sm-9">
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="" value="{{$consulta->last_name}}" required>
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

                  @switch($consulta->type_doc)

                  @case(1)
                  <option >Seleccione &hellip;</option>                  
                  <option value="1" selected>Cedula de Ciudadanía</option>
                  <option value="2">Cedula de Extranjería</option>     
                  <option value="3">Pasaporte</option>  
                  @break

                  @case(2)
                  <option>Seleccione &hellip;</option>                  
                  <option value="1">Cedula de Ciudadanía</option>
                  <option value="2" selected>Cedula de Extranjería</option>     
                  <option value="3">Pasaporte</option>  
                  @break

                  @case(2)
                  <option>Seleccione &hellip;</option>                  
                  <option value="1">Cedula de Ciudadanía</option>
                  <option value="2">Cedula de Extranjería</option>     
                  <option value="3"selected>Pasaporte</option>  
                  @break

                  @default
                  <option default>Seleccione &hellip;</option>                  
                  <option value="1">Cedula de Ciudadanía</option>
                  <option value="2">Cedula de Extranjería</option>     
                  <option value="3">Pasaporte</option>  
                  @break

                  @endswitch

                </select>                                              
              </div>          
            </div>
          </div>
          <div class="col-xs-12 col-sm-5">
            <div class="form-group">
              <label for="document" class="col-xs-12 col-sm-5">N° Documento</label>
              <div class="col-sm-7">
                <input type="text" id="document" name="document" class="form-control" placeholder="" id="document" value="{{$consulta->document}}" >
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="email" class="col-xs-12 col-sm-3">Email</label>
              <div class="col-sm-9">
                <input type="email" id="email" name="email" class="form-control" placeholder="" id="email" value="{{$consulta->email}}" required>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="home_address" class="col-xs-12 col-sm-3">Dirección</label>
              <div class="col-sm-9">
                <input type="text" id="home_address" name="home_address" class="form-control" placeholder="" value="{{$consulta->home_address}}" required>
              </div>            
            </div>            
          </div>            
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="mobile" class="col-xs-12 col-sm-3">Telefono o Movil</label>
              <div class="col-sm-9">
                <input type="text" id="mobile" name="mobile" class="form-control" placeholder="" id="mobile" value="{{$consulta->mobile}}" required>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="phone" class="col-xs-12 col-sm-3">Telefono Auxiliar</label>
              <div class="col-sm-9">
               <input type="text" id="phone" name="phone" class="form-control" placeholder="" id="phone" value="{{$consulta->phone}}">
             </div>
           </div>
         </div>
       </div>

        <div class="row">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="score" class="col-xs-12 col-sm-3">Puntuacion</label>
              <div class="col-sm-9">
               <input type="text" id="score" name="score" class="form-control" placeholder="" id="score" value="{{$consulta->score}}">
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

        <a href="{{ URL::previous() }}" class="btn btn-default btn_end" id="back" >Atras</a><br>


      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <input type="button" class="btn btn-info btn_end" name="reset_form" value="Recargar" onclick="this.form.reset();">


     </div>
     <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


      <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


    </div>
    <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

  </div>
</div>


{!!Form::close()!!}
</div>
</div>

</section>
@endsection