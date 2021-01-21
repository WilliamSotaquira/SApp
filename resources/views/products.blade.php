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
                                    <a class="nav-link text-light zoom" href="#nosotros">Nosotros</a>
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

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->

        <script src="{{asset('jQuery-Mask-Plugin-master/jQuery-Mask-Plugin-master/src/jquery.mask.js')}}"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>