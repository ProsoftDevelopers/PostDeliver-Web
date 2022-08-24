		<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Violators</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Violators</li>
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
					  <i class="fas fa-chart-pie mr-1"></i>
					  Violators
					</h3>
					<div class="card-tools">
					  <button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					  </button>                 
					  <button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					  </button>
					</div>
				  </div><!-- /.card-header -->
				  <div class="card-body">
						<table id="ViolatorsGrid" class="table table-bordered table-hover" style="cursor:pointer">
						</table>
				  </div>
				  <!-- /.box-body -->
			      <div class="box-footer">
				  <button type="submit" class="btn btn-primary" id="btn_print_export" onclick="BtnPrintExportClick();">Print/Export</button>
				  </div>
				  <div id="get_violators_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2">Loading...</div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			</div>
		   </div>
		</section>
	  </div>
	  
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
		
		var btnPrintExport = document.getElementById("btn_print_export");
		btnPrintExport.style.display = "none";
		
		var getViolatorsLoader = document.getElementById("get_violators_loader");
		getViolatorsLoader.style.display = "block";

		var data = <?php echo json_encode($violators_details); ?>;
		if (data.length > 0)
		{
			var mGridData = [];
			for(var row = 0; row < data.length; row++){						
				var p_time_stamp = data[row]['p_time_stamp']; 
				var latitude = data[row]['latitude']; 
				var longitude = data[row]['longitude']; 						
				var mobile_no = data[row]['mobile_no']; 
				//var movementSource = data[row]['movement_source1']; 
				
				mGridData.push([(row + 1), p_time_stamp, latitude, longitude, mobile_no]);
			}
			
			if (oTable == null || oTable == "undefined"){
				oTable = $('#ViolatorsGrid').dataTable( {
					"aLengthMenu": [[5, 10], [5, 10]],
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
					"responsive": true,
					"sScrollX": "100%",
					"sScrollXInner": "110%",
					"bScrollCollapse": true,									
					"initComplete": function () {
						$("#ViolatorsGrid").on("click", "tr[role='row']", function(){
							$("#ViolatorsGrid tbody tr").removeClass('row_selected');        
							$(this).addClass('row_selected');
			
							//var index = $(this).index();
							var sIndex = $(this).children('td:first-child').text();
							var index = parseInt(sIndex) - 1;
							showTooltipFromBackend(index);
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
							
			btnPrintExport.style.display = "block";
		}else{
			btnPrintExport.style.display = "none";
			alert("No violators found.");
		}
		
		getViolatorsLoader.style.display = "none";
		
		function BtnPrintExportClick(){
			alert("This feature is under development.");
		}
	</script>				