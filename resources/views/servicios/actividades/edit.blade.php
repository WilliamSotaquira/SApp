@extends ('layouts.base')
@section ('contenido')
@include('servicios.actividades.encabezado')



<section class="content">

  <?php 
  $id= Crypt::encrypt($actividades->idactividad);
  ?>

  {!!Form::model($actividades,['method'=>'PUT','route'=>['servicios.actividades.update',$id],'files'=>'true'])!!}
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
            <label for="referencia" class="col-xs-12 col-sm-3 control-label">Tipo Referencia</label>
            <div class="col-sm-5">
              <select name="referencia" class="form-control selectpicker" data-size="6" data-live-search="true" id="referencia"  value="{{old('referencia')}}" required="required">


                $actividades->referencia

                @switch($actividades->referencia)


                @case(1)
                <option value="1" selected="selected">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>               
                @break                

                @case(2)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2" selected="selected">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>               
                @break                

                @case(3)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3" selected="selected">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>              
                @break                

                @case(4)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4" selected="selected">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>                
                @break          

                @case(5)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5" selected="selected">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>
                
                @break                
                @case(6)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6" selected="selected">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>                
                @break                

                @case(7)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7" selected="selected">Diseño Gráfico</option>
                <option value="8">Otros</option>                
                @break                

                @case(8)
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8" selected="selected">Otros</option>
                @break

                @default
                <option selected="selected" disabled="disabled">Seleccione una opción...</option>                
                <option value="1">Diseño y desarrollo Web</option>
                <option value="2">Diseño y Desarrollo de software</option>
                <option value="3">Mantenimiento de computadores y periféricos</option>
                <option value="4">Mantenimiento Web</option>
                <option value="5">Soporte Técnico</option>
                <option value="6">Servicio Técnico</option>
                <option value="7">Diseño Gráfico</option>
                <option value="8">Otros</option>
                @break

                @endswitch


              </select>
            </div>
          </div>
        </div>
      </div>   

      <div class="row" >
        <div class="col-xs-12 col-sm-12">
          <div class="form-group ">
            <label for="actividad" class="col-xs-12 col-sm-3">Referencia Actividad</label>
            <div class="col-sm-9">
              <input type="text" id="actividad" name="actividad" class="form-control" placeholder="Nombre de la actividad &hellip;" value="{{$actividades->actividad}}" required>
            </div>            
          </div>            
        </div>            
      </div>            

      <div class="row ">
        <div class="col-xs-12 col-sm-12">
          <div class="form-group">
            <label for="descripcion" class="col-xs-12 col-sm-3 control-label">Descripción</label>
            <div class="col-sm-9">
             <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Descrición y fuciones de la actividad." value="{{$actividades->descripcion}}" required>{{$actividades->descripcion}}</textarea>
           </div> 
         </div> 
       </div> 
     </div> 

     <div class="row"> 
      <div class="col-xs-12 col-sm-12">
        <div class="form-group">
          <label for="idrecurso" class="col-xs-12 col-sm-3 control-label">Recurso</label>
          <div class="col-sm-5">
            <select name="idrecurso" class="form-control selectpicker" data-size="6" data-live-search="true" id="idrecurso"  value="{{old('idrecurso')}}" required="required">

              @if($actividades->idrecurso == null)|

              <option selected="selected" disabled="disabled">Sin información, seleccione una opción...</option>  
              @foreach($recursos as $recurso)
              <option value="{{$recurso->idrecurso}}">{{$recurso->idrecurso}} | {{$recurso->recurso}}: {{$recurso->descripcion}}</option>
              @endforeach

              @else

              @foreach($recursos as $recurso)
              @if($actividades->idrecurso == $recurso->idrecurso)
              <option value="{{$recurso->idrecurso}}" selected="selected">{{$recurso->idrecurso}} | {{$recurso->recurso}}: {{$recurso->descripcion}}</option>
              @else
              <option value="{{$recurso->idrecurso}}">{{$recurso->idrecurso}} | {{$recurso->recurso}}: {{$recurso->descripcion}}</option>
              @endif
              @endforeach
              @endif


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

        <a href="{{route('servicios.actividades.index')}}" class="btn btn-info btn_end" id="back" >Atras</a><br>

      </div>
      <div class="col-xs-12 col-sm-4 col-lg-2 text-center" style="padding-bottom: 5px; padding-top: 5px">


       <a href="{{route('servicios.actividades.edit',$actividades->idactividad)}}" class="btn btn-default btn_end" id="back" >Limpiar</a><br>

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

