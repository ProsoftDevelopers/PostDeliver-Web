	<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
		  <!--
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user.png")" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Hi, Prosoft</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
		  -->
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
                        
            <li>
              <a href="<?php echo base_url(); ?>index.php/Userc/index">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			<li>
              <a href="">
                <i class="fa fa-user-plus"></i> <span>Register Case</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			<!--
			<li class="treeview">
				<a href="#" title="Upload Data">
					<i class="fa fa-table"></i> <span>Upload Data</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li title="Quarantine Data"><a href="quarantined_data_import.php" ><i class="fa fa-pencil-square-o"></i> <span>Quarantine Data</span></a></li>					
					<li title="CDR Data"><a href="cdr_data_import.php"><i class="fa fa-pencil-square-o"></i> <span>CDR Data</span></a></li>					
				</ul>
			</li>
			-->
			<li>
              <a href="<?php echo base_url(); ?>index.php/UploadDatac/set_upload_data">
                <i class="fa fa-user-plus"></i> <span>Upload Data</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			<li>
              <a href="<?php echo base_url(); ?>index.php/MonitorQuarantinec/set_monitor_quarantine">
                <i class="fa fa-user-plus"></i> <span>Monitor Quarantine</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			<li>
              <a href="">
                <i class="fa fa-user-plus"></i> <span>Reports</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			<li class="treeview">
				<a href="#" title="Manage User">
					<i class="fa fa-table"></i> <span>Manage User</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li title="User Management"><a href="" ><i class="fa fa-pencil-square-o"></i> <span>User Management</span></a></li>					
					<li title="Roles"><a href=""><i class="fa fa-pencil-square-o"></i> <span>Roles</span></a></li>					
				</ul>
			</li>
			<li>
              <a href="<?php echo base_url();?>index.php/userc/signout">
                <i class="fa fa-sign-out"></i> <span>Logout</span> <!--<small class="label pull-right bg-green">new</small>-->
              </a>
            </li>
			
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>