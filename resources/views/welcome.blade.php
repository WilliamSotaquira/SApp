<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{asset ('twbs/bootstrap/dist/css/styles.css')}}">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
  <link rel="icon" type="image/png" href="icons/icono.png" />


  <!-- Scripts -->
  <script src="{{asset('/js/app.js')}}"></script>
  <script src="{{asset('/js/jQuery-2.1.4.min.js')}}"></script>

  {!! GoogleReCaptchaV3::render(['contact_us_id'=>'contact_us', 'signup_id'=>'signup']) !!}

  <title>Weirdoware</title>
</head>

<body>

  <header class="header" id="inicio">

    <div class="bg-dark">
      <div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
          <a class="navbar-brand" href="#inicio">
            <span class="logo-mini">
              <img class="responsive  img-fluid mx-auto d-block zoom" src="{{asset ('/icons/Logo5.png')}}">
            </span>
          </a>
          <button class="navbar-toggler btn-wdw" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="container">
            <div class="collapse navbar-collapse navg" id="navbarNavAltMarkup">
              <ul class="navbar-nav  ml-auto mr-2">

                <li class="nav-item">
                  <a class="nav-link text-light zoom" href="{{route('products')}}">Productos</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light zoom" href="{{route('about')}}">Nosotros</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light zoom" href="{{route('contacto')}}">Contacto</a>
                </li>
              </ul>
              <form class="form-inline my-2  my-lg-0 d-flex justify-content-center align-items-xs-center zoom" action="{{route('login')}}">
                <button type="submit" class="btn my-2 my-sm-0 btn-wdw btn-access" href="{{route('login')}}">Acceder</button>
              </form>

            </div>
          </div>

        </nav>

      </div>
    </div>

    <!-- Contenedor Wrapper-->
    <div class="container-fluid parallax " id="sec1">
      <div class="row">
        <div class="col-sm-6">
          <div class="jumbotron m-sm-5 m-xs-2 mt-5">
            <h1 class="display-4 ">Piénsalo,</h1>
            <h1 class="display-5">nosotros lo hacemos. </h1>
            <p class="lead"></p>
            <hr class="my-4">
            <p>Desarrollamos soluciones creativas ajustadas a tus necesidades.</p>
            <!-- <a class="btn btn-info btn-lg" href="#" role="button">Learn more</a> -->
          </div>
        </div>



      </div>

    </div>
    <!--     
    <div class="parallax" id="sec1" data-depth="1">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 red-wdw">

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 red-wdw">
          <div class="jumbotron jumbotron-fluid align-items-center">
            <div class="container-fluid">
              <h1 class="display-4">Fluid jumbotron</h1>
              <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <div>
      <div class="feature-wrapper bg-light p-sm-5">
        <div class="container ">
          <div class="row">

            <div class="col-xs-12 col-sm-1 d-flex justify-content-center p-3 align-items-xs-center zoom">
              <i class="fa fa-arrows-alt fa-2x"></i>
            </div>
            <div class="col-xs-12 col-sm-3 zoom">
              <h4>Adaptable</h4>
              <p>Diseño adaptable, mantiene su proyecto a la vanguardia permitiéndole ser visitado desde cualquier dispositivo.</p>
            </div>

            <div class="col-xs-12 col-sm-1 d-flex justify-content-center p-3 align-items-xs-center zoom">
              <i class="fa fa-thumbs-o-up fa-2x"></i>
            </div>
            <div class="col-xs-12 col-sm-3 zoom">
              <h4>Popular y seguro</h4>
              <p>Código interpretado por el servidor, salvaguardada la información vital para su actividad, Apache y MVC incorporan las tecnologías más populares y de bajo costo.</p>
            </div>

            <div class="col-xs-12 col-sm-1 d-flex justify-content-center p-3 align-items-xs-center zoom">
              <i class="fa fa-leaf fa-2x"></i>
            </div>
            <div class="col-xs-12 col-sm-3 zoom">
              <h4>Elegante y simple</h4>
              <p>Código limpio y de fácil interpretación permite crecimiento modular en su proyecto, ademas, es de fácil mantenimiento.</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="parallax" id="sec2">

      <div class="container-fluid" id="nosotros">
        <div class="row">
          <div class="col-sm-7 col-xs-12">
          </div>
          <div class="col-sm-5 col-xs-12 d-flex justify-content-center p-5 align-items-center text-light zoom" id="image-intro">
            <div>
              <h3 class="text-center ">ACERCA DE NOSOTROS</h3 class="text-center ">
              <div>
                <br>
                <h5 class="text-danger">
                  <center>¡Piénsalo, nosotros lo hacemos!</center>
                </h5>

                <p class="font-italic">Hacemos secuencias de instrucciones que contribuyen a que el mundo se mantenga en orden.</p>
                <br>
                <p>Somos una empresa colombiana dedicada al diseño y desarrollo de sistemas informáticos a la medida y alcance de todos. Nuestra filosofía se fundamenta en el COMPROMISO, CORRESPONDENCIA, AGILIDAD, RESPETO y CALIDAD. </p>

                <p class="text-center font-italic">"El verdadero progreso es el que pone la tecnología al alcance de todos".<br> Henry Ford (1863-1947).</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </header>

  <div class="container-fluid bg-light pt-5" id="productos">
    <div class="text-center text-dark d-flex justify-content-center align-items-center">
      <h3>Productos</h3>
    </div>
  </div>

  <div class="container-fluid bg-light">
    <div class="p-5">

      <div class="row row-cols-1 row-cols-md-3">
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/daniel-korpai-aJuYqm0gFGo-unsplash.jpg" class="card-img-top" alt="Photo by Daniel Korpai on Unsplash">
            <div class="card-body">
              <h5 class="card-title">DISEÑO Y DESARROLLO RESPONSIVO</h5>
              <p class="card-text">Con técnicas adecuadas garantizamos la efectiva y correcta visualización de contenidos, sin importar el dispositivo electrónico usted y sus clientes podrán acceder fácilmente a su sitio web.</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/IMG_20200116_122329%7E2.jpg" class="card-img-top" alt="william_sotaquira">
            <div class="card-body">
              <h5 class="card-title">DESARROLLO DE SOFTWARE</h5>
              <p class="card-text">Aplicaciones informáticas simples o robustas realizadas a su medida, la solución ideal para lo que no encuentra en el mercado</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/true-agency-o4UhdLv5jbQ-unsplash.jpg" class="card-img-top" alt="Photo by True Agency on Unsplash">
            <div class="card-body">
              <h5 class="card-title">MANTENIMIENTO WEB</h5>
              <p class="card-text">
                <center><strong>¿Sus productos se encuentran actualizados, organizados y bien presentados?<br>¿Es fácil de navegar?<br>¿Su información esta segura?</strong></center><br> Estas son tareas fundamentales para su pagina web y específicamente para para su negocio. Mediante los procedimientos adecuados mantendremos su sitio web a punto, representara agilidad, calidad y seguridad.
              </p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/patrick-lindenberg-1iVKwElWrPA-unsplash.jpg" class="card-img-top" alt="Photo by Patrick Lindenberg on Unsplash">
            <div class="card-body">
              <h5 class="card-title">SERVICIO TÉCNICO</h5>
              <p class="card-text"><strong>
                  <center>Evite que su computador se vuelva lento, pausado y pesado.</center>
                </strong><br> Contamos con personal altamente calificado que le brindara mantenimiento y reparación a sus equipos y periféricos.</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/proxyclick-visitor-management-system-wsHvGRpT8Eo-unsplash.jpg" class="card-img-top" alt="Photo by Proxyclick Visitor Management System on Unsplash">
            <div class="card-body">
              <h5 class="card-title">SOPORTE TÉCNICO</h5>
              <p class="card-text">Lo guiamos en el proceso tecnológico de puesta a punto de sus equipos de computo, garantizando esa parte fundamental del desarrollo y funcionamiento de su organización.</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card h-100 zoom">
            <img src="images/edho-pratama-T6fDN60bMWY-unsplash.jpg" class="card-img-top" alt="Photo by Edho Pratama on Unsplash">
            <div class="card-body">
              <h5 class="card-title">DISEÑO GRAFICO</h5>
              <p class="card-text">Traducimos sus ideas en mensajes de alta comunicación visual permitiendo que su organización se mantenga a la vanguardia de las tendencias.</p>
            </div>
          </div>
        </div>


      </div>

      {!!Form::open(array('url'=>'clientes/contactos/consulta','method'=>'POST', 'action'=>'/verify', 'autocomplete'=>'off', 'files'=> true))!!}
      {{ csrf_field() }}
      <div id="contact_us_id">
        <div class="row" id="contacto">
          <div class="col-sm-12">
            <div class="card ">
              <div class="card-header">
                <h4>Contáctenos</h4>
              </div>
              <div class="card-body">
                <form>

                  <div class="row">
                    <div class="col-sm-12 col-lg-6">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Nombres</label>
                        <input type="text" name="nombres" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-sm-12 col-lg-6">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Apellidos</label>
                        <input type="text" name="apellidos" class="form-control" required>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Celular</label>
                        <input type="text" class="form-control mobile" name="celular" aria-describedby="emailHelp">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" required>
                        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más..</small>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="formGroupExampleInput">Servicio a consultar</label>
                        <select name="tipo_consulta" class="form-control selectpicker" required>
                          <option selected="selected" disabled="disabled">Seleccione una opción de la lista.</option>
                          <option value="1">1. Diseño y desarrollo responsivo.</option>
                          <option value="2">2. Desarrollo de software.</option>
                          <option value="3">3. Mantenimiento WEB.</option>
                          <option value="4">4. Servicio técnico.</option>
                          <option value="5">5. Soporte técnico.</option>
                          <option value="6">6. Diseño gráfico.</option>
                          <option value="7">7. Otra consulta.</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="validationTextarea">Descripción</label>
                        <textarea class="form-control " name="descripcion" id="validationTextarea" required></textarea>
                        <div class="invalid-feedback">
                          Por favor ingrese una descripción.
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-12">
                    <div class="form-group form-check">
                      <input type="checkbox" name="conforme" class="form-check-input" id="exampleCheck1" required="required">
                      <label class="form-check-label" for="exampleCheck1">He leído y acepto los Términos y condiciones: *</label>
                    </div>
                  </div>
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-wdw align-items-center">Enviar</button>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

      {!!Form::close()!!}

    </div>
  </div>
  <!-- Footer -->
  <footer class="py-3 bg-dark">

    <div id="menu" class="container-fluid">
      <div id="row" class="row ">

        <div class="col-sm-5">
          <div class="d-flex align-items-center justify-content-center text-light text-left t ">
            <ul class="list-unstyled">

              <li><i class="fa fa-home" style="color: #b1b2b6;"></i>&nbsp;&nbsp;Kr 78a # 76a -23 sur, Bogotá - Colombia</li>
              <li><i class="fa fa-phone" style="color: #b1b2b6;"></i>&nbsp;&nbsp;Tel: (+57) 488 8577 </li>
              <li><i class="fa fa-mobile" style="color: #b1b2b6;"></i>&nbsp;&nbsp;&nbsp;Cel: 310 772 9885 </li>
              <li><i class="fa fa-envelope" style="color: #b1b2b6;"></i>&nbsp;&nbsp;<a href="weirdoware.sapp@gmail.com?subject=feedback" class="text-light bg-dark">weirdoware.sapp@gmail.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-2 text-center">
          <img class="responsive zoom" src="icons/Icono.png" alt="" width="100">
        </div>
        <div class="col-sm-5">
          <div class="d-flex align-items-center justify-content-center text-light text-right">
            <ul class="list-unstyled">
              <li>
                <p class="m-0">Copyright &copy; Weirdoware. 2020</p>
              </li>
              <li><a href="#" class="text-light bg-dark">Políticas de manejo de datos</a></li>
            </ul>
          </div>
        </div>

      </div>
    </div>

  </footer>

  <a href="" data-target="#modal-alert" data-toggle="modal" id="enlace"><button hidden="hidden" id="boton" name="boton"></button></a>
  @include('alert')

  @if(session()->has('success'))
  <script type="text/javascript">
    $(document).ready(function(e) {
      // Simular click
      $('#boton').click();
    });
  </script>
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
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->

  <script src="{{asset('jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/src/jquery.mask.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

<script type="text/javascript">
  $(document).ready(function() {


    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.mobile').mask('000 000 0000');
    $('.phone').mask('0000-0000');
    $('.phone_with_ddd').mask('(00) 0000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('.cnpj').mask('00.000.000/0000-00', {
      reverse: true
    });
    $('.money').mask('000.000.000.000.000', {
      reverse: true
    });
    $('.money2').mask("#.##0,00", {
      reverse: true
    });
    $('.hours').mask("##,0", {
      reverse: true
    });
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/,
          optional: true
        }
      }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {
      reverse: true
    });
    $('.clear-if-not-match').mask("00/00/0000", {
      clearIfNotMatch: true
    });
    $('.placeholder').mask("00/00/0000", {
      placeholder: "__/__/____"
    });
    $('.fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
    $('.selectonfocus').mask("00/00/0000", {
      selectOnFocus: true
    });
  });
</script>
<script>
  $(document).ready(function() {

    $('.carousel').carousel({
      interval: 20000
    });
  });
</script>

</html>