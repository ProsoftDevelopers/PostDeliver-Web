		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Violators
					<small>Violators List</small>
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
					<div class="col-md-12">
					  <div class="box">
						<div class="box-header with-border">
						  <h3 class="box-title">Violators</h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						</div>
						<div class="box-body">
							<table id="ViolatorsGrid" class="table table-bordered table-hover" style="cursor:pointer">
							</table>
						</div>
						<!-- /.box-body -->
						<div class="box-footer">
						  <button type="submit" class="btn btn-primary" id="btn_print_export" onclick="BtnPrintExportClick();">Print/Export</button>
					    </div>
						<div id="get_violators_loader" class="overlay" style="display: none;">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
					  </div>
					  <!-- /.box -->
					</div>
				</div>
				
				<script src="plugins/datatables/jquery.dataTables.min.js"></script>
				<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
				
				<script>
					var oTable;
					
					var btnPrintExport = document.getElementById("btn_print_export");
					btnPrintExport.style.display = "none";
					
					GenerateViolators();
					function GenerateViolators() {	
						var getViolatorsLoader = document.getElementById("get_violators_loader");
						getViolatorsLoader.style.display = "block";
						var alertID = "<?php echo $_GET['alertid']; ?>";
						
						if (alertID != "" || alertID != "undefined"){
							$.ajax({ 
							   method: "POST", 			   
							   url: "db/alerts.php?function=get_violators_unique_id_wise&alertid="+ alertID +"",
							   data: { }
							}).done(function( data ) {
								var mGridData = [];
								if (data.length > 0)
								{
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
							});	
						}
					}
					
					function BtnPrintExportClick(){
						alert("This feature is under development.");
					}
				</script>
					
				<div class="row">
					<div class="col-md-6">

					</div><!-- ./col -->
				</div><!-- /.row -->
			</section>
	  </aside>