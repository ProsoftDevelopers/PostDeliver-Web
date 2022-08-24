

<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark">Users</h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#">Home</a></li>
				  <li class="breadcrumb-item active">Users</li>
				</ol>
			  </div><!-- /.col -->
			</div><!-- /.row -->
		  </div><!-- /.container-fluid -->
		</div>
		<!-- /.content-header -->

		<!-- Main content -->
		<section class="content">
		      <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="<?php echo base_url(); ?>index.php/Userc/index">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?php echo base_url();?>index.php/Manage_Users/index">Manage Users</a></li>
          </ol>

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
             <a href="<?php echo base_url(); ?>index.php/Manage_Users/add_new_user">Add New User</a></div>


            <div class="card-body">
              <div class="table-responsive">
<!---- Success Message ---->
<!---- Success Message ---->
<?php if ($this->session->flashdata('success')) { ?>
<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
</div>


<?php } ?>

<!---- Error Message ---->

<?php if ($this->session->flashdata('error')) { ?>
<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>

<?php } ?>  
                
              <div class="container-fluid">          

          <!-- Page Content -->
          <h3><?php echo $ud->username; ?>'s Profile</h3>
          <hr>
<!---- Success Message ---->






<!--<p> <strong>Reg Date :</strong> <?php //echo $ud->regDate; ?>-->
<p> <strong>Username :</strong> <?php echo $ud->username; ?>
<p> <strong>Department :</strong> <?php echo $ud->department; ?>
<p> <strong>Email id :</strong> <?php echo $ud->emailid; ?>
<p> <strong>Mobile Number:</strong> <?php echo $ud->mobile_number; ?>
<!--<p> <strong>Last Updation Date :</strong> <?php //echo $ud->lastUpdationDate; ?>-->
  

        </div>
        
        
              
                      </div>
            </div>

          </div>


        </div>
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
	
