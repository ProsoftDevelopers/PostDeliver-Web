

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				CDR Data Import
				<small>Control panel</small>
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
						<h3 class="box-title">CDR Import</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">
						<script>
							function onclickImportCDR(){	
								var cdrLoader = document.getElementById("cdr_import_loader");
								cdrLoader.style.display = "block";
								
								//const file = document.querySelector('[type=file]').files[0]
								var file_data = $("#file_cdr").prop("files")[0]; 
								var formData = new FormData()
								formData.append('file', file_data)
								
								$.ajax({ 
							   
								   url: "<?php echo base_url();?>index.php/UploadDatac/save_cdr_import_data",
								   dataType: 'script',
									cache: false,
									contentType: false,
									processData: false,
									data: formData,                         // Setting the data attribute of ajax with file_data
									type: 'post'
								 }).done(function( data ) {
									if (data == "1"){
										var cdrSuccess = document.getElementById("cdr_import_success");
										cdrSuccess.style.display = "block";
									}else{
										var cdrFail = document.getElementById("cdr_import_fail");
										cdrFail.style.display = "block";
									}
									
									cdrLoader.style.display = "none";
									//alert(data);
								 });
							}
						</script>
						
						<div class="form-group">
							<label for="exampleInputFile">File Upload</label>
							<input type="file" name="file_cdr" id="file_cdr" size="150">
							<p class="help-block">Only Excel/CSV File Import.</p>
						</div>
						<button class="btn btn-default" name="upload_cdr_import" id="upload_cdr_import" onclick='onclickImportCDR();'>Upload</button>
						<div class="alert alert-success alert-dismissible" id="cdr_import_success" style="display : none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
							Data saved successfully.
						</div>
						<div class="alert alert-danger alert-dismissible" id="cdr_import_fail" style="display : none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Error!</h4>
							Failed to save data.
						</div>
						
						<?php
							/*
							$host         = "localhost"; // "localhost:3306"; "localhost";
							$username     = "root"; // "prosoftesol"; "root";
							$password     = "123"; // "Pro123$$"; "123";
							$dbname       = "test1"; // "prosoft"; "test1";
						
							$conn= mysqli_connect($host, $username, $password, $dbname);
							
							if(!$conn)
							{
								die('Could not Connect My Sql:' .mysqli_error());
							}
							$sql = "SELECT * from tbl_cdrmovements";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								echo "<br><Br><table border=1><tr><th>ID</th><th>CDRProfileID</th><th>CaseProfileID</th><th>CDRPhoneNo</th><th>CalledPhoneNo</th><th>ChargedParty</th><th>CallDate</th><th>CallTime</th></tr>";
							
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>".$row["id"]."</td><td>".$row["CDRProfileID"]."</td><td> ".$row["CaseProfileID"]."</td><td>".$row["CDRPhoneNo"]."</td></td><td>".$row["CalledPhoneNo"]."</td></td><td>".$row["ChargedParty"]."</td></td><td>".$row["CallDate"]."</td></td><td>".$row["CallTime"]."</td></tr>";
								}
								
								echo "</table>";
							} else {
								echo "No data";
							}
							$conn->close();
							*/
						?>
					</div>
					<div id="cdr_import_loader" class="overlay" style="display: none;">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>
				  </div>
				</div>
			</div>
			
			<div class="row">
				<div class="col-md-12">
				  <div class="box">
					<div class="box-header with-border">
						<h3 class="box-title">Quarantine Import</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						</div>
					</div>
					<div class="box-body">						
						<script>
							function onclickImportQuarantine(){	
								var qLoader = document.getElementById("quarantine_import_loader");
								qLoader.style.display = "block";
								
								//const file = document.querySelector('[type=file]').files[0]
								var q_file_data = $("#file_quarantine").prop("files")[0]; 
								var qformData = new FormData()
								qformData.append('file', q_file_data)
								
								$.ajax({ 
							   
								   url: "<?php echo base_url();?>index.php/UploadDatac/save_quarantine_import_data",
								   dataType: 'script',
									cache: false,
									contentType: false,
									processData: false,
									data: qformData,                         // Setting the data attribute of ajax with file_data
									type: 'post'
								 }).done(function( data ) {
									if (data == "1"){
										var qSuccess = document.getElementById("quarantine_import_success");
										qSuccess.style.display = "block";
									}else{
										var qFail = document.getElementById("quarantine_import_fail");
										qFail.style.display = "block";
									}
									qLoader.style.display = "none";
									//alert(data);
								 });
							}
						</script>

						
						<div class="form-group">
							<label for="exampleInputFile">File Upload</label>
							<input type="file" name="file_quarantine" id="file_quarantine" size="150">
							<p class="help-block">Only Excel/CSV File Import.</p>
						</div>
						<button class="btn btn-default" name="upload_quarantine_import" id="upload_quarantine_import" onclick='onclickImportQuarantine();'>Upload</button>
						<div class="alert alert-success alert-dismissible" id="quarantine_import_success" style="display : none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-check"></i> Success!</h4>
							Data saved successfully.
						</div>
						<div class="alert alert-danger alert-dismissible" id="quarantine_import_fail" style="display : none;">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<h4><i class="icon fa fa-ban"></i> Error!</h4>
							Failed to save data.
						</div>
						
						<?php
							/*
							$host         = "localhost"; // "localhost:3306"; "localhost";
							$username     = "root"; // "prosoftesol"; "root";
							$password     = "123"; // "Pro123$$"; "123";
							$dbname       = "test1"; // "prosoft"; "test1";
						
							$conn= mysqli_connect($host, $username, $password, $dbname);
							
							if(!$conn)
							{
								die('Could not Connect My Sql:' .mysqli_error());
							}
							$sql = "SELECT * from tbl_quarantine";

							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								echo "<br><Br><table border=1><tr><th>ID</th><th>Date of Arrival</th><th>Date until Quarantine </th><th>Country of origin</th><th>Port of Origin</th><th>Mobile</th><th>latitude</th><th>Longitude</th></tr>";
							
								// output data of each row
								while($row = $result->fetch_assoc()) {
									echo "<tr><td>".$row["id"]."</td><td>".$row["date_of_arrival"]."</td><td> ".$row["date_until_quarantined"]."</td><td>".$row["country_of_origin_of_journey"]."</td></td><td>".$row["port_of_origin_of_journey"]."</td></td><td>".$row["mobile_no"]."</td></td><td>".$row["last_latitude"]."</td></td><td>".$row["last_longitude"]."</td></tr>";
								}
								
								echo "</table>";
							} else {
								echo "No data";
							}
							$conn->close();
							*/
						?>
					</div>
					<div id="quarantine_import_loader" class="overlay" style="display: none;">
					  <i class="fa fa-refresh fa-spin"></i>
					</div>
				  </div>
				</div>
			</div>
		</section>
	</aside>

	