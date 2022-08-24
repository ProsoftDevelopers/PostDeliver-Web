<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $this->lang->line('dashboard') ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $this->lang->line('home') ?></a></li>
              <li class="breadcrumb-item active"><?php echo $this->lang->line('dashboard') ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
					<div id="confirmed_cases_count"></div>
				</h3>

                <p><?php echo $this->lang->line('confirmed_cases') ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-check"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $this->lang->line('more_info') ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
					<div id="active_count"></div>
				</h3>

                <p><?php echo $this->lang->line('active_cases') ?></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $this->lang->line('more_info') ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
					<div id="recovered_count"></div>
				</h3>

                <p><?php echo $this->lang->line('recovered') ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-user-plus"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $this->lang->line('more_info') ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>
					<div id="deaths_count"></div>
				</h3>

                <p><?php echo $this->lang->line('deceased') ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-user-times"></i>
              </div>
              <a href="#" class="small-box-footer"><?php echo $this->lang->line('more_info') ?> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion-arrow-graph-up-right mr-1"></i>
                  <?php echo $this->lang->line('quarantine_report') ?>
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button> 
				  <!--
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
				  </button>
				  -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
					<div class="chart tab-pane active" id="revenue-chart"
						style="position: relative; height: 300px;">
						<canvas id="lineChart" height="300" style="height: 300px;"></canvas>
					</div>                    
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- left col -->
          <section class="col-lg-6 connectedSortable">
			<!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  <?php echo $this->lang->line('movement') ?>
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>     
				  <!--
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
				  </button>
				  -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
					<div class="chart tab-pane active" id="revenue-chart"
						style="position: relative; height: 300px;">
						<canvas id="donutChart" height="300" style="height: 300px;"></canvas>
					</div>                    
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- /.left col -->
		  <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">
			<!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  <?php echo $this->lang->line('travel_history') ?>
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>    
				  <!--
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
					<i class="fas fa-times"></i>
				  </button>
				  -->
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
					<div class="chart tab-pane active" id="revenue-chart"
						style="position: relative; height: 300px;">
						<canvas id="barChart" height="300" style="height: 300px;"></canvas>
					</div>                    
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
	<!-- jQuery -->
	<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?php echo base_url(); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="<?php echo base_url(); ?>plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="<?php echo base_url(); ?>plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap 
	<script src="<?php echo base_url(); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
	<!-- jQuery Knob Chart -->
	<script src="<?php echo base_url(); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="<?php echo base_url(); ?>plugins/moment/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="<?php echo base_url(); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="<?php echo base_url(); ?>plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="<?php echo base_url(); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url(); ?>dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="<?php echo base_url(); ?>dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="<?php echo base_url(); ?>dist/js/demo.js"></script>	

	
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
		
		var areaChartCanvas = $('#lineChart').get(0).getContext('2d');
		var areaChartOptions = {
							  maintainAspectRatio : false,
							  responsive : true,
							  legend: {
								display: true
							  },
							  scales: {
								xAxes: [{
								  gridLines : {
									display : false,
								  }
								}],
								yAxes: [{
								  gridLines : {
									display : false,
								  }
								}]
							  }
							};
							
			
		
		GetQuarantinedData();
		function GetQuarantinedData() {
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/MonitorQuarantinec/get_quarantine_data_dashboard",
			   data: { }
			 }).done(function( data ) {
				if (data == 101) {
					alert("Error");
				}else{
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
						
						var areaChartData = {
							  labels  : mLabels,
							  datasets: [{
								  label               : 'Male',
								  backgroundColor     : 'rgba(60,141,188,0.9)',
								  borderColor         : 'rgba(60,141,188,0.8)',
								  pointRadius         : false,
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
								}]
							};

							// This will get the first returned node in the jQuery collection.
							var areaChart       = new Chart(areaChartCanvas, { 
							  type: 'line',
							  data: areaChartData, 
							  options: areaChartOptions
							})
					}
				}
			});
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
				} else {
					// Donut Chart
					var json_obj = jQuery.parseJSON(data);
					if (json_obj.length > 0){
						var donutData = [];
						var donutDataLabels = [];
						var mBackgroundColor = ['#3c8dbc', '#d2d6de', '#f56954', '#00a65a', '#f39c12', '#00c0ef'];
						
						for(var row = 0; row < json_obj.length; row++){								
							var movementCount = json_obj[row]['MovementCount']; 
							var location = json_obj[row]['Location']; 
							
							var mColor = getRandomColor();
							
							donutDataLabels.push(location);									
							donutData.push(movementCount);
							//mBackgroundColor.push (mColor);
						}
						
						var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
						
						var mDonutData        = {
							labels: donutDataLabels,
							datasets: [{
									data: donutData,
									backgroundColor : mBackgroundColor
								}
							]
						}
												
						var donutOptions     = {
							maintainAspectRatio : false,
							responsive : true,
						}
						
						//Create pie or douhnut chart
						// You can switch between pie and douhnut using the method below.
						var donutChart = new Chart(donutChartCanvas, {
						  type: 'doughnut',
						  data: mDonutData,
						  options: donutOptions      
						})
					} else {
						//alert("No data found.");
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
				}else{
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
						  options : barChartOptions
						})
						
						//barChartOptions.datasetFill = false
						//barChart.Bar(barChartData, barChartOptions)
					}
				}
			 });
		}
	</script>