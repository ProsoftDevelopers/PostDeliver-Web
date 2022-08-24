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
				<li class="breadcrumb-item active">Add New User</li>
			  </ol>

			  <!-- DataTables Example -->
				<div class="card mb-3">
					<div class="card-body">
						<!---- Success Message ---->
						<?php if ($this->session->flashdata('success')) { ?>
						<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
					</div>
					<?php } ?>

					<!---- Error Message ---->
					<?php if ($this->session->flashdata('error')) { ?>
					<p style="color:red; font-size:18px;"><?php echo $this->session->flashdata('error');?></p>
					<?php } ?>  
					
					<form action="<?php echo base_url(); ?>index.php/Manage_Users/add_new_user" method="post">
						<div class="form-group">
						  <div class="form-row">
							<div class="form-group"> <!--<div class="col-md-6"> -->
							  <div class="form-label-group">

								<?php //echo form_input(['name'=>'firstname','id'=>'firstname','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('firstname')]);?>
								<?php //echo form_label('Enter your first name', 'firstname'); ?>
								<?php //echo form_error('firstname',"<div style='color:red'>","</div>");?>

								<?php echo form_label('Enter your username', 'username'); ?> : <?php echo form_input(['name'=>'username','id'=>'username','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('username')]);?>
								<?php echo form_error('username',"<div style='color:red'>","</div>");?>

							  </div>
							</div>
						 </div>
						</div>
							
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-label-group">
										<?php echo form_label('Password', 'password'); ?>
										<?php echo form_password(['name'=>'password','id'=>'password','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('password')]);?>										
										<?php echo form_error('password',"<div style='color:red'>","</div>");?>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-label-group">
										<?php echo form_label('Confirm Password', 'confirmpassword'); ?>
										<?php echo form_password(['name'=>'confirmpassword','id'=>'confirmpassword','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('confirmpassword')]);?>										
										<?php echo form_error('confirmpassword',"<div style='color:red'>","</div>");?>
									</div>
								</div>
							</div>
						</div>
						 
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter designation', 'designation'); ?> 
								<?php echo form_input(['name'=>'designation','id'=>'designation','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('designation')]);?>								
								<?php echo form_error('designation',"<div style='color:red'>","</div>");?>
							</div>
						</div>
						
						 
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter department', 'department'); ?>
								<?php echo form_input(['name'=>'department','id'=>'department','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('department')]);?>								
								<?php echo form_error('department',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter policestation', 'policestation'); ?>
								<?php echo form_input(['name'=>'policestation','id'=>'policestation','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('policestation')]);?>								
								<?php echo form_error('policestation',"<div style='color:red'>","</div>");?>
							</div>
						</div>
						
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter city_place', 'city_place'); ?>
								<?php echo form_input(['name'=>'city_place','id'=>'city_place','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('city_place')]);?>								
								<?php echo form_error('city_place',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						<div class="form-group">
							<div class="form-label-group">

								<?php ///echo form_input(['name'=>'mobile_number','id'=>'mobile_number','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('mobile_number')]);?>
								<?php ///echo form_label('Enter mobile_number', 'mobile_number'); ?>
								<?php ///echo form_error('mobile_number',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						 <div class="form-group">
							<div class="form-label-group">

								<?php ///echo form_input(['name'=>'policestation','id'=>'policestation','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('policestation')]);?>
								<?php // echo form_label('Enter policestation', 'policestation'); ?>
								<?php //echo form_error('policestation',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter valid email id', 'emailid'); ?>
								<?php echo form_input(['name'=>'emailid','id'=>'emailid','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('emailid')]);?>								
								<?php echo form_error('emailid',"<div style='color:red'>","</div>");?>

							</div>
						</div>

						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter Mobile Number', 'mobilenumber'); ?>
								<?php echo form_input(['name'=>'mobile_number','id'=>'mobile_number','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('mobile_number')]);?>								
								<?php echo form_error('mobile_number',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						<div class="form-group">
							<div class="form-label-group">
								<?php echo form_label('Enter zone', 'zone'); ?>
								<?php echo form_input(['name'=>'zone','id'=>'zone','class'=>'form-control','autofocus'=>'autofocus','value'=>set_value('zone')]);?>								
								<?php echo form_error('zone',"<div style='color:red'>","</div>");?>

							</div>
						</div>
						
						<div class="form-group">
							<div class="form-label-group">
								<input type="checkbox" name="is_alert_user" id="is_alert_user">
								<label for="is_alert_user">
									Is Alert User ?
								</label>								
							</div>
						</div>
						
						<?php echo form_submit(['name'=>'Register','value'=>'Register','class'=>'btn btn-primary btn-block']); ?>

					</form>				  
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
	

   
