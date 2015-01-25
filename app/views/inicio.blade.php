@extends('templates.maintemplate')
@section('contenido')
<section class="wrapper">
	<div class="row">
		<div class="col-lg-9 main-chart">
	       	<h3>
				<i class="fa fa-angle-right"></i>
				Bienvenido {{ Auth::user()->usuariodoctor->nombre .' '. Auth::user()->usuariodoctor->apellido }}
			</h3>  
	      	<div class="row mtbox">
	      		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
          			<div class="box1">
			  			<span class="li_heart"></span>
			  			<h3>933</h3>
          			</div>
					<p>933 People liked your page the last 24hs. Whoohoo!</p>
	      		</div>
	      		<div class="col-md-2 col-sm-2 box0">
          			<div class="box1">
			  			<span class="li_cloud"></span>
			  			<h3>+48</h3>
          			</div>
		  			<p>48 New files were added in your cloud storage.</p>
	      		</div>
	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_stack"></span>
			  			<h3>23</h3>
	      			</div>
		      		<p>You have 23 unread messages in your inbox.</p>
	      		</div>
	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_news"></span>
			  			<h3>+10</h3>
	      			</div>
		        	<p>More than 10 news were added in your reader.</p>
	      		</div>
	      		<div class="col-md-2 col-sm-2 box0">
	      			<div class="box1">
			  			<span class="li_data"></span>
			  			<h3>OK!</h3>
	      			</div>
		  			<p>Your server is working perfectly. Relax & enjoy.</p>
	      		</div>
	      	</div>	
            <!-- END Imagnes primero -->
	              
	                  
	                  <div class="row mt">
	                  <!-- SERVER STATUS PANELS -->
	                  	{{-- primero --}}
	                  	<div class="col-md-4 col-sm-4 mb">
	                  		<div class="white-panel pn donut-chart">
	                  			<div class="white-header">
						  			           <h5>SERVER LOAD</h5>
	                  			</div>
	        								<div class="row">
	        									<div class="col-sm-6 col-xs-6 goleft">
	        										<p><i class="fa fa-database"></i> 70%</p>
	        									</div>
	                      		</div>
								            <canvas id="serverstatus01" height="120" width="120"></canvas>
	          								
	                      	</div><!-- /grey-panel -->
	                  	</div><!-- /col-md-4-->
	                  	
						{{-- segundo --}}
	                  	<div class="col-md-4 col-sm-4 mb">
	                  		<div class="white-panel pn">
	                  			<div class="white-header">
						  			<h5>TOP PRODUCT</h5>
	                  			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-heart"></i> 122</p>
									</div>
									<div class="col-sm-6 col-xs-6"></div>
	                      		</div>
	                      		<div class="centered">
										<img src="assets/img/product.png" width="120">
	                      		</div>
	                  		</div>
	                  	</div><!-- /col-md-4 -->
	                 	{{-- tercero --}} 	
						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
								<p><b>Zac Snider</b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">MEMBER SINCE</p>
										<p>2012</p>
									</div>
									<div class="col-md-6">
										<p class="small mt">TOTAL SPEND</p>
										<p>$ 47,60</p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->
	                  	

	                </div><!-- /row --> 
				
					
					<div class="row mt">
	                  <!--CUSTOM CHART START -->
	                  <div class="border-head">
	                      <h3>VISITS</h3>
	                  </div>
	                  <div class="custom-bar-chart">
	                      <ul class="y-axis">
	                          <li><span>10.000</span></li>
	                          <li><span>8.000</span></li>
	                          <li><span>6.000</span></li>
	                          <li><span>4.000</span></li>
	                          <li><span>2.000</span></li>
	                          <li><span>0</span></li>
	                      </ul>
	                      <div class="bar">
	                          <div class="title">Enero</div>
	                          <div class="value tooltips" data-original-title="8.500" data-toggle="tooltip" data-placement="top">85%</div>
	                      </div>
	                      <div class="bar ">
	                          <div class="title">Febrero</div>
	                          <div class="value tooltips" data-original-title="5.000" data-toggle="tooltip" data-placement="top">50%</div>
	                      </div>
	                      <div class="bar ">
	                          <div class="title">Marzo</div>
	                          <div class="value tooltips" data-original-title="6.000" data-toggle="tooltip" data-placement="top">60%</div>
	                      </div>
	                      <div class="bar ">
	                          <div class="title">Abril</div>
	                          <div class="value tooltips" data-original-title="4.500" data-toggle="tooltip" data-placement="top">45%</div>
	                      </div>
	                      <div class="bar">
	                          <div class="title">Mayo</div>
	                          <div class="value tooltips" data-original-title="3.200" data-toggle="tooltip" data-placement="top">32%</div>
	                      </div>
	                      <div class="bar ">
	                          <div class="title">Junio</div>
	                          <div class="value tooltips" data-original-title="6.200" data-toggle="tooltip" data-placement="top">62%</div>
	                      </div>
	                      <div class="bar">
	                          <div class="title">Julio</div>
	                          <div class="value tooltips" data-original-title="7.500" data-toggle="tooltip" data-placement="top">75%</div>
	                      </div>
	                  </div>
	                  <!--custom chart end-->
					</div><!-- /row -->	
					
	              </div><!-- /col-lg-9 END SECTION MIDDLE -->
	              
	              
	  <!-- **********************************************************************************************************************************************************
	  RIGHT SIDEBAR CONTENT
	  *********************************************************************************************************************************************************** -->                  
	              
	              <div class="col-lg-3 ds">
	                <!--COMPLETED ACTIONS DONUTS CHART-->
						<h3>Ultimas Consultas</h3>
	                                    
	                  <!-- First Action -->
	                  <div class="desc">
	                  	<a href="#">
		                  	<div class="thumb">
		                  		<span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
		                  	</div>
		                  	<div class="details">
		                  		<p><muted>2 Minutes Ago</muted><br/>
		                  		   <a href="#">James Brown</a> subscribed to your newsletter.<br/>
		                  		</p>
		                  	</div>
		                </a>  	
	                  </div>   

	                    <!-- CALENDAR-->
	                    <div id="calendar" class="mb">
	                        <div class="panel green-panel no-margin">
	                            <div class="panel-body">
	                                <div id="my-calendar"></div>
	                            </div>
	                        </div>
	                    </div><!-- / calendar -->
	                  
	              </div><!-- /col-lg-3 -->
	          </div><!-- /row -->
	      </section>
	  </section>

	  <!--main content end-->


	@stop
	@section('js')
	{{ HTML::script('js/zabuto_calendar.js') }}
	<script type="application/javascript">
        $(document).ready(function () {        
            $("#my-calendar").zabuto_calendar({
           		language: "es",
    			year: 2015,
    			today: true,
        	});
         });	
	</script>
	@stop
