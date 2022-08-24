<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Search</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Search</li>
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
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  Search Patient Results
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
					<table id="PatientGrid" class="table table-bordered table-hover" style="cursor:pointer">
						<thead>
							<tr>
								<th>Patient ID</th>
								<th>Person Name</th>
								<th>Mobile No</th>
								<th>Age</th>
								<th>Gender</th>
								<!--<th style="width:100px;">Actions</th>-->
							</tr>
						</thead>
						<?php
						foreach ($patient->result() as $patient_row)
						{ ?>
						<tbody>
							<tr>
								<td> <?php echo $patient_row->patient_id; ?> </td>
								<td> <?php echo $patient_row->person_name; ?> </td>
								<td> <?php echo $patient_row->mobile_number; ?> </td>
								<td> <?php echo $patient_row->age; ?>  </td>
								<td> <?php echo $patient_row->gender; ?>  </td>
								<!--<td style="width:100px;"><center><div class="btn-group"><a class="tip btn btn-primary btn-xs" title="VIEW CASE" target="blank" href="<?php echo base_url();?>index.php/casec/view_case/<?php echo $comments_info->id; ?>"><i class="fa fa-file-text-o"></i></a><a class="tip btn btn-danger btn-xs" title="EDIT USER" href=""><i class="fa fa-edit"></i></a></div></center></td>-->
							</tr>
						</tbody>
						<?php } ?>
					</table>
				  </div><!-- /.card-body -->
				  <div id="patient_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2">Loading...</div>
				  </div>
				</div>
				<!-- /.card -->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  Search CDR Results
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
					<table id="CDRGrid" class="table table-bordered table-hover" style="cursor:pointer">
						<thead>
							<tr>
								<th>CDR Profile ID</th>
								<th>Case Profile ID</th>
								<th>CDR Phone No</th>
								<th>Called Phone No</th>
								<th>Charged Party</th>
								<!--<th style="width:100px;">Actions</th>-->
							</tr>
						</thead>
						<?php
						foreach ($cdr->result() as $cdr_row)
						{ ?>
						<tbody>
							<tr>
								<td> <?php echo $cdr_row->cdrprofileid; ?> </td>
								<td> <?php echo $cdr_row->caseprofileid; ?> </td>
								<td> <?php echo $cdr_row->cdrphoneno; ?> </td>
								<td> <?php echo $cdr_row->calledphoneno; ?>  </td>
								<td> <?php echo $cdr_row->chargedparty; ?>  </td>
								<!--<td style="width:100px;"><center><div class="btn-group"><a class="tip btn btn-primary btn-xs" title="VIEW CASE" target="blank" href="<?php echo base_url();?>index.php/casec/view_case/<?php echo $comments_info->id; ?>"><i class="fa fa-file-text-o"></i></a><a class="tip btn btn-danger btn-xs" title="EDIT USER" href=""><i class="fa fa-edit"></i></a></div></center></td>-->
							</tr>
						</tbody>
						<?php } ?>
					</table>
				  </div><!-- /.card-body -->
				  <div id="cdr_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2">Loading...</div>
				  </div>
				</div>
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
		/* $(document).ready(function() {    
			$('#PatientGrid').dataTable({
					"aLengthMenu": [[5, 10], [5, 10]],
					"sScrollX": "100%",
					"sScrollXInner": "110%"});  
					
			$('#CDRGrid').dataTable({
					"aLengthMenu": [[5, 10], [5, 10]],
					"sScrollX": "100%",
					"sScrollXInner": "110%"});
		});	 */
	</script>



