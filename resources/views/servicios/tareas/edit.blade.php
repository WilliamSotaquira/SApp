@extends ('layouts.base')
@section ('contenido')
@include('servicios.tareas.encabezado')



<section class="content">

  <?php 
  $id= Crypt::encrypt($tareas->idtarea);
  ?>

  {!!Form::model($tareas,['method'=>'PUT','route'=>['servicios.tareas.update',$id],'files'=>'true'])!!}
  {{Form::token()}}


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

    <div class="box-body">
      <div class="col-xs-12 col-sm-8">

        <div class="row"> 
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="idactividad" class="col-xs-12 col-sm-3 control-label">Actividad</label>
              <div class="col-sm-5">
                <select name="idactividad" class="form-control selectpicker" data-size="6" data-live-search="true" id="idactividad"  value="{{$tareas->idactividad}}" required="required">

                  <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                  <?php 
                  $referencia = "";
                  ?>


                  @foreach($actividades as $actividad)


                  @switch($actividad->referencia)

                  @case(1)
                  <?php 
                  $referencia = 'Diseño y desarrollo Web';
                  ?>
                  @break

                  @case(2)
                  <?php 
                  $referencia = 'Diseño y Desarrollo de software';
                  ?>
                  @break

                  @case(3)
                  <?php 
                  $referencia = 'Mantenimiento de computadores y periféricos';
                  ?>
                  @break

                  @case(4)
                  <?php 
                  $referencia = 'Mantenimiento Web';
                  ?>
                  @break

                  @case(5)
                  <?php 
                  $referencia = 'Soporte Técnico';
                  ?>
                  @break

                  @case(6)
                  <?php 
                  $referencia = 'Servicio Técnico';
                  ?>
                  @break

                  @case(7)
                  <?php  
                  $referencia = 'Diseño Gráfico';
                  ?>
                  @break

                  @case(8)
                  <?php  
                  $referencia = 'Otros';
                  ?>
                  @break

                  @default
                  <?php  
                  $referencia = 'Sin información';
                  ?>
                  @break

                  @endswitch 

                  @if($tareas->idactividad == $actividad->idactividad)  
                  <option selected="selected" value="{{$actividad->idactividad}}">{{$referencia}} | {{$actividad->actividad}}: {{$actividad->descripcion}}</option>
                  @else
                  <option value="{{$actividad->idactividad}}">{{$referencia}} | {{$actividad->actividad}}: {{$actividad->descripcion}}</option>
                  @endif

                  @endforeach

                </select>
              </div>
            </div>
          </div>
        </div>  

        <div class="row" >
          <div class="col-xs-12 col-sm-12">
            <div class="form-group ">
              <label for="tarea" class="col-xs-12 col-sm-3">Nombre tarea</label>
              <div class="col-sm-9">
                <input type="text" id="tarea" name="tarea" class="form-control" placeholder="Nombre de la tarea &hellip;" value="{{$tareas->tarea}}" required>
              </div>            
            </div>            
          </div>            
        </div> 

        <div class="row ">
          <div class="col-xs-12 col-sm-12">
            <div class="form-group">
              <label for="descripcion" class="col-xs-12 col-sm-3 control-label">Descripción</label>
              <div class="col-sm-9">
               <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descrición y fuciones de la actividad." value="{{$tareas->descripcion}}" required>{{$tareas->descripcion}}</textarea>
             </div> 
           </div> 
         </div> 
       </div> 

       <div class="row" >
        <div class="col-xs-12 col-sm-12">
          <div class="form-group ">
            <label for="duracion" class="col-xs-12 col-sm-3">Duración</label>
            <div class="col-sm-5">
              <div class="input-group">
                <input type="text" id="duracion" name="duracion" class="form-control hours" placeholder="Duracion en horas &hellip;" value="{{$tareas->duracion}}" required>
                <span class="input-group-addon">Horas</span>
              </div>


            </div>            
          </div>            
        </div>            
      </div>            

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="tipo_tarea" class="col-xs-12 col-sm-3 control-label">Prioridad tarea</label>
            <div class="col-sm-5">
              <select name="tipo_tarea" class="form-control selectpicker" data-size="6" data-live-search="true" id="tipo_tarea"  value="{{$tareas->tipo_tarea}}" required="required">

                @switch($tareas->tipo_tarea)

                @case(1)
                <option selected value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
                <option value="4">Especial</option>
                <option value="5">Otro</option>
                @break

                @case(2)
                <option value="1">Baja</option>
                <option selected value="2">Media</option>
                <option value="3">Alta</option>
                <option value="4">Especial</option>
                <option value="5">Otro</option>
                @break
                
                @case(3)
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option selected value="3">Alta</option>
                <option value="4">Especial</option>
                <option value="5">Otro</option>
                @break
                
                @case(4)
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
                <option selected value="4">Especial</option>
                <option value="5">Otro</option>
                @break
                
                @case(5)
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
                <option value="4">Especial</option>
                <option selected value="5">Otro</option>
                @break
                
                @default    
                <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                <option value="1">Baja</option>
                <option value="2">Media</option>
                <option value="3">Alta</option>
                <option value="4">Especial</option>
                <option value="5">Otro</option>
                @break

                @endswitch


              </select>
            </div>
          </div>
        </div>
      </div> 

      <div class="row"> 
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="estado_tarea" class="col-xs-12 col-sm-3 control-label">Prioridad tarea</label>
            <div class="col-sm-5">
              <select name="estado_tarea" class="form-control selectpicker" data-size="6" data-live-search="true" id="estado_tarea" required="required">

                @switch($tareas->estado_tarea)

                @case(1)
                <option selected value="1">Activado</option>
                <option value="2">Desactivado</option>
                @break

                @case(2)
                <option value="1">Activado</option>
                <option selected value="2">Desactivado</option>
                @break

                @default
                <option selected="selected" disabled="disabled">Seleccione una opción...</option>
                <option value="1">Activado</option>
                <option value="2">Desactivado</option>
                @break

                @endswitch

              </select>
            </div>
          </div>
        </div>
      </div>  


    </div>
  </div>


