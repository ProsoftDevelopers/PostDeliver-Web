<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark"><?php echo $this->lang->line('alert') ?></h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#"><?php echo $this->lang->line('home') ?></a></li>
				  <li class="breadcrumb-item active"><?php echo $this->lang->line('alert') ?></li>
				</ol>
			  </div><!-- /.col -->
			</div><!-- /.row -->
		  </div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
		  <div class="container-fluid">
			<!-- Main row -->
			<div class="row">
			  <!-- Left col -->
			  <section class="col-lg-6 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="nav-icon fa fa-bell"></i>
					  <?php echo $this->lang->line('generate_report_alert') ?>
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
					<div class="form-group"><br><br></div>
					  <div class="form-group">
						<button type="button" class="btn btn-block btn-default btn-sm" id="generate_alert" onclick="GenerateAlertClick();"><?php echo $this->lang->line('generate') ?></button>
					  </div>
					<div class="form-group"><br><br></div>
				  </div><!-- /.card-body -->
				  <div id="generate_alert_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-6 connectedSortable">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-chart-pie mr-1"></i>
					  <?php echo $this->lang->line('last_alert_generated') ?>
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
					<div class="form-horizontal">
					  <div class="box-body">
						<div class="form-group">
						  <label for="inputEmail3" class="col-sm-4 control-label"><?php echo $this->lang->line('date_time') ?></label>

						  <div class="col-sm-8">
							<input type="email" class="form-control" id="last_alert_generated_dt" placeholder="Date/Time" readonly>
						  </div>
						</div>
						<div class="form-group">
						  <label for="inputPassword3" class="col-sm-4 control-label"><?php echo $this->lang->line('no_of_violators') ?></label>

						  <div class="col-sm-8">
							<input type="email" class="form-control" id="no_of_violators" placeholder="Number of Violators" readonly>
						  </div>
						</div>							
					  </div>						  
					</div>
				  </div><!-- /.card-body -->				  
				</div>
			  </section>
			  <section class="col-lg-12 connectedSortable">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="far fa-calendar-alt"></i>
					  <?php echo $this->lang->line('violators') ?>
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
					<table id="ViolatorsGrid" class="table table-bordered table-hover" style="cursor:pointer">
					</table>
				  </div><!-- /.card-body -->
				  <div class="box-footer">
					 <button type="submit" class="btn btn-primary" id="btn_send_sms_email" onclick="SendAlertsClick();"><?php echo $this->lang->line('send_sms_email') ?></button>
				  </div>
				  <div id="send_sms_email_alert_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-6 connectedSortable">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="far fa-calendar-alt"></i>
					  List of Already Alert Generated Report of Violators
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
					<table id="listOfAlreadyGeneratedAlertReportGrid" class="table table-bordered table-hover" style="cursor:pointer">
					</table>
				  </div><!-- /.card-body -->
				  <!--<div class="box-footer">
					 <button type="submit" class="btn btn-primary" id="btn_send_sms_email" onclick="SendAlertsClick();"><?php echo $this->lang->line('send_sms_email') ?></button>
				  </div>
				  <div id="send_sms_email_alert_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>-->
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-6 connectedSortable">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="far fa-calendar-alt"></i>
					  Details of Already Alert Generated Report of Violators
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
					<table id="detailsOfAlreadyGeneratedAlertReportGrid" class="table table-bordered table-hover" style="cursor:pointer">
					</table>
				  </div><!-- /.card-body -->
				  <!--<div class="box-footer">
					 <button type="submit" class="btn btn-primary" id="btn_send_sms_email" onclick="SendAlertsClick();"><?php echo $this->lang->line('send_sms_email') ?></button>
				  </div>
				  <div id="send_sms_email_alert_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>-->
				</div>
				<!-- /.card -->
			  </section>
			</div>
			<!-- /.row (main row) -->
		  </div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	  
	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>	
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>	
	<!-- overlayScrollbars -->
	<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.js"></script>
	
	<!-- DataTables -->
	<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	  
	<script>
		var oTable;
		var oListTable;
		var oDetailsTable;
		var alertID = "";
		
		var btnSendSMSEmail = document.getElementById("btn_send_sms_email");
		btnSendSMSEmail.style.display = "none";
		
		GetLastGeneratedDetails();
		function GetLastGeneratedDetails() {
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/Alertc/get_last_generated_alert_details",
			   data: { }
			}).done(function( data ) {
				if (data != 110){
					var json_obj = jQuery.parseJSON(data);
					if (json_obj.length > 0){							
						document.getElementById('last_alert_generated_dt').value = json_obj[0].reported_date;
						document.getElementById('no_of_violators').value = json_obj[0].NoOfVoilaters;
					}else{
						document.getElementById('last_alert_generated_dt').value = "No records found";
						document.getElementById('no_of_violators').value = "No records found";
					}
				}else{
						document.getElementById('last_alert_generated_dt').value = "No records found";
						document.getElementById('no_of_violators').value = "No records found";
				}
			});
		}		
		
		//GenerateAlertClick();
		function GenerateAlertClick() {	
			var generateAlertLoader = document.getElementById("generate_alert_loader");
			generateAlertLoader.style.display = "block";
					
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/Alertc/generate_alert",
			   data: { }
			}).done(function( mdata ) {
				if (mdata == 0){
					generateAlertLoader.style.display = "none";
					alert("No record found.");
					return;
				}else if (mdata == -1){
					generateAlertLoader.style.display = "none";
					alert("Error occured while retrieving data.");
					return;
				}
				
				var json_obj = jQuery.parseJSON(mdata);
				var data = null;							
				
				if (json_obj.length == 2){
					alertID = json_obj[0];
					data = json_obj[1];
				}
				
				var mGridData = [];
				if (data.length > 0)
				{
					for(var row = 0; row < data.length; row++){						
						var p_time_stamp = data[row].p_time_stamp; 
						var latitude = data[row].latitude; 
						var longitude = data[row].longitude; 						
						var mobile_no = data[row].mobile_no; 
						//var movementSource = data[row]['movement_source1']; 
						
						mGridData.push([(row + 1), p_time_stamp, latitude, longitude, mobile_no]);
					}
					
					if (oTable == null || oTable == "undefined"){
						oTable = $('#ViolatorsGrid').dataTable( {
							
							"sScrollX": "100%",
							"sScrollXInner": "110%",
																
							"initComplete": function () {
								$("#ViolatorsGrid").on("click", "tr[role='row']", function(){
									$("#ViolatorsGrid tbody tr").removeClass('row_selected');        
									$(this).addClass('row_selected');
					
									//var index = $(this).index();
									var sIndex = $(this).children('td:first-child').text();
									var index = parseInt(sIndex) - 1;									
								});
							},
							"aoColumns": [
								{ "sTitle": "Sl No" },
								{ "sTitle": "Time Stamp" },
								{ "sTitle": "Latitude" },
								{ "sTitle": "Longitude" },
								{ "sTitle": "Mobile No", "sClass": "center" }
							]
						} );
					}
					
					$('#ViolatorsGrid').dataTable().fnAddData(mGridData);
					var currentdate = new Date(); 
					var datetime = currentdate.getDate() + "-"
									+ (currentdate.getMonth()+1)  + "-" 
									+ currentdate.getFullYear() + " "  
									+ currentdate.getHours() + ":"  
									+ currentdate.getMinutes() + ":" 
									+ currentdate.getSeconds();
									
					document.getElementById('last_alert_generated_dt').value = datetime;
					document.getElementById('no_of_violators').value = data.length;
									
					btnSendSMSEmail.style.display = "block";
				}else{
					btnSendSMSEmail.style.display = "none";
					alert("No violators found.");
				}
				
				generateAlertLoader.style.display = "none";
			});						
		}
		
		function SendAlertsClick() {	
			if (alertID != "undefined" && alertID != ""){
				var sendSMSEmailAlertLoader = document.getElementById("send_sms_email_alert_loader");
				sendSMSEmailAlertLoader.style.display = "block";
						
				$.ajax({ 
				   method: "POST", 			   
				   url: "<?php echo base_url();?>index.php/Alertc/send_sms_email",
				   data: { "alertid" : alertID }
				}).done(function( data ) {	
					if (data == 1){
						alert("SMS/Email sending completed.");
					}else{
						alert("Failed to send SMS/Email.");
					}
					
					sendSMSEmailAlertLoader.style.display = "none";
				});
			}else{
				alert("Could not generate uniqid for these records.");
			}
		}
		
		GetListOfAlreadyGeneratedAlertReport();
		function GetListOfAlreadyGeneratedAlertReport() {
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/Alertc/get_list_of_already_generated_alert_report",
			   data: { }
			}).done(function( mdata ) {
				if (mdata == 0){
					//alert("No data found.");
					return;
				}
					
				var json_obj = jQuery.parseJSON(mdata);
				var data = null;							
								
				var mGridData = [];
				if (json_obj.length > 0)
				{
					for(var row = 0; row < json_obj.length; row++){						
						var rDate = json_obj[row].rDate; 
						var vCount = json_obj[row].vCount; 
						var alertid = json_obj[row].alertid; 						
												
						mGridData.push([(row + 1), rDate, vCount, alertid]);
					}
					
					if (oListTable == null || oListTable == "undefined"){
						oListTable = $('#listOfAlreadyGeneratedAlertReportGrid').dataTable( {
							
							"sScrollX": "100%",
							"sScrollXInner": "110%",
																
							"initComplete": function () {
								$("#listOfAlreadyGeneratedAlertReportGrid").on("click", "tr[role='row']", function(){
									$("#listOfAlreadyGeneratedAlertReportGrid tbody tr").removeClass('row_selected');        
									$(this).addClass('row_selected');
					
									//var index = $(this).index();
									var alertID = $(this).children('td:last-child').text();
									GetDetailsOfAlreadyGeneratedAlertReport(alertID);
								});
							},
							"aoColumns": [
								{ "sTitle": "Sl No" },
								{ "sTitle": "Date/Time" },
								{ "sTitle": "Count" },
								{ "sTitle": "Alert ID" }
							]
						} );
					}
					
					$('#listOfAlreadyGeneratedAlertReportGrid').dataTable().fnAddData(mGridData);					
				}else{					
					//alert("No violators found.");
				}				
			});						
		}
		
		function GetDetailsOfAlreadyGeneratedAlertReport(alertID) {
			if (oDetailsTable != null && oDetailsTable != "undefined"){
				$('#detailsOfAlreadyGeneratedAlertReportGrid').dataTable().fnClearTable();
			}
			
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/Alertc/get_details_of_already_generated_alert_report",
			   data: { "alertid": alertID }
			}).done(function( mdata ) {
				if (mdata == 0){
					alert("No data found.");
					return;
				}
					
				var json_obj = jQuery.parseJSON(mdata);
				var data = null;							
								
				var mGridData = [];
				if (json_obj.length > 0)
				{
					for(var row = 0; row < json_obj.length; row++){						
						var p_time_stamp = json_obj[row].p_time_stamp; 
						var latitude = json_obj[row].latitude; 
						var longitude = json_obj[row].longitude; 						
						var mobile_no = json_obj[row].mobile_no;  						
												
						mGridData.push([(row + 1), p_time_stamp, latitude, longitude, mobile_no]);
					}
					
					if (oDetailsTable == null || oDetailsTable == "undefined"){
						oDetailsTable = $('#detailsOfAlreadyGeneratedAlertReportGrid').dataTable( {
							"lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
							"pageLength": 5,
							"sScrollX": "100%",
							"sScrollXInner": "110%",
																
							"initComplete": function () {
								$("#detailsOfAlreadyGeneratedAlertReportGrid").on("click", "tr[role='row']", function(){
									//$("#detailsOfAlreadyGeneratedAlertReportGrid tbody tr").removeClass('row_selected');        
									//$(this).addClass('row_selected');
					
									//var index = $(this).index();
									//var alertID = $(this).children('td:last-child').text();
									//alert(alertID);
								});
							},
							"aoColumns": [
								{ "sTitle": "Sl No" },
								{ "sTitle": "Time Stamp" },
								{ "sTitle": "Latitude" },
								{ "sTitle": "Longitude" },
								{ "sTitle": "Mobile No", "sClass": "center" }
							]
						} );
					}
					
					$('#detailsOfAlreadyGeneratedAlertReportGrid').dataTable().fnAddData(mGridData);					
				}else{					
					//alert("No violators found.");
				}				
			});						
		}
	</script>

	