

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
            <li class="breadcrumb-item active">Manage Users</li>
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
                
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User Name</th>
                      <th>Designation</th>
                      <th>Email id</th>
                      <th>Department</th>
                      <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                  </thead>
               <!--   <tfoot>
                      <tr>
                      <th>#</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Email id</th>
                      <th>Reg date</th>
                      <th>Action</th>
                    </tr>
                  </tfoot> -->
                  <tbody>

<?php
if(count($userdetails)) :
$cnt=1; 
foreach ($userdetails as $row) :
?>                    
                    <tr>
                      <td><?php echo htmlentities($cnt);?></td>
                      <td><?php echo htmlentities($row->username)?></td>
                      <td><?php echo htmlentities($row->designation)?></td>
                      <td><?php echo htmlentities($row->emailid)?></td>
                      <td><?php echo htmlentities($row->department)?></td>
                      <td><?php echo htmlentities($row->mobile_number)?></td>
                      <td><?php echo  anchor("Manage_Users/getuserdetail/{$row->id}",' ','class="fa fa-edit"')?>
                                            
                      <a href="<?php echo base_url(); ?>index.php/Manage_Users/deleteuser/<?php echo $row->id; ?>" onclick="return confirm('Are you sure to delete?')" class="fa fa-trash"></a>
                      </td>
                    </tr>
 <?php 
$cnt++;
endforeach;
else : ?>

<tr>
<td colspan="6">No Record found</td>
</tr>
<?php
endif;
?>                
              
        
                  </tbody>
                </table>
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
	
 <script type="text/javascript">
    
</script>