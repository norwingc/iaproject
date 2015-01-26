<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Project IA">
	<meta name="author" content="Norwin Guerrero Cruz">

	<title> @yield('titulo') </title>

	<!-- Bootstrap core CSS -->
	{{ HTML::style('css/bootstrap.css') }}   
  {{ HTML::style('css/dataTables.bootstrap.css') }} 
	<!--external css-->
	{{ HTML::style('font-awesome/css/font-awesome.css') }} 
  {{ HTML::style('css/chosen.min.css') }} 
   


	<!-- Custom styles for this template -->
	{{ HTML::style('css/main.css') }}   
	{{ HTML::style('css/style.css') }}   
	{{ HTML::style('css/style-responsive.css') }}  
  {{ HTML::style('css/zabuto_calendar.css ') }}  
  



</head>
<body>
	<section id="container" >
		<!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
      	<div class="sidebar-toggle-box">
      		<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      	</div>
      	<!--logo start-->
      	<a href="{{ URL::to('/') }}" class="logo"><b>Sistema de consulta a pasientes - SCP</b></a>
      	<!--logo end-->
      	<div class="top-menu">
      		<ul class="nav pull-right top-menu">
      			<li><a class="logout" href="{{ URL::to('logout') }}">Cerrar Sesion</a></li>
      		</ul>
      	</div>
      </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside class="animar">
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="{{ URL::to('/') }}"><img src="{{asset('img/avatar.jpg')}}" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">{{ Auth::user()->username }}</h5>
              	  	
                  <li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-stethoscope"></i>
                          <span>Consultas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URL::to('consulta') }}">Agregar</a></li>
                          <li><a  href="{{ URL::to('consulta/view') }}">Buscar</a></li>                          
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                         <i class="fa fa-users"></i>
                          <span>Pasientes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{ URl::to('paciente') }}">Agregar</a></li>
                          <li><a  href="{{ URl::to('paciente/view') }}">Buscar</a></li>
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Configuracion</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="calendar.html">Cuenta</a></li>
                      </ul>
                  </li> 
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Estatisticas</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="morris.html">Morris</a></li>
                          <li><a  href="chartjs.html">Chartjs</a></li>
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
        @yield('contenido')
          
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2015 - Norwin Guerrero
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  	</section>

  <!-- js placed at the end of the document so the pages load faster -->
  {{ HTML::script('js/jquery.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js') }}
  {{ HTML::script('js/jquery.ui.touch-punch.min.js') }}
  {{ HTML::script('js/jquery.dcjqaccordion.2.7.js') }}
  {{ HTML::script('js/jquery.scrollTo.min.js') }}
  {{ HTML::script('js/jquery.nicescroll.js') }}

  

  <!--common script for all pages-->
  {{ HTML::script('js/common-scripts.js') }}
  {{ HTML::script('js/jquery.mask.min.js') }}
  {{ HTML::script('js/main.js') }}

  {{ HTML::script('js/jquery.dataTables.min.js') }}
  {{ HTML::script('js/dataTables.bootstrap.js') }}

  <!--script for this page-->
  
  @yield('js')
  


</body>
</html>