</div>

<div class="box-footer " id="guardar">
  <div class="row">
    <div class="col-sm-12">

      <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">

        <a href="{{route('servicios.tareas.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <a href="{{route('servicios.tareas.edit',$tareas->idactividad)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

     </div>
     <div class="col-xs-12 col-sm-4 col-lg-2 text-center"  style="padding-bottom: 5px; padding-top: 5px">


      <button class="btn btn-danger btn_end" type="submit" > Guardar </button>


    </div>
    <div class="col-xs-0 col-sm-0 col-lg-3 text-center" style="padding-bottom: 5px; padding-top: 5px"></div>

  </div>

</div>


</div>

</div>
{!!Form::close()!!}
</section>
@endsection
@section('scripts')
<link rel="stylesheet" type="text/css" href="{{asset ('css/img.css')}}">
<script>


  $(function() {

    // We can attach the `fileselect` event to all file inputs on the page
    $(document).on('change', ':file', function() {
      var input = $(this),
      numFiles = input.get(0).files ? input.get(0).files.length : 1,
      label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
      input.trigger('fileselect', [numFiles, label]);
    });

    // We can watch for our custom `fileselect` event like this
    $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

        var input = $(this).parents('.input-group').find(':text'),
        log = numFiles > 1 ? numFiles + ' files selected' : label;

        if( input.length ) {
          input.val(log);
        } else {
          if( log ) alert(log);
        }

      });
    });


  });      
</script>
<script>


  $(window).load(function(){

   $(function() {
    $('#file-input').change(function(e) {
      addImage(e); 
    });

    function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;

      if (!file.type.match(imageType))
       return;

     var reader = new FileReader();
     reader.onload = fileOnload;
     reader.readAsDataURL(file);
   }

   function fileOnload(e) {
    var result=e.target.result;
    $('#imgSalida').attr("src",result);
  }
});
 });

</script>
<script>

  $('#preview').hover(
    function() {
      $(this).find('a').fadeIn();
    }, function() {
      $(this).find('a').fadeOut();
    }
    )
  $('#file-select').on('click', function(e) {
   e.preventDefault();

   $('#image').click();
 })

  $('input[type=file]').change(function() {
    var file = (this.files[0].name).toString();
    var reader = new FileReader();

    $('#file-info').text('');
    $('#file-info').text(file);

    reader.onload = function (e) {
     $('#preview img').attr('src', e.target.result);
   }

   reader.readAsDataURL(this.files[0]);
 });

</script>


@endsection

