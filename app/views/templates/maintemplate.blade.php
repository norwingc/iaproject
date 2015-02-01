<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
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
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
	<section id="container" >		
      <!--header start-->
      <header class="header black-bg">
      	<div class="sidebar-toggle-box">
      		<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      	</div>
      	<!--logo start-->
      	<a href="{{ URL::to('/') }}" class="logo"><b>Sistema de Consulta a Pacientes - SCP</b></a>
      	<!--logo end-->
      	<div class="top-menu">
      		<ul class="nav pull-right top-menu">
      			<li><a class="logout" href="{{ URL::to('logout') }}">Cerrar Sesion</a></li>
      		</ul>
      	</div>
      </header>
      <!--header end-->
      
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
                          <li><a  href="{{ URL::to('usuarios/cuenta') }}">Cuenta</a></li>
                      </ul>
                  </li> 
                  <li>
                      <a href="{{ URL::to('estadisticas') }}" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Estatisticas</span>
                      </a>                      
                  </li>
                  <li class="sub-menu">
                       <a href="javascript:;" >
                          <i class="fa fa-user"></i>
                          <span>Usuarios</span>
                      </a>  
                      <ul class="sub">
                          <li><a  href="{{ URl::to('usuarios') }}">Agregar</a></li>
                          <li><a  href="{{ URl::to('usuarios/view') }}">Buscar</a></li>
                      </ul>                    
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
        @yield('contenido')
          
      </section>
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

  
  {{ HTML::script('js/jquery.js') }}
  {{ HTML::script('js/bootstrap.min.js') }}
  {{ HTML::script('js/jquery-ui-1.9.2.custom.min.js') }}
  {{ HTML::script('js/jquery.ui.touch-punch.min.js') }}
  {{ HTML::script('js/jquery.dcjqaccordion.2.7.js') }}
  {{ HTML::script('js/jquery.scrollTo.min.js') }}
  {{ HTML::script('js/jquery.nicescroll.js') }}
  
  {{ HTML::script('js/common-scripts.js') }}
  {{ HTML::script('js/jquery.mask.min.js') }}
  {{ HTML::script('js/main.js') }}

  {{ HTML::script('js/jquery.dataTables.min.js') }}
  {{ HTML::script('js/dataTables.bootstrap.js') }}

  
  
  @yield('js')

</body>
</html>