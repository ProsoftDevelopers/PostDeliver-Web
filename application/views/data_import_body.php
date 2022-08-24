	<style>
		table {
		  width:100%;
		  overflow: auto;		  
		}
		table, th, td {
		  font-size: 12px;
		  border: 1px solid black;
		  border-collapse: collapse;
		  white-space: nowrap;
		}
		th {
			height:35px;
		}
		td {
			
			padding: 5px;
			text-align: left;
		}
		tr {
			height:20px;
		}
				
		tr:nth-child(even) {background-color: #f2f2f2;}
		
		select {
			height:100%;
			width:100%;
			background-color: #A9CCE3;
			font-size: 14px;
		}			
	</style>
	
	<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark"><?php echo $this->lang->line('upload_data') ?></h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#"><?php echo $this->lang->line('home') ?></a></li>
				  <li class="breadcrumb-item active"><?php echo $this->lang->line('upload_data') ?></li>
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
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  <?php echo $this->lang->line('cdr_import') ?>
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
						<label for="exampleInputFile"><?php echo $this->lang->line('file_upload') ?></label>
						<input type="file" name="file_cdr" id="file_cdr" size="150">
						<p class="help-block"><?php echo $this->lang->line('only_excel_csv_file_import') ?></p>
					</div>
					<button class="btn btn-default" name="upload_cdr_import" id="upload_cdr_import" onclick='onclickImportCDR();'><?php echo $this->lang->line('upload') ?></button>
					<div class="alert alert-success alert-dismissible" id="cdr_import_success" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> <?php echo $this->lang->line('success') ?></h4>
						<?php echo $this->lang->line('data_saved_successfully') ?>
					</div>
					<div class="alert alert-danger alert-dismissible" id="cdr_import_fail" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line('error') ?></h4>
						<?php echo $this->lang->line('failed_to_save_data') ?>
					</div>
				  </div><!-- /.card-body -->
				  <div id="cdr_import_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  <?php echo $this->lang->line('quarantine_import') ?>
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
						<label for="exampleInputFile"><?php echo $this->lang->line('file_upload') ?></label>
						<input type="file" name="file_quarantine" id="file_quarantine" size="150">
						<p class="help-block"><?php echo $this->lang->line('only_excel_csv_file_import') ?></p>
					</div>
					<button class="btn btn-default" name="upload_quarantine_import" id="upload_quarantine_import" onclick='onclickImportQuarantine();'><?php echo $this->lang->line('upload') ?></button>
					<div class="alert alert-success alert-dismissible" id="quarantine_import_success" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> <?php echo $this->lang->line('success') ?></h4>
						<?php echo $this->lang->line('data_saved_successfully') ?>
					</div>
					<div class="alert alert-danger alert-dismissible" id="quarantine_import_fail" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line('error') ?></h4>
						<?php echo $this->lang->line('failed_to_save_data') ?>
					</div>
				  </div><!-- /.card-body -->
				  <div id="quarantine_import_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  CDR Import (With Mapping)
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
					<div class="form-group">						
						<label for="exampleInputFile">Select an excel file to import</label>
						<input type="file" name="file_cdr_with_mapping" id="file_cdr_with_mapping" size="150">
						<button class="btn btn-default" name="btn_view_file_data" id="btn_view_file_data" onclick='view_file_data();'>View file data</button>						
					</div>
					
					<div id="dvTable" style="height:70%;overflow:auto;"></div>
					<br>
					<button class="btn btn-default" name="btn_start_importing" id="btn_start_importing" onclick='importData();'>Start Importing</button>
										
					<div class="alert alert-success alert-dismissible" id="cdr_import_with_mapping_success" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> <?php echo $this->lang->line('success') ?></h4>
						<?php echo $this->lang->line('data_saved_successfully') ?>
					</div>
					<div class="alert alert-danger alert-dismissible" id="cdr_import_with_mapping_fail" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line('error') ?></h4>
						<?php echo $this->lang->line('failed_to_save_data') ?>
					</div>
					<script>
						var excelColumnCount = 0;
						var mData = [];
						var excelColumns = [];
						
						var btnStartCDRImportWithMapping = document.getElementById("btn_start_importing");						
						var cdrImportWithMappingSuccess = document.getElementById("cdr_import_with_mapping_success");
						var cdrImportWithMappingFailure = document.getElementById("cdr_import_with_mapping_fail");
						
						btnStartCDRImportWithMapping.style.display = "none";
												
						var mColumns = new Array();
										
						function view_file_data() { 
							excelColumnCount = 0;
							mData = [];
							$("#dvTable tr").remove();
							$("#dvTable_quarantine tr").remove(); 

							mColumns = [];
							mColumns = ["Select Column", "cdrprofileid", "caseprofileid", "cdrphoneno", "calledphoneno", "chargedparty", "calldate", "calltime", "typeofcall", "duration", 
										"cellsite", "lastcellsite_a", "firstcellsite_b", "lastcellsite_b", "imei", "imei_b", "imsi_a", "imsi_b", "category", "originalcdrphoneno", 
										"originalcalledphoneno", "ssicode_cola", "ssidesc_cola", "ssicode_colb", "ssidesc_colb", "typeofcall_r", "pp_po", "smscenter", "roamerdetails", 
										"cnumber", "rownumber", "serviceproviderstate_towerstate_a", "serviceprovidermasterid_a", "cellidaddress", "serviceprovidermasterid_b", 
										"serviceproviderstate_towerstate_b", "subname_a", "subaddress_a", "doa_a", "toa_a", "subname_b", "subaddress_b", "doa_b", "toa_b", "towername_a", 
										"toweraddress_a", "latitude_a", "longitude_a", "towername_b", "toweraddress_b", "latitude_b", "longitude_b", "spname_a", "spcircle_state_a", 
										"spcountry_a", "spname_b", "spcircle_state_b", "spcountry_b", "spplace_a", "spplace_b", "spmid_a", "spmid_b", "gmid", "gmname", 
										"azimuth_a", "azimuth_b", "category_a", "category_b", "ason_date_a", "ason_date_b"];
							
							 var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
							 /*Checks whether the file is a valid excel file*/  
							 if (regex.test($("#file_cdr_with_mapping").val().toLowerCase())) {  
								 var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
								 if ($("#file_cdr_with_mapping").val().toLowerCase().indexOf(".xlsx") > 0) {  
									 xlsxflag = true;  
								 }  
								 /*Checks whether the browser supports HTML5*/  
								 if (typeof (FileReader) != "undefined") {  
									 var reader = new FileReader();  
									 reader.onload = function (e) {  
										 var data = e.target.result;  
										 /*Converts the excel data in to object*/  
										 if (xlsxflag) {  
											 var workbook = XLSX.read(data, { type: 'binary' });  
										 }  
										 else {  
											 var workbook = XLS.read(data, { type: 'binary' });  
										 }  
										 /*Gets all the sheetnames of excel in to a variable*/  
										 var sheet_name_list = workbook.SheetNames;  
						  
										 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
										 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
											 /*Convert the cell value to Json*/  
											 if (xlsxflag) {  
												 var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
											 }  
											 else {  
												 var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
											 }  
											 if (exceljson.length > 0 && cnt == 0) {												
												BindTable(exceljson, '#dvTable');  
												cnt++;  
												btnStartCDRImportWithMapping.style.display = "block";
											 }  
										 });  
										 $('#dvTable').show();  
									 }  
									 if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
										 reader.readAsArrayBuffer($("#file_cdr_with_mapping")[0].files[0]);  
									 }  
									 else {  
										 reader.readAsBinaryString($("#file_cdr_with_mapping")[0].files[0]);  
									 }						
								 }  
								 else {  
									 alert("Sorry! Your browser does not support HTML5!");  
								 }  
							 }  
							 else {  
								 alert("Please upload a valid Excel file!");  
							 }  
						}
					
						function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
							mData = jsondata;
							var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/
							excelColumns = columns;
							excelColumnCount = columns.length;
							
							for(var i = 0; i < excelColumnCount; i++){
								var x = document.getElementById("sel" + i);					
								
								for(var val = 0; val < mColumns.length; val++){
									var option = document.createElement("option");
									option.text = mColumns[val];
									var sel = x.options[x.selectedIndex];  
									x.add(option, sel);
								}
							}
							
							var rowCount = 0; // restrict to read only first 10 rows 
							for (var i = 0; i < jsondata.length; i++) {  
								var row$ = $('<tr/>');  
								for (var colIndex = 0; colIndex < excelColumnCount; colIndex++) {  
									var cellValue = jsondata[i][columns[colIndex]];  
									if (cellValue == null)  
										 cellValue = ""; 
				
									row$.append($('<td/>').html(cellValue)); 							
								}
								
								if (rowCount < 10){
									$(tableid).append(row$);
								}
								
								rowCount ++;
							}  
						}  
						
						function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
							var columnSet = [];  
							var headerTr$ = $('<tr/>');
							var firstRow$ = $('<tr/>');
							
							var i = 0;
							for (var i = 0; i < jsondata.length; i++) {  
								 var rowHash = jsondata[i];  
								 for (var key in rowHash) {  
									 if (rowHash.hasOwnProperty(key)) {  
										 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/ 
											var select = document.createElement("select");
											select.name = "sel" + i;
											select.id = "sel" + i;				
											
											select.addEventListener(
												'change',
												function() { checkForMultipleSelection(this.id); },
												false
											);			
										
											var headerCell = document.createElement("TH");
											headerCell.appendChild(select);
											//row.appendChild(headerCell);
							
											columnSet.push(key);  
											headerTr$.append(headerCell); // headerTr$.append($('<td/>').html(key)); 
											firstRow$.append($('<td/>').html(key)); 
											
											i = i + 1;
										 }  
									 }  
								 }  
							}  
							$(tableid).append(headerTr$);  
							$(tableid).append(firstRow$);
							return columnSet;  
						}
					
						// Check for multiple selection
						function checkForMultipleSelection(id) {
							var val = document.getElementById(id).value;
							if (val !== "Select Column"){
								for (var col = 0; col < excelColumnCount; col++) {
									if (("sel" + col) !== id){
										var cSel = document.getElementById("sel" + col);
																	
										if (cSel.value !== "Select Column" && cSel.value == val){
											cSel.value = "Select Column";
										}
									}							
								}
							}
						}
						
						// Start Importing
						function importData(){
							var cdrImportWithMappingLoader = document.getElementById("cdr_import_with_mapping_loader");
							cdrImportWithMappingLoader.style.display = "block";
							
							var colArray = [];
							var bCDRPhoneNo = false;
							
							for (var col = 0; col < excelColumnCount; col++) {
								var cValue = document.getElementById("sel" + col).value;
								
								if (cValue !== "Select Column"){
									colArray.push({ mID: col, mValue: cValue});
									
									if (cValue == "cdrphoneno"){
										bCDRPhoneNo = true;
									}
								}
							}
							
							if (bCDRPhoneNo == false){
								cdrImportWithMappingLoader.style.display = "none";
								alert("CDR PhoneNo is required.");
								return;
							}
											
							var sColsList = "";
							for (var sCols = 0; sCols < colArray.length; sCols++){
								if (sColsList !== ""){
									sColsList += ", ";
								}
								
								sColsList += colArray[sCols].mValue;
							}
							
							var responseCount = 0;
							for (var row = 0; row < mData.length; row++){					
								var rowData = "(";
								
								for (var sCols = 0; sCols < colArray.length; sCols++){
									if (rowData !== "("){
										rowData += ", ";
									}
									
									var mSelectedColIndex = colArray[sCols].mID;
									var excelColumnName = excelColumns[mSelectedColIndex];
									rowData += "'" + mData[row][excelColumnName] + "'";
								}
								
								rowData += ")";
								
								var query = "INSERT INTO cdrhistory (" + sColsList + ") VALUES " + rowData + ";";				
								//alert(query);
								
								$.ajax({						   
									url: "<?php echo base_url();?>index.php/UploadDatac/save_import_data_with_mapping",									   
										data: { mquery : query},
										type: 'post'
									}).done(function( data ) {										
										//alert(data);
										responseCount ++;
										if (responseCount == mData.length){
											cdrImportWithMappingLoader.style.display = "none";
											cdrImportWithMappingSuccess.style.display = "block";
										}
									});
							}							
						}		
					</script>									
				  </div><!-- /.card-body -->
				  <div id="cdr_import_with_mapping_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			  <section class="col-lg-12 connectedSortable">
				<!-- Custom tabs (Charts with tabs)-->
				<div class="card">
				  <div class="card-header">
					<h3 class="card-title">
					  <i class="fas fa-th mr-1 nav-icon"></i>
					  Quarantine Import (With Mapping)
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
					<div class="form-group">						
						<label for="exampleInputFile">Select an excel file to import</label>
						<input type="file" name="file_quarantine_with_mapping" id="file_quarantine_with_mapping" size="150">
						<button class="btn btn-default" name="btn_view_file_data_quarantine" id="btn_view_file_data_quarantine" onclick='view_file_data_quarantine();'>View file data</button>						
					</div>
					
					<div id="dvTable_quarantine" style="height:70%;overflow:auto;"></div>
					<br>
					<button class="btn btn-default" name="btn_start_importing_quarantine" id="btn_start_importing_quarantine" onclick='importData_quarantine();'>Start Importing</button>
										
					<div class="alert alert-success alert-dismissible" id="quarantine_import_with_mapping_success" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-check"></i> <?php echo $this->lang->line('success') ?></h4>
						<?php echo $this->lang->line('data_saved_successfully') ?>
					</div>
					<div class="alert alert-danger alert-dismissible" id="quarantine_import_with_mapping_fail" style="display : none;">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
						<h4><i class="icon fa fa-ban"></i> <?php echo $this->lang->line('error') ?></h4>
						<?php echo $this->lang->line('failed_to_save_data') ?>
					</div>
					<script>
						
						var btnStartQuarantineImportWithMapping = document.getElementById("btn_start_importing_quarantine");						
						var quarantineImportWithMappingSuccess = document.getElementById("quarantine_import_with_mapping_success");
						var cdrImportWithMappingFailure = document.getElementById("quarantine_import_with_mapping_fail");
						
						btnStartQuarantineImportWithMapping.style.display = "none";												
						
										
						function view_file_data_quarantine() { 
							excelColumnCount = 0;
							mData = [];
							$("#dvTable tr").remove();
							$("#dvTable_quarantine tr").remove(); 
							
							mColumns = [];
							mColumns = ["Select Column", "patient_id", "person_name", "mobile_number", "pimage_path", "age", "gender", "house_no", "street_locality", 
										"place_tehsil", "district_city", "pin_code", "state_ut_province", "country", "latitude", "longitude", "quarantined_type", 
										"maritial_status", "occupation", "aadharcardnumber", "symptom", "police_station", "isforeignreturn_foreigner", 
										"dateofarrival", "datetillquarantined", "port_of_originofjourney", "port_of_finaldestination", "finaldistrict_city", 
										"country_of_originofjourney", "country_of_finaldestination", "last_latitude", "last_longitude", "reasonforquarantine", 
										"incontactsuspecttype", "status", "category", "parentid", "imei", "device_id", "userid", "createddate"];
							
							 var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.xlsx|.xls)$/;  
							 /*Checks whether the file is a valid excel file*/  
							 if (regex.test($("#file_quarantine_with_mapping").val().toLowerCase())) {  
								 var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
								 if ($("#file_quarantine_with_mapping").val().toLowerCase().indexOf(".xlsx") > 0) {  
									 xlsxflag = true;  
								 }  
								 /*Checks whether the browser supports HTML5*/  
								 if (typeof (FileReader) != "undefined") {  
									 var reader = new FileReader();  
									 reader.onload = function (e) {  
										 var data = e.target.result;  
										 /*Converts the excel data in to object*/  
										 if (xlsxflag) {  
											 var workbook = XLSX.read(data, { type: 'binary' });  
										 }  
										 else {  
											 var workbook = XLS.read(data, { type: 'binary' });  
										 }  
										 /*Gets all the sheetnames of excel in to a variable*/  
										 var sheet_name_list = workbook.SheetNames;  
						  
										 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
										 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
											 /*Convert the cell value to Json*/  
											 if (xlsxflag) {  
												 var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
											 }  
											 else {  
												 var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
											 }  
											 if (exceljson.length > 0 && cnt == 0) {												
												BindTable(exceljson, '#dvTable_quarantine');  
												cnt++;  
												btnStartQuarantineImportWithMapping.style.display = "block";
											 }  
										 });  
										 $('#dvTable_quarantine').show();  
									 }  
									 if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
										 reader.readAsArrayBuffer($("#file_quarantine_with_mapping")[0].files[0]);  
									 }  
									 else {  
										 reader.readAsBinaryString($("#file_quarantine_with_mapping")[0].files[0]);  
									 }						
								 }  
								 else {  
									 alert("Sorry! Your browser does not support HTML5!");  
								 }  
							 }  
							 else {  
								 alert("Please upload a valid Excel file!");  
							 }  
						}
						
						// Start Importing
						function importData_quarantine(){
							var quarantineImportWithMappingLoader = document.getElementById("quarantine_import_with_mapping_loader");
							quarantineImportWithMappingLoader.style.display = "block";
							
							var colArray = [];
							var bMobileNo = false;
							
							for (var col = 0; col < excelColumnCount; col++) {
								var cValue = document.getElementById("sel" + col).value;
								
								if (cValue !== "Select Column"){
									colArray.push({ mID: col, mValue: cValue});
									
									if (cValue == "mobile_number"){
										bMobileNo = true;
									}
								}
							}
							
							if (bMobileNo == false){
								quarantineImportWithMappingLoader.style.display = "none";
								alert("Mobile Number is required.");
								return;
							}
											
							var sColsList = "";
							for (var sCols = 0; sCols < colArray.length; sCols++){
								if (sColsList !== ""){
									sColsList += ", ";
								}
								
								sColsList += colArray[sCols].mValue;
							}
							
							var responseCount = 0;
							for (var row = 0; row < mData.length; row++){					
								var rowData = "(";
								
								for (var sCols = 0; sCols < colArray.length; sCols++){
									if (rowData !== "("){
										rowData += ", ";
									}
									
									var mSelectedColIndex = colArray[sCols].mID;
									var excelColumnName = excelColumns[mSelectedColIndex];
									rowData += "'" + mData[row][excelColumnName] + "'";
								}
								
								rowData += ")";
								
								var query = "INSERT INTO patient_master (" + sColsList + ") VALUES " + rowData + ";";				
								//alert(query);
								
								$.ajax({						   
									url: "<?php echo base_url();?>index.php/UploadDatac/save_import_data_with_mapping",									   
										data: { mquery : query},
										type: 'post'
									}).done(function( data ) {										
										//alert(data);
										responseCount ++;
										if (responseCount == mData.length){
											quarantineImportWithMappingLoader.style.display = "none";
											quarantineImportWithMappingSuccess.style.display = "block";
										}
									});
							}							
						}		
					</script>									
				  </div><!-- /.card-body -->
				  <div id="quarantine_import_with_mapping_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2"><?php echo $this->lang->line('loading') ?></div>
				  </div>
				</div>
				<!-- /.card -->
			  </section>
			</div>
			<!-- /.row (main row) -->
		  </div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	  </div>
	  <!-- /.content-wrapper -->
	  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script> 
	  
	<!-- jQuery -->
	<script src="../../plugins/jquery/jquery.min.js"></script>	
	<!-- Bootstrap 4 -->
	<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>	
	<!-- overlayScrollbars -->
	<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="../../dist/js/demo.js"></script>
	