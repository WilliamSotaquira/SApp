<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> Weirdoware </title>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.css') }}">  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <script src="https://use.fontawesome.com/fd6220c6dc.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/AdminLTE.css') }}">
  <!-- Smoke -->
  <link rel="stylesheet" href="{{asset('smoke-v3.1.1/css/smoke.css')}}" >
  <!-- Bootstrap Select -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
  page. However, you can choose any other skin. Make sure you
  apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('almasaeed2010/adminlte/dist/css/skins/skin-black.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--   [if lt IE 9]> -->
  <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
    <!--   <![endif] -->
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Icono de Sidecol  -->
    <link rel="icon" type="image/png" href="/images/logos/logo16x16.png" />
    <!-- Diseño de los botones de navegación -->
    <link rel="stylesheet" type="text/css" href="{{asset ('css/img.css')}}">


  </head>

  <!-- Este es el cuerpo de la pagina SIDECOL -->
  <body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">

     <header class="main-header">

      <!-- Logo -->
      <a href="{{ route('home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img class="responsive  img-fluid mx-auto d-block" src="{{asset ('images/logos/logo14x22.png')}}"></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><img class="responsive  img-fluid mx-auto d-block" src="{{asset('images/logos/logo2_89x25.png')}}"></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">



    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{asset('../images/user/user1_160x160.png')}}" class="user-image" alt="User Image">
        <span class="hidden-xs"><strong>{{Auth::user()->name}} {{Auth::user()->apellidos}}</strong></span>
      </a>
      <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
          <img src="{{asset('../images/user/user1_160x160.png')}}" class="img-circle" alt="User Image">

          <p>{{Auth::user()->name}} {{Auth::user()->apellidos}}<br><small> <strong>  Web Developer </strong></small>
            <small>Miembro desde Nov. 2018</small>
          </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
          <div class="row">
            <div class="col-xs-6 text-center">
              <a href="#">Mi actividad</a>
            </div>
            <div class="col-xs-6 text-center">
              <a href="#">Ayuda</a>
            </div>
          </div>
          <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
          <div class="pull-left">
            <a href="#" class="btn btn-primary btn-flat" >Mi Perfil</a>
          </div>


          <div class="pull-right">
            <a href="{{url('/logout')}}"  class="btn btn-danger btn-flat">Cerrar Sesión </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>

          </div>

        </li>
      </ul>
    </li>

  </ul>
</div>
</nav>

</header>
<!------------------------------------------------------------------------------------------------------------------------------------->

@include('treemenu')

<!------------------------------------------------------------------------------------------------------------------------------------->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      403 Pagina no autorizada
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">403 - Sin Acceso</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="error-page">
      <h2 class="headline text-red"> 403</h2>

      <div class="error-content">
        <h3><i class="fa fa-warning text-red"></i> ¡Oops! Acción no autorizada.</h3><br>


        <p>
          Si ha perdido alguna función contacte al administrador...<br>
          <a href="{{route('home')}}">O Regrese al escritorio aqui...</a> 
          
        </p>


      </div>
      <!-- /.error-content -->
    </div>
    <!-- /.error-page -->
  </section>



</div>
<footer class="main-footer">
 <div class="pull-right hidden-xs">
  <b>Version</b> 2.4.0
</div>
<center>
  <strong>Copyright &copy; 2018 <a href="https://adminlte.io">Weirdoware</a>.</strong> All rights
  reserved.
</center>
</footer>
</div>


<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<!-- <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('almasaeed2010/adminlte/dist/js/adminlte.min.js') }}"></script>
<!-- Smoke -->
<script src="{{asset('smoke-v3.1.1/js/smoke.min.js')}}"></script>
<script src="{{asset('smoke-v3.1.1/lang/es.min.js')}}"></script>
<!-- Bootstrap Select -->
<!-- Latest compiled and minified JavaScript -->
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>


@yield('scripts')

</body>
</html>