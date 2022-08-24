<html>
<head>
    <title>Quarantine File Import</title>
    
<!-- Bootstrap core CSS-->
<?php echo link_tag('assests/vendor/bootstrap/css/bootstrap.min.css'); ?>
<!-- Custom fonts for this template-->
<?php echo link_tag('assests/vendor/fontawesome-free/css/all.min.css'); ?>
<!-- Page level plugin CSS-->
<?php echo link_tag('assests/vendor/datatables/dataTables.bootstrap4.css'); ?>
<!-- Custom styles for this template-->
<?php echo link_tag('assests/css/sb-admin.css'); ?>
</head>
 <body id="page-top">

   <?php include APPPATH.'views/admin/includes/header.php';?>
   <div id="wrapper">
      <!-- Sidebar -->
  <?php include APPPATH.'views/admin/includes/sidebar.php';?>

      <div id="content-wrapper">
          
 <div class="container-fluid">
   

  <form method="post" id="import_csvq" enctype="multipart/form-data">
   <div class="form-group">
    <label>Select CSV File</label>
    <input type="file" name="csv_fileq" id="csv_fileq" required accept=".csv" />
   </div>
   <br />
   <button type="submit" name="import_csvq" class="btn btn-info" id="import_csvq_btn">Import CSV</button>
  </form>
  <br />
  <div id="imported_csv_data"></div>
  <!---- Success Message ---->
<?php if ($this->session->flashdata('success')) { ?>
<p style="color:green; font-size:18px;"><?php echo $this->session->flashdata('success'); ?></p>
 
<?php } ?>

<!---- Error Message ---->
<?php if ($this->session->flashdata('error')) { ?>
<p style="color:red; font-size:18px;"><?php echo "error" .$this->session->flashdata('error');?></p>
<?php } ?> 

  </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
     

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>


      <script src="<?php echo base_url('assests/vendor/jquery/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url('assests/vendor/chart.js/Chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assests/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assests/js/sb-admin.min.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/datatables-demo.js'); ?>"></script>
    <script src="<?php echo base_url('assests/js/demo/chart-area-demo.js'); ?>"></script>

  
</body>
</html>

<script>
$(document).ready(function(){

 load_data();

 function load_data()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>admin/Csv_importq/load_dataq",
   method:"POST",
   success:function(data)
   {
    $('#imported_csv_data').html(data);
   }
  })
 }

 $('#import_csvq').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>admin/Csv_importq/importq",
   method:"POST",
   data:new FormData(this),
   contentType:false,
   cache:false,
   processData:false,
   beforeSend:function(){
    $('#import_csvq_btn').html('Importing...');
   },
   success:function(data)
   {
     //  alert("success"+data);
    $('#import_csvq')[0].reset();
    $('#import_csvq_btn').attr('disabled', false);
    $('#import_csvq_btn').html('Import Done');
    load_data();
   }
  })
 });
 
});
</script>