<!-- Right side column. Contains the navbar and content of the page -->
		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Dashboard
					<small>Control panel</small>
				</h1>
				<ol class="breadcrumb">
				  <!--  <li><a href="<?php echo $rootPath;?>index.php/userc/index"><i class="fa fa-dashboard"></i>Dashboard </a></li> -->
					<li class="active"></li>
				</ol>
			</section>
	  
			<!-- Main content -->
			<section class="content">	
		
			  <!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-red">
							<div class="inner">
								<h3>
									<div id="confirmed_cases_count"></div>
								</h3>
								<p>
									Confirmed Cases
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-briefcase"></i>
							</div>
							<a  class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-green">
							<div class="inner">
								<h3>	
									<div id="active_count"></div>
								</h3>
								<p>
									Active
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-stats-bars"></i>
							</div>
							<a  class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-yellow">
							<div class="inner">
								<h3>	
									<div id="recovered_count"></div>
								</h3>
								<p>
									Recovered
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-person-add"></i>
							</div>
							<a  class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
					<div class="col-lg-3 col-xs-6">
						<!-- small box -->
						<div class="small-box bg-aqua">
							<div class="inner">
								<h3>
									<div id="deaths_count"></div>
								</h3>
								<p>
									Deceased
								</p>
							</div>
							<div class="icon">
								<i class="ion ion-pie-graph"></i>
							</div>
							<a class="small-box-footer">
								More info <i class="fa fa-arrow-circle-right"></i>
							</a>
						</div>
					</div><!-- ./col -->
				</div><!-- /.row -->
				
				<div class="row">
					<div class="col-md-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h3 class="box-title">Quarantine Report</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
							  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
								<i class="fa fa-wrench"></i></button>
							  <ul class="dropdown-menu" role="menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							  </ul>
							</div>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
						  <div class="row">
							<div class="col-md-12">
							  <p class="text-center">
								<strong>Number of persons Quarantine (Date wise)</strong>
							  </p>

							  <div class="chart">
								<!-- Sales Chart Canvas -->
								<canvas id="lineChart" style="height: 123px;" height="123" width="466"></canvas>
							  </div>
							  <!-- /.chart-responsive -->
							</div>
							
							<!-- /.col -->
							<!--
							<div class="col-md-4">
							  <p class="text-center">
								<strong>Goal Completion</strong>
							  </p>

							  <div class="progress-group">
								<span class="progress-text">Add Products to Cart</span>
								<span class="progress-number"><b>160</b>/200</span>

								<div class="progress sm">
								  <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
								</div>
							  </div>
							  
							  <div class="progress-group">
								<span class="progress-text">Complete Purchase</span>
								<span class="progress-number"><b>310</b>/400</span>

								<div class="progress sm">
								  <div class="progress-bar progress-bar-red" style="width: 80%"></div>
								</div>
							  </div>
							  
							  <div class="progress-group">
								<span class="progress-text">Visit Premium Page</span>
								<span class="progress-number"><b>480</b>/800</span>

								<div class="progress sm">
								  <div class="progress-bar progress-bar-green" style="width: 80%"></div>
								</div>
							  </div>
							  
							  <div class="progress-group">
								<span class="progress-text">Send Inquiries</span>
								<span class="progress-number"><b>250</b>/500</span>

								<div class="progress sm">
								  <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
								</div>
							  </div>							  
							</div>
							-->
							<!-- /.col -->
						  </div>
						  <!-- /.row -->
						</div>
						<!-- ./box-body -->
						<!--
						<div class="box-footer">
						  <div class="row">
							<div class="col-sm-3 col-xs-6">
							  <div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
								<h5 class="description-header">100</h5>
								<span class="description-text">Confirmed Cases</span>
							  </div>
							</div>
							<div class="col-sm-3 col-xs-6">
							  <div class="description-block border-right">
								<span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
								<h5 class="description-header">120</h5>
								<span class="description-text">Active</span>
							  </div>
							</div>
							<div class="col-sm-3 col-xs-6">
							  <div class="description-block border-right">
								<span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
								<h5 class="description-header">600</h5>
								<span class="description-text">Recovered</span>
							  </div>
							</div>
							<div class="col-sm-3 col-xs-6">
							  <div class="description-block">
								<span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
								<h5 class="description-header">20</h5>
								<span class="description-text">Deceased</span>
							  </div>
							</div>
						  </div>
						</div>
						-->
						<!-- /.box-footer -->
					  </div>
					  <!-- /.box -->
					</div>
					<!-- /.col -->
				</div>
				
				<div class="row">
					<div class="col-md-6">					  
					  <!-- DONUT CHART -->
					  <div class="box box-danger">
						<div class="box-header with-border">
						  <h3 class="box-title">Movement</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						</div>
						<div class="box-body">
						  <canvas id="pieChart" style="height: 185px; width: 370px;" height="185" width="370"></canvas>
						</div>
						<!-- /.box-body -->
					  </div>
					  <!-- /.box -->
					</div>
					
					<div class="col-md-6">
					  <div class="box">						
						<div class="box-header with-border">
						  <h3 class="box-title">Travel History</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						</div>
						<div class="box-body">
						  <div class="chart">
							<canvas id="barChart" style="height: 221px; width: 472px;" height="221" width="472"></canvas>
						  </div>
						</div>
						<!-- /.box-body -->
					  </div>
					</div>
				</div>
			</section>
	  </aside>
	  
	  <script>		
		getGlobal_COVID_data();
		function getGlobal_COVID_data(){
			$.ajax({ 
			   method: "GET", 			   
			   url: "https://corona.lmao.ninja/all",
			 }).done(function( data ) {				
				var cCases = data["cases"];
				var cActive = data["active"];
				var cRecovered = data["recovered"];
				var cDeaths = data["deaths"];
				
				document.getElementById("confirmed_cases_count").innerHTML = Number(cCases).toLocaleString(); // data["cases"];
				document.getElementById("active_count").innerHTML = Number(cActive).toLocaleString(); // data["active"];
				document.getElementById("recovered_count").innerHTML = Number(cRecovered).toLocaleString(); // data["recovered"];
				document.getElementById("deaths_count").innerHTML = Number(cDeaths).toLocaleString(); // data["deaths"];
			 });
		}
			
		var areaChartOptions = {
		  //Boolean - If we should show the scale at all
		  showScale               : true,
		  //Boolean - Whether grid lines are shown across the chart
		  scaleShowGridLines      : true,
		  //String - Colour of the grid lines
		  scaleGridLineColor      : 'rgba(0,0,0,.05)',
		  //Number - Width of the grid lines
		  scaleGridLineWidth      : 1,
		  //Boolean - Whether to show horizontal lines (except X axis)
		  scaleShowHorizontalLines: true,
		  //Boolean - Whether to show vertical lines (except Y axis)
		  scaleShowVerticalLines  : true,
		  //Boolean - Whether the line is curved between points
		  bezierCurve             : true,
		  //Number - Tension of the bezier curve between points
		  bezierCurveTension      : 0.3,
		  //Boolean - Whether to show a dot for each point
		  pointDot                : false,
		  //Number - Radius of each point dot in pixels
		  pointDotRadius          : 4,
		  //Number - Pixel width of point dot stroke
		  pointDotStrokeWidth     : 1,
		  //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
		  pointHitDetectionRadius : 20,
		  //Boolean - Whether to show a stroke for datasets
		  datasetStroke           : true,
		  //Number - Pixel width of dataset stroke
		  datasetStrokeWidth      : 2,
		  //Boolean - Whether to fill the dataset with a color
		  datasetFill             : true,
		  //String - A legend template
		  legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
		  //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
		  maintainAspectRatio     : true,
		  //Boolean - whether to make the chart responsive to window resizing
		  responsive              : true
		}
		
		function getRandomColor() {
		  var letters = '0123456789ABCDEF';
		  var color = '#';
		  for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		  }
		  return color;
		}
		
			GetQuarantinedMovements();
			function GetQuarantinedMovements() {
				$.ajax({ 
				   method: "POST", 			   
				   url: "<?php echo base_url();?>index.php/MonitorQuarantinec/get_inplace_outplace_dashboard",
				   data: { "mobile_no": "9912345678" }
				 }).done(function( data ) {
					if (data == 101) {
						alert("Invalid mobile number.");
					} else if (data == "110") {
						//alert("No data found.");
					} else {
						// PIE Chart
						var json_obj = jQuery.parseJSON(data);
						if (json_obj.length > 0){
							var PieData = [];
							for(var row = 0; row < json_obj.length; row++){								
									var movementCount = json_obj[row]['MovementCount']; 
									var location = json_obj[row]['Location']; 
									
									var mColor = getRandomColor();
									
									pData = {value : movementCount, color : mColor, highlight: mColor, label : location}									
									PieData.push(pData);
							}
							
							var pieOptions     = {
							  //Boolean - Whether we should show a stroke on each segment
							  segmentShowStroke    : true,
							  //String - The colour of each segment stroke
							  segmentStrokeColor   : '#fff',
							  //Number - The width of each segment stroke
							  segmentStrokeWidth   : 2,
							  //Number - The percentage of the chart that we cut out of the middle
							  percentageInnerCutout: 50, // This is 0 for Pie charts
							  //Number - Amount of animation steps
							  animationSteps       : 100,
							  //String - Animation easing effect
							  animationEasing      : 'easeOutBounce',
							  //Boolean - Whether we animate the rotation of the Doughnut
							  animateRotate        : true,
							  //Boolean - Whether we animate scaling the Doughnut from the centre
							  animateScale         : false,
							  //Boolean - whether to make the chart responsive to window resizing
							  responsive           : true,
							  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
							  maintainAspectRatio  : true,
							  //String - A legend template
							  legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
							}
							
							var pieChartCanvas = $('#pieChart').get(0).getContext('2d');
							var pieChart       = new Chart(pieChartCanvas, {
							  data: PieData, 
							  options: pieOptions
							})
														
							//Create pie or douhnut chart
							// You can switch between pie and douhnut using the method below.
							//pieChart.Doughnut(PieData, pieOptions)
						} else {
							//alert("No data found.");
						}												
					}
				 });
			}
			
			GetQuarantinedData();
			function GetQuarantinedData() {
				$.ajax({ 
				   method: "POST", 			   
				   url: "<?php echo base_url();?>index.php/MonitorQuarantinec/get_quarantine_data_dashboard",
				   data: { }
				 }).done(function( data ) {
					if (data == 101) {
						alert("Error");
					} else if (data == "110") {
						//alert("No data found.");
					} else{
						var json_obj = jQuery.parseJSON(data);
						if (json_obj.length > 0){
							var maleData = [];
							var femaleData = [];
							var mLabels = [];
							
							for(var row = 0; row < json_obj.length; row++){								
									var mDate = json_obj[row]['MDate']; 
									var male = json_obj[row]['Male']; 
									var female = json_obj[row]['Female']; 						
									
									mLabels.push(mDate);
									maleData.push(male);
									femaleData.push(female);
							}
							
							var lineData = {
							  labels  : mLabels,
							  datasets: [
								{
								  label               : 'Male',
								  backgroundColor     : 'rgba(60,141,188,0.9)',
								  borderColor         : 'rgba(60,141,188,0.8)',
								  pointRadius          : false,
								  pointColor          : '#3b8bba',
								  pointStrokeColor    : 'rgba(60,141,188,1)',
								  pointHighlightFill  : '#fff',
								  pointHighlightStroke: 'rgba(60,141,188,1)',
								  data                : maleData
								},
								{
								  label               : 'Female',
								  backgroundColor     : 'rgba(210, 214, 222, 1)',
								  borderColor         : 'rgba(210, 214, 222, 1)',
								  pointRadius         : false,
								  pointColor          : 'rgba(210, 214, 222, 1)',
								  pointStrokeColor    : '#c1c7d1',
								  pointHighlightFill  : '#fff',
								  pointHighlightStroke: 'rgba(220,220,220,1)',
								  data                : femaleData
								},
							  ]
							}
							
							var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
							var lineChartOptions = jQuery.extend(true, {}, areaChartOptions)
							var lineChartData = jQuery.extend(true, {}, lineData)
							lineChartData.datasets[0].fill = false;
							//lineChartData.datasets[1].fill = false;
							lineChartOptions.datasetFill = false

							var lineChart = new Chart(lineChartCanvas, { 
							  type: 'line',
							  data: lineChartData, 
							  options: lineChartOptions
							})

							//lineChart.Line(lineData, lineChartOptions)
						}
					}
				 });
			}			
			
			GetTravellingHistory();
			function GetTravellingHistory() {
				$.ajax({ 
				   method: "POST", 			   
				   url: "<?php echo base_url();?>index.php/Userc/get_travelling_history",
				   data: { "mobile_no": "9912345678" }
				 }).done(function( data ) {
					if (data == 101) {
						alert("Invalid mobile number.");
					} else if (data == "110") {
						//alert("No data found.");
					} else{
						var json_obj = jQuery.parseJSON(data);
						if (json_obj.length > 0){
							var maleData = [];
							var femaleData = [];
							var mLabels = [];
							
							for(var row = 0; row < json_obj.length; row++){								
									var mCountry = json_obj[row]['MCountry']; 
									var male = json_obj[row]['Male']; 
									var female = json_obj[row]['Female']; 						
									
									mLabels.push(mCountry);
									maleData.push(male);
									femaleData.push(female);
							}
							
							var barData = {
							  labels  : mLabels,
							  datasets: [
								{
								  label               : 'Male',
								  backgroundColor     : 'rgba(60,141,188,0.9)',
								  borderColor         : 'rgba(60,141,188,0.8)',
								  pointRadius          : false,
								  pointColor          : '#3b8bba',
								  pointStrokeColor    : 'rgba(60,141,188,1)',
								  pointHighlightFill  : '#fff',
								  pointHighlightStroke: 'rgba(60,141,188,1)',
								  data                : maleData
								},
								{
								  label               : 'Female',
								  backgroundColor     : 'rgba(210, 214, 222, 1)',
								  borderColor         : 'rgba(210, 214, 222, 1)',
								  pointRadius         : false,
								  pointColor          : 'rgba(210, 214, 222, 1)',
								  pointStrokeColor    : '#c1c7d1',
								  pointHighlightFill  : '#fff',
								  pointHighlightStroke: 'rgba(220,220,220,1)',
								  data                : femaleData
								},
							  ]
							}
							
							// Bar Chart
							var barChartCanvas = $('#barChart').get(0).getContext('2d')
							var barChartData = jQuery.extend(true, {}, barData)
							var temp0 = barData.datasets[0]
							var temp1 = barData.datasets[1]
							barChartData.datasets[0] = temp1
							barChartData.datasets[1] = temp0
							barChartData.datasets[1].fillColor   = '#00a65a'
							barChartData.datasets[1].strokeColor = '#00a65a'
							barChartData.datasets[1].pointColor  = '#00a65a'

							var barChartOptions = {
							  responsive              : true,
							  maintainAspectRatio     : false,
							  datasetFill             : false
							}

							var barChart = new Chart(barChartCanvas, {
							  type: 'bar', 
							  data: barChartData,
							  options: barChartOptions
							})
							
							//barChartOptions.datasetFill = false
							//barChart.Bar(barChartData, barChartOptions)
						}
					}
				 });
			}			
	  </script>