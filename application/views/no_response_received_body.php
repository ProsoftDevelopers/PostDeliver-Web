<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">No Response Received Report</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#"><?php echo $this->lang->line('home') ?></a></li>
				  <li class="breadcrumb-item active">No Response Received</li>
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
			  <section class="col-lg-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="nav-icon fa ion-eye-disabled mr-1"></i>
					  No response received report
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
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-4 control-label">Duration (In Hours)</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" id="duration" placeholder="Duration (In Hours)">
								</div>
								<br>
								<div class="col-sm-4">
									<button type="button" class="btn btn-block btn-default btn-sm" id="generate_no_responses" onclick="GenerateNoResponses();"><?php echo $this->lang->line('generate') ?></button>
								</div>
							</div>
							
						</div>
					</div>
				  </div><!-- /.card-body -->
				  <div id="generate_no_responses_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>			  
			  <section class="col-lg-12 connectedSortable">
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="far fa-calendar-alt"></i>
					  No Response List
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
					<table id="NoResponseListGrid" class="table table-bordered table-hover" style="cursor:pointer">
					</table>
				  </div><!-- /.card-body -->
				  <div class="card-footer">
					 <button type="submit" class="btn btn-primary" id="btn_print_export">Print/Export</button>
				  </div>				  
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
		var noOfHours = 1;
		
		var duration = document.getElementById("duration");
		duration.value = noOfHours;
				
		var btnPrintExport = document.getElementById("btn_print_export");
		btnPrintExport.style.display = "none";		
		
		GenerateNoResponses();
		
		function GenerateNoResponses() {
			if (oTable != null && oTable != "undefined"){
				$('#NoResponseListGrid').dataTable().fnClearTable();
			}
			
			if (duration.value == "undefined" || duration.value == ""){
				alert("Duration value cannot be blank.")
				return;
			}
			
			var generateNoResponseLoader = document.getElementById("generate_no_responses_loader");
			generateNoResponseLoader.style.display = "block";
					
			$.ajax({ 
			   method: "POST", 			   
			   url: "<?php echo base_url();?>index.php/NoResponseReceivedc/get_no_response_received",
			   data: { "no_of_hours" : duration.value }
			}).done(function( mdata ) {
				if (mdata == 0){
					generateNoResponseLoader.style.display = "none";
					btnPrintExport.style.display = "none";
					alert("No record found.");
					return;
				}else if (mdata == -1){
					generateNoResponseLoader.style.display = "none";
					btnPrintExport.style.display = "none";
					alert("Error occured while retrieving data.");
					return;
				}
				
				var json_obj = jQuery.parseJSON(mdata);
								
				var mGridData = [];
				if (json_obj.length > 0)
				{
					for(var row = 0; row < json_obj.length; row++){						
						var rn = json_obj[row].rn; 
						var mobile_number = json_obj[row].mobile_number; 
						var LastUpdate = json_obj[row].LastUpdate; 						
						var DateDiff = json_obj[row].DateDiff; 
						//var movementSource = json_obj[row]['movement_source1']; 
						
						mGridData.push([(row + 1), rn, mobile_number, LastUpdate, DateDiff]);
					}
					
					if (oTable == null || oTable == "undefined"){
						oTable = $('#NoResponseListGrid').dataTable( {
							
							"sScrollX": "100%",
							"sScrollXInner": "110%",
																
							"initComplete": function () {
								$("#NoResponseListGrid").on("click", "tr[role='row']", function(){
									/* $("#NoResponseListGrid tbody tr").removeClass('row_selected');        
									$(this).addClass('row_selected');
					
									//var index = $(this).index();
									var sIndex = $(this).children('td:first-child').text();
									var index = parseInt(sIndex) - 1; */									
								});
							},
							"aoColumns": [
								{ "sTitle": "Sl No" },
								{ "sTitle": "RN" },
								{ "sTitle": "Mobile Number" },
								{ "sTitle": "Last Update" },
								{ "sTitle": "Date Diff" }
							]
						} );
					}
					
					$('#NoResponseListGrid').dataTable().fnAddData(mGridData);
					btnPrintExport.style.display = "block";
				}else{
					btnPrintExport.style.display = "none";
					alert("No records found.");
				}
				
				generateNoResponseLoader.style.display = "none";
			});						
		}		
	</script>

	