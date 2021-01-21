<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel" style="height: auto;">
      <div class="pull-left image">
        <img src="{{asset('user/user160X160.png')}}" class="img-circle" alt="IMG">
      </div>

      <div class="pull-right info">
        <p style="margin-bottom: 0px;">{{Auth::user()->name}}</p>
        <p style="color:#999999;"><small>{{Auth::user()->last_name}}</small></p>
      </div>

    </div>
    <!-- / Sidebar user panel -->

    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Buscar...">
        <span class="input-group-btn">
          <button type="submit" name="search" id="search-btn" class="btn btn-flat">
            <i class="fa fa-search"></i>
          </button>
        </span>
      </div>
    </form>
    <!-- /.search form -->

    <!------------------------------------------------------------------------------------------------------------------------------------>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MENU DE NAVEGACION </li>

      <!-- Menu de Proyectos-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder-open"></i> <span>Menú Proyectos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          <li><a href="{{route('proyectos.proyectos.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Proyectos</a></li>
          <li><a href="{{route('proyectos.proyectos.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Alzados</a></li>
          <li><a href="{{route('proyectos.proyectos.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Novedades</a></li>
        </ul>
      </li>

      <!-- Menu de Cotizaciones-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-briefcase"></i> <span>Menú comercial</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          <li><a href="{{route('comercial.cotizaciones.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Cotizaciones</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i>Facturas</a></li>
        </ul>
      </li>

      <!-- Menú de productos   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-shopping-basket"></i> <span>Menú Productos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">

          <li><a href="{{route('comercial.cotizaciones.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Productos</a></li>
          <li><a href="{{route('productos.categorias.index')}}" title=""><i class="fa fa-dot-circle-o"></i>Categorías</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i>SubCategorías</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i>Marcas</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i>Proveedores</a></li>
        </ul>
      </li>

      <!-- Menú de Servicios-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->
      @can('servicio.menu')
      <li class="treeview">
        <a href="#" title="Menu de los Archivos">
          <i class="fa fa-gears"></i><span>Menú de servicios</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ route('servicios.actividades.index') }}"><i class="fa fa-dot-circle-o"></i>Actividades</a></li>
          <li><a href="{{route('servicios.tareas.index')}}"><i class="fa fa-dot-circle-o"></i>Tareas</a></li>
          <li><a href="{{route('servicios.recursos.index')}}"><i class="fa fa-dot-circle-o"></i>Recursos</a></li>
        </ul>
      </li>
      @endcan
      <!-- Menú de Servicios   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->


      <!-- Menu de Clientes-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#" title="Menu de los Clientes">
          <i class="fa fa-group"></i><span>Menú de Clientes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">


          <li class="active"><a href="{{ route('clientes.clientes.index') }}"><i class="fa fa-dot-circle-o"></i>Personas</a></li>

        </ul>
      </li>

      <!-- Menú de Clientes   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <!-- Menu de Archivos-->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#" title="Menu de los Archivos">
          <i class="fa fa-archive"></i><span>Menú de Archivos</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">


          <li class="active"><a href="#"><i class="fa fa-dot-circle-o"></i> Archivos</a></li>
          <li class="active"><a href="#" title=""><i class="fa fa-dot-circle-o"></i> Inventario</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i> Categorías</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i> SubCategorías</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i> Marcas</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i>Asignación de<br>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;SubCategorías a Marca</a></li>
          <li><a href="#" title=""><i class="fa fa-dot-circle-o"></i> Bodegas</a></li>
        </ul>
      </li>

      <!-- Menú de Archivos   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->
      <!-- Menú de Seguridad -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->

      <li class="treeview">
        <a href="#">
          <i class="fa fa-lock"></i> <span>Seguridad</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">


          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i>Roles
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li><a href="{{ route('seguridad.roles.index') }}"><i class="fa fa-arrow-circle-right"></i>Menú Roles</a></li>
              <li><a href="{{ route('seguridad.roluser.index') }}"><i class="fa fa-arrow-circle-right"></i><strong>Roles de usuarios</strong> </a></li>

            </ul>
          </li>


          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i>Permisos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route ('seguridad.permisos.index')}}"><i class="fa fa-arrow-circle-right"></i>Menú Permisos</a></li>
              <li><a href="{{route ('seguridad.permisosroles.index')}}"><i class="fa fa-arrow-circle-right "></i><strong>Permisos a roles</strong></a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-dot-circle-o"></i>Usuarios
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{route('seguridad.users.index')}}"><i class="fa fa-dot-circle-o"></i> Menú de Usuarios</a></li>
              <li><a href="{{route('seguridad.permisosusuarios.index')}}"><i class="fa fa-arrow-circle-right"></i><strong>Permisos a usuarios</strong></a></li>
            </ul>
          </li>

        </ul>
      </li>

      <!-- Menú de Archivos   -->
      <!-- ------------------------------------------------------------------------------------------------------------------------ -->






    </ul>
    <!-- / sidebar menu   -->
  </section>
</aside>

<!------------------------------------------------------------------------------------------------------------------------------------>