<ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('admin/Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
 
       
		<li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-id-card"></i>
            <span>Register Case </span></a>
        </li>
		<li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-upload"></i>
            <span>UploadData</span></a>
            <ul>
                <li><a class="nav-link" href="<?php echo site_url('admin/csv_importq'); ?>">Quarantine File</a></li>
                <li><a  class="nav-link" href="<?php echo site_url('admin/csv_import'); ?>">Movement File</a></li>
             </ul>
        </li>
				<li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/Movements'); ?>" target = _blank>
            <i class="fas fa-medkit"></i>
            <span>Monitor Quarantine</span></a>
                
        </li>
 
 		<li class="nav-item">
          <a class="nav-link" href="#">
            <i class="fas fa-list"></i>
            <span>Reports</span></a>
        </li>
 
	<li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('admin/Manage_Users'); ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage Users</span></a>
        </li>
      </ul>
