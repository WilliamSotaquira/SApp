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

    <div class="bg-dark">
        <div class="container-fluid">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="/">
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
                                <a class="nav-link text-light zoom" href="/">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light zoom" href="{{route('products')}}">Productos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light zoom" href="#nosotros">Nosotros</a>
                            </li>

                        </ul>
                        <form class=" form-inline my-2 my-lg-0 d-flex justify-content-center align-items-xs-center zoom" action="{{route('login')}}">
                            <button type="submit" class="btn my-2 my-sm-0 btn-wdw btn-access" href="{{route('login')}}">Acceder</button>
                        </form>

                    </div>
                </div>

            </nav>

        </div>
    </div>





    <div class="container-fluid bg-light">
        <div class="p-5">

            {!!Form::open(array('url'=>'clientes/contactos/consulta','method'=>'POST', 'action'=>'/verify', 'autocomplete'=>'off', 'files'=> true))!!}
            {{ csrf_field() }}
            <div id="contact_us_id">
                <div class="row">
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


</html>