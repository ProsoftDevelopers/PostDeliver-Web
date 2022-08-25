<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url(); ?>index3.html" class="brand-link">
      <img src="<?php echo base_url(); ?>dist/img/c5quats-48x48.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?php echo $this->lang->line('c5') ?> <?php echo $this->lang->line('quats') ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url(); ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->lang->line('prosoft') ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/Userc/index" class="nav-link">
					<i class="nav-icon fas fa-tachometer-alt"></i>
					<p>
						<?php echo $this->lang->line('dashboard') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>

			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/MonitorQuarantinec/set_monitor_quarantine" class="nav-link">
					<i class="nav-icon fa fa-eye"></i>
					<p>
						<?php echo $this->lang->line('monitor_quarantine') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/RegisterCasec/set_register_case" class="nav-link">
					<i class="nav-icon fa fa-key"></i>
					<p>
						<?php echo $this->lang->line('register_case') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/UploadDatac/set_upload_data" class="nav-link">
					<i class="nav-icon fa ion-upload"></i>
					<p>
						<?php echo $this->lang->line('upload_data') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			
			<li class="nav-item">
				<a href="<?php echo base_url(); ?>index.php/Alertc/set_alert" class="nav-link">
					<i class="nav-icon fa fa-bell"></i>
					<p>
						<?php echo $this->lang->line('alert') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="nav-icon fas fa-copy"></i>
					<p>
						<?php echo $this->lang->line('reports') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url();?>index.php/NoResponseReceivedc/set_no_response_received" class="nav-link">
					<i class="nav-icon fa ion-eye-disabled"></i>
					<p>
						No Response Received
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
			<li class="nav-item has-treeview">
				<a href="#" class="nav-link">
					<i class="nav-icon fa ion-person-stalker"></i>
					<p>
					<?php echo $this->lang->line('manage_user') ?>
					<i class="right fas fa-angle-left"></i>
					</p>
				</a>
				<ul class="nav nav-treeview">
					<li class="nav-item">
						<a href="<?php echo base_url();?>index.php/Manage_Users/index" class="nav-link">
							<i class="nav-icon fas fa-edit"></i>
							<p><?php echo $this->lang->line('user_management') ?></p>
						</a>
					</li>
					<li class="nav-item">
						<a href="#" class="nav-link">
							<i class="fas fa-th mr-1 nav-icon"></i>
							<p><?php echo $this->lang->line('roles') ?></p>
						</a>
					</li>					
				</ul>
			</li>
			<li class="nav-item">
				<a href="<?php echo base_url();?>index.php/userc/signout" class="nav-link">
					<i class="nav-icon fa ion-power"></i>
					<p>
						<?php echo $this->lang->line('log_out') ?>
						<!--<span class="right badge badge-danger">New</span>-->
					</p>
				</a>
			</li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>