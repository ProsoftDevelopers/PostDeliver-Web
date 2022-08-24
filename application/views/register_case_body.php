<!-- Content Wrapper. Contains page content -->
	  <div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
		  <div class="container-fluid">
			<div class="row mb-2">
			  <div class="col-sm-6">
				<h1 class="m-0 text-dark"><?php echo $this->lang->line('register_case') ?></h1>
			  </div><!-- /.col -->
			  <div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
				  <li class="breadcrumb-item"><a href="#"><?php echo $this->lang->line('home') ?></a></li>
				  <li class="breadcrumb-item active"><?php echo $this->lang->line('register_case') ?></li>
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
					  <i class="nav-icon fas fa-edit"></i>
					  <?php echo $this->lang->line('enter_case_details') ?>
					</h3>
					<div class="card-tools">
					  <button type="submit" class="btn btn-primary" id="btn_save" onclick="save_register_case();"><?php echo $this->lang->line('save_information') ?></button>
					  <!--
					  <button type="button" class="btn btn-tool" data-card-widget="collapse">
						<i class="fas fa-minus"></i>
					  </button>                 
					  <button type="button" class="btn btn-tool" data-card-widget="remove">
						<i class="fas fa-times"></i>
					  </button>
					  -->
					</div>					
				  </div><!-- /.card-header -->
				  <div class="card-body">
					<section class="col-lg-12 connectedSortable">
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('id') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-minus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
										  <label for="patient_id" class="col-sm-4 control-label"><?php echo $this->lang->line('patient_id') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="patient_id" placeholder="<?php echo $this->lang->line('patient_id') ?>">
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label for="mobile_number" class="col-sm-4 control-label"><?php echo $this->lang->line('mobile_number') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="mobile_number" placeholder="<?php echo $this->lang->line('mobile_number') ?>">
										  </div>
										</div>	
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="person_name" class="col-sm-4 control-label"><?php echo $this->lang->line('patient_name') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="person_name" placeholder="<?php echo $this->lang->line('patient_name') ?>">
										  </div>
										</div>	
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="gender" class="col-sm-4 control-label"><?php echo $this->lang->line('gender') ?></label>
											<div class="col-sm-12">
												<!--<input type="text" class="form-control" id="gender" placeholder="Gender">-->
												<select id="gender" class="form-control">
												  <option>Male</option>
												  <option>Female</option>
												  <option>Other</option>												  
												</select>
											</div>											
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="age" class="col-sm-4 control-label"><?php echo $this->lang->line('age') ?></label>
										  <div class="col-sm-12">
											<input type="number" class="form-control" id="age" placeholder="<?php echo $this->lang->line('age') ?>">
										  </div>
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="occupation" class="col-sm-4 control-label"><?php echo $this->lang->line('occupation') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="occupation" placeholder="<?php echo $this->lang->line('occupation') ?>">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="maritial_status" class="col-sm-4 control-label"><?php echo $this->lang->line('marital_status') ?></label>
										  <div class="col-sm-12">
											<select id="maritial_status" class="form-control">
											  <option>Unmarried</option>
											  <option>Married</option>
											</select>
										  </div>
									  </div>
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('quarantine_details') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="datetillquarantined" class="col-sm-8 control-label"><?php echo $this->lang->line('date_until_quarantine') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="datetillquarantined" placeholder="<?php echo $this->lang->line('date_until_quarantine') ?>">
										  </div>
									  </div>
									</div>
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="quarantined_type" class="col-sm-6 control-label"><?php echo $this->lang->line('quarantine_type') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="quarantined_type" placeholder="<?php echo $this->lang->line('quarantine_type') ?>">
										  </div>
									  </div>
									</div>
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="symptom" class="col-sm-6 control-label"><?php echo $this->lang->line('symptoms') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="symptom" placeholder="<?php echo $this->lang->line('symptoms') ?>">
										  </div>
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="latitude" class="col-sm-4 control-label"><?php echo $this->lang->line('latitude') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="latitude" placeholder="<?php echo $this->lang->line('latitude') ?>">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="longitude" class="col-sm-4 control-label"><?php echo $this->lang->line('longitude') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="longitude" placeholder="<?php echo $this->lang->line('longitude') ?>">
										  </div>
									  </div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="reasonforquarantine" class="col-sm-8 control-label"><?php echo $this->lang->line('reason_for_quarantine') ?></label>
										  <div class="col-sm-12">											
											<select id="reasonforquarantine" class="form-control">
											  <option>Travel</option>
											  <option>In-Suspect Contact</option>
											</select>
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="incontactsuspecttype" class="col-sm-8 control-label"><?php echo $this->lang->line('in_contact_suspect_type') ?></label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="in_contact_suspect_type" placeholder="In Contact Suspect Type">-->											
											<select id="incontactsuspecttype" class="form-control">
											  <option>Foreigner</option>
											  <option>ForeignReturn</option>
											  <option>GoaReturn</option>
											  <option>MarkazReturn</option>
											  <option>Relative</option>
											  <option>Other</option>
											</select>
										  </div>
									  </div>
									</div>
								</div>								
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('address') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="house_no" class="col-sm-4 control-label"><?php echo $this->lang->line('house_number') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="house_no" placeholder="<?php echo $this->lang->line('house_number') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="street_locality" class="col-sm-4 control-label"><?php echo $this->lang->line('street_locality') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="street_locality" placeholder="<?php echo $this->lang->line('street_locality') ?>">
										  </div>
										</div>	
										<div class="form-group">
										  <label for="place_tehsil" class="col-sm-4 control-label"><?php echo $this->lang->line('place_tehsil') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="place_tehsil" placeholder="<?php echo $this->lang->line('place_tehsil') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="district_city" class="col-sm-4 control-label"><?php echo $this->lang->line('district_city') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="district_city" placeholder="<?php echo $this->lang->line('district_city') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="pin_code" class="col-sm-4 control-label"><?php echo $this->lang->line('pin_code') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="pin_code" placeholder="<?php echo $this->lang->line('pin_code') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="state_ut_province" class="col-sm-4 control-label"><?php echo $this->lang->line('state_ut_province') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="state_ut_province" placeholder="<?php echo $this->lang->line('state_ut_province') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="country" class="col-sm-4 control-label"><?php echo $this->lang->line('country') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="country" placeholder="<?php echo $this->lang->line('country') ?>">
										  </div>
										</div>
									</div>
								</div>								
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('travel_details') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="isforeignreturn_foreigner" class="col-sm-4 control-label"><?php echo $this->lang->line('is_foreign_return_foreigner') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="isforeignreturn_foreigner" placeholder="<?php echo $this->lang->line('is_foreign_return_foreigner') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="dateofarrival" class="col-sm-4 control-label"><?php echo $this->lang->line('date_of_arrival') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="dateofarrival" placeholder="<?php echo $this->lang->line('date_of_arrival') ?>">
										  </div>
										</div>	
										<div class="form-group">
										  <label for="port_of_originofjourney" class="col-sm-4 control-label"><?php echo $this->lang->line('port_of_origin_of_journey') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="port_of_originofjourney" placeholder="<?php echo $this->lang->line('port_of_origin_of_journey') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="country_of_originofjourney" class="col-sm-4 control-label"><?php echo $this->lang->line('country_of_origin_of_journey') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="country_of_originofjourney" placeholder="<?php echo $this->lang->line('country_of_origin_of_journey') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="port_of_finaldestination" class="col-sm-4 control-label"><?php echo $this->lang->line('port_of_final_destination') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="port_of_finaldestination" placeholder="<?php echo $this->lang->line('port_of_final_destination') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="country_of_finaldestination" class="col-sm-4 control-label"><?php echo $this->lang->line('country_of_destination_of_journey') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="country_of_finaldestination" placeholder="<?php echo $this->lang->line('country_of_destination_of_journey') ?>">
										  </div>
										</div>
										<div class="form-group">
										  <label for="finaldistrict_city" class="col-sm-4 control-label"><?php echo $this->lang->line('final_district_city') ?></label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="finaldistrict_city" placeholder="<?php echo $this->lang->line('final_district_city') ?>">
										  </div>
										</div>
									</div>
								</div>								
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('category_status') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="category" class="col-sm-4 control-label"><?php echo $this->lang->line('category') ?></label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="category" placeholder="Category">-->											
											<select id="category" class="form-control">
											  <option>Negative</option>
											  <option>Low Risk</option>
											  <option>High Risk</option>
											  <option>Positive</option>
											  <option>Relative</option>
											  <option>Other</option>
											</select>
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="status" class="col-sm-4 control-label"><?php echo $this->lang->line('status') ?></label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="status" placeholder="Status">-->
											<select id="status" class="form-control">
											  <option>Quarantine</option>
											  <option>Confirmed</option>
											  <option>Recovered</option>
											  <option>Deceased</option>
											  <option>Released</option>
											  <option>QuarantineComplete</option>
											  <option>Isolation</option>
											</select>
										  </div>
									  </div>
									</div>
								</div>
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('family_information') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<table id="family_information_datatable" class="table table-bordered table-hover">										
								</table>
								<button type="button" id="add_button_family" data-toggle="modal" data-target="#userModal_family_details" class="btn btn-info btn-lg" style="width:200px; line-height: 10px;"><?php echo $this->lang->line('add_new_record') ?></button>  
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
						<div class="card collapsed-card">
							<div class="card-header">
								<h3 class="card-title"><?php echo $this->lang->line('medical_history') ?></h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
									<i class="fas fa-plus"></i>
									</button>                 							
								</div>
							</div><!-- /.card-header -->
							<div class="card-body">
								<table id="medical_history_datatable" class="table table-bordered table-hover">										
								</table>
								<button type="button" id="add_button_medical_history" data-toggle="modal" data-target="#userModal_medical_history" class="btn btn-info btn-lg" style="width:200px; line-height: 10px;"><?php echo $this->lang->line('add_new_record') ?></button>  
							</div><!-- /.card-body -->
						</div>
						<!-- /.card -->
					</section>
				  </div><!-- /.card-body -->				  
				  <div class="card-footer">
					<button type="submit" class="btn btn-primary" id="btn_save" onclick="save_register_case();"><?php echo $this->lang->line('save_information') ?></button>
				  </div>
				  <div id="save_record_loader" class="overlay" style="display: none;">
					<i class="fas fa-3x fa-sync-alt fa-spin"></i>
					<div class="text-bold pt-2">Loading...</div>
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
		var oFamilyTable;
		var oMedicalHistoryTable;		
		
		var editor; // use a global for the submit and return data rendering in the examples
		
		var qFamilyGridData = [];
		var qMedicalHistoryData = [];
		
		//$('#datetimepicker1').datetimepicker();
		
		function save_register_case(){
			var person_name = document.getElementById("person_name").value;
			var patientMobileNumber = document.getElementById("mobile_number").value;
			
			if (person_name == "" || patientMobileNumber == ""){
				alert("Person Name & Mobile Number cannot be blank.");
				return;
			}
			
			var saveRecordLoader = document.getElementById("save_record_loader");
			saveRecordLoader.style.display = "block";
			
			$.post("<?php echo base_url();?>index.php/RegisterCasec/save_register_case", {
				'patient_id': document.getElementById("patient_id").value,
				'person_name': person_name,
				'mobile_number': patientMobileNumber,
				
				'pimage_path': "0", // document.getElementById("pimage_path").value,
				
				'age': document.getElementById("age").value,
				'gender': document.getElementById("gender").value,
				'house_no': document.getElementById("house_no").value,
				'street_locality': document.getElementById("street_locality").value,
				'place_tehsil': document.getElementById("place_tehsil").value,
				'district_city': document.getElementById("district_city").value,
				'pin_code': document.getElementById("pin_code").value,
				'state_ut_province': document.getElementById("state_ut_province").value,
				'country': document.getElementById("country").value,
				'latitude': document.getElementById("latitude").value,
				'longitude': document.getElementById("longitude").value,
				'quarantined_type': document.getElementById("quarantined_type").value,
				'maritial_status': document.getElementById("maritial_status").value,
				'occupation': document.getElementById("occupation").value,
				
				'aadharcardnumber': "", // document.getElementById("aadharcardnumber").value,
				
				'symptom': document.getElementById("symptom").value,
				
				'police_station': "", // document.getElementById("police_station").value,
				
				'isforeignreturn_foreigner': document.getElementById("isforeignreturn_foreigner").value,
				'dateofarrival': document.getElementById("dateofarrival").value,
				'datetillquarantined': document.getElementById("datetillquarantined").value,
				'port_of_originofjourney': document.getElementById("port_of_originofjourney").value,
				'port_of_finaldestination': document.getElementById("port_of_finaldestination").value,
				'finaldistrict_city': document.getElementById("finaldistrict_city").value,
				'country_of_originofjourney': document.getElementById("country_of_originofjourney").value,
				'country_of_finaldestination': document.getElementById("country_of_finaldestination").value,
				
				'last_latitude': "", // document.getElementById("last_latitude").value,
				'last_longitude': "", // document.getElementById("last_longitude").value,
				
				'reasonforquarantine': document.getElementById("reasonforquarantine").value,
				'incontactsuspecttype': document.getElementById("incontactsuspecttype").value,
				'status': document.getElementById("status").value,
				'category': document.getElementById("category").value,
				
				'parentid': "", // document.getElementById("parentid").value,
				
				'imei': "", // document.getElementById("imei").value,
				'device_id': "", // document.getElementById("device_id").value,
				'userid': "", // document.getElementById("userid").value,
				'createddate': "" // document.getElementById("createddate").value
			},
				function(data){
					if (data > 0){		
						saveFamilyDetails(patientMobileNumber);
						saveMedicalHistory(patientMobileNumber);
						
						$('#family_information_datatable').dataTable().fnClearTable();
						$('#medical_history_datatable').dataTable().fnClearTable();
						
						alert("Record saved successfully.");
						clearAllFields();
					}else{
						alert("Failed to save records.");
					}
					
					saveRecordLoader.style.display = "none";
			}, "json");
		}
		
		function saveFamilyDetails(patientMobileNumber){
			if (qFamilyGridData.length > 0){
				for(var i = 0; i < qFamilyGridData.length; i++){
					var person_name = qFamilyGridData[i].person_name;
					var fmobile_number = qFamilyGridData[i].fmobile_number;
					var pimage_path = qFamilyGridData[i].pimage_path;
					var age = qFamilyGridData[i].age;
					var gender = qFamilyGridData[i].gender;
					var occupation = qFamilyGridData[i].occupation;
					var relationship = qFamilyGridData[i].relationship;
					var house_no = qFamilyGridData[i].house_no;
					var street_locality = qFamilyGridData[i].street_locality;
					var place_tehsil = qFamilyGridData[i].place_tehsil;
					var district_city = qFamilyGridData[i].district_city;
					var pin_code = qFamilyGridData[i].pin_code;
					var state_ut_province = qFamilyGridData[i].state_ut_province;
					var country = qFamilyGridData[i].country;
					
					var mobile_number = patientMobileNumber;
					
					var userid = qFamilyGridData[i].userid;
					var createddate = qFamilyGridData[i].createddate;
					var zone = qFamilyGridData[i].zone;
							
					$.ajax({
						method: "POST",
						url: '<?php echo base_url();?>index.php/RegisterCasec/save_family_details',
						data: {
							"person_name" : person_name,
							"fmobile_number" : fmobile_number,
							"pimage_path" : pimage_path,
							"age" : age,
							"gender" : gender,
							"occupation" : occupation,
							"relationship" : relationship,
							"house_no" : house_no,
							"street_locality" : street_locality,
							"place_tehsil" : place_tehsil,
							"district_city" : district_city,
							"pin_code" : pin_code,
							"state_ut_province" : state_ut_province,
							"country" : country,
							
							"mobile_number" : mobile_number,
							
							"userid" : userid,
							"createddate" : createddate,
							"zone" : zone
						},
						cache: false,
						success: function (data, status, xhr) {
							// insert command is executed.
							//alert(data);
							//commit(true);
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							//alert(data);
							//commit(false);
						}
					});
				}
				
				qFamilyGridData = [];
			}
		}
		
		function saveMedicalHistory(patientMobileNumber){
			if (qMedicalHistoryData.length > 0){
				for(var i = 0; i < qMedicalHistoryData.length; i++){					
					var symptoms = qMedicalHistoryData[i].symptoms;
					var clinic = qMedicalHistoryData[i].clinic;
					var doctorconsulted = qMedicalHistoryData[i].doctorconsulted;
					var visit_date = qMedicalHistoryData[i].visit_date;
					var doctor_remark = qMedicalHistoryData[i].doctor_remark;
					
					var mobile_number = patientMobileNumber;
					
					var userid = qMedicalHistoryData[i].userid;
					var createddate = qMedicalHistoryData[i].createddate;
					var zone = qMedicalHistoryData[i].zone;  
							
					$.ajax({
						method: "POST",
						url: '<?php echo base_url();?>index.php/RegisterCasec/save_medical_history',
						data: {
							"symptoms" : symptoms,
							"clinic" : clinic,
							"doctorconsulted" : doctorconsulted,
							"visit_date" : visit_date,
							"doctor_remark" : doctor_remark,
							
							"mobile_number" : patientMobileNumber,
							
							"userid" : userid,
							"createddate" : createddate,
							"zone" : zone
						},
						cache: false,
						success: function (data, status, xhr) {
							// insert command is executed.
							//alert(data);
							//commit(true);
						},
						error: function(jqXHR, textStatus, errorThrown)
						{
							//alert(data);
							//commit(false);
						}
					});
				}
				
				qMedicalHistoryData = [];
			}
		}
		
		function clearAllFields(){
			document.getElementById("patient_id").value = "";
			document.getElementById("person_name").value = "";
			document.getElementById("mobile_number").value = "";
			
			//'pimage_path': "0", // document.getElementById("pimage_path").value = "";
			
			document.getElementById("age").value = "";
			document.getElementById("gender").value = "";
			document.getElementById("house_no").value = "";
			document.getElementById("street_locality").value = "";
			document.getElementById("place_tehsil").value = "";
			document.getElementById("district_city").value = "";
			document.getElementById("pin_code").value = "";
			document.getElementById("state_ut_province").value = "";
			document.getElementById("country").value = "";
			document.getElementById("latitude").value = "";
			document.getElementById("longitude").value = "";
			document.getElementById("quarantined_type").value = "";
			document.getElementById("maritial_status").value = "";
			document.getElementById("occupation").value = "";
			
			//'aadharcardnumber': "", // document.getElementById("aadharcardnumber").value = "";
			
			document.getElementById("symptom").value = "";
			
			//'police_station': "", // document.getElementById("police_station").value = "";
			
			document.getElementById("isforeignreturn_foreigner").value = "";
			document.getElementById("dateofarrival").value = "";
			document.getElementById("datetillquarantined").value = "";
			document.getElementById("port_of_originofjourney").value = "";
			document.getElementById("port_of_finaldestination").value = "";
			document.getElementById("finaldistrict_city").value = "";
			document.getElementById("country_of_originofjourney").value = "";
			document.getElementById("country_of_finaldestination").value = "";
			
			//'last_latitude': "", // document.getElementById("last_latitude").value = "";
			//'last_longitude': "", // document.getElementById("last_longitude").value = "";
			
			document.getElementById("reasonforquarantine").value = "";
			document.getElementById("incontactsuspecttype").value = "";
			document.getElementById("status").value = "";
			document.getElementById("category").value = "";
			
			//'parentid': "", // document.getElementById("parentid").value = "";
			
			//'imei': "", // document.getElementById("imei").value = "";
			//'device_id': "", // document.getElementById("device_id").value = "";
			//'userid': "", // document.getElementById("userid").value = "";
			//'createddate': "", // document.getElementById("createddate").value = "";
		}
	
		////////////////////////////////////////////////////
		// Start Family Details ////////////////////////////
		// Prepare Family Details DataTable
		if (oFamilyTable == null || oFamilyTable == "undefined"){
			oFamilyTable = $('#family_information_datatable').dataTable( {				
				"sScrollX": "100%",
				"sScrollXInner": "110%",				
				"initComplete": function () {
					$("#family_information_datatable").on("click", "tr[role='row']", function(){
						//$("#family_information_datatable tbody tr").removeClass('row_selected');        
						//$(this).addClass('row_selected');
						
						//var sMobileNo = $(this).children('td:first-child').text();							
					});
				},
				"columnDefs":[  
					{  
						"targets":[0, 1],  
						"orderable":false, 
						"searchable": false
					},
					{
						"targets": [2,17,18,19,20,21],
						"visible": false
					}  
				],
				"aoColumns": [
					/*
					{
						data: null,
						defaultContent: '',
						className: 'select-checkbox',
						orderable: false
					},
					*/
					{ "sTitle": "Edit", "mData": "update_btn" },
					{ "sTitle": "Delete", "mData": "delete_btn" },
					{ "sTitle": "Sl No", "mData": "slNo" },
					{ "sTitle": "Person Name", "mData": "person_name" },
					{ "sTitle": "FMobileNumber", "mData": "fmobile_number" },
					{ "sTitle": "Pimage/Path", "mData": "pimage_path" },
					{ "sTitle": "Age", "mData": "age" },
					{ "sTitle": "Gender", "mData": "gender" },
					{ "sTitle": "Occupation", "mData": "occupation" },
					{ "sTitle": "Relationship", "mData": "relationship" },
					{ "sTitle": "House Number", "mData": "house_no" },
					{ "sTitle": "Street/Locality", "mData": "street_locality" },
					{ "sTitle": "Place/Tehsil", "mData": "place_tehsil" },
					{ "sTitle": "District/City", "mData": "district_city" },
					{ "sTitle": "Pin", "mData": "pin_code" },
					{ "sTitle": "State/UT/Province", "mData": "state_ut_province" },
					{ "sTitle": "Country", "mData": "country" },
					{ "sTitle": "Mobile Number", "mData": "mobile_number" },
					{ "sTitle": "ID", "mData": "id" },
					{ "sTitle": "User ID", "mData": "userid" },
					{ "sTitle": "Created DateTime", "mData": "createddate" },
					{ "sTitle": "Zone", "mData": "zone" }
				]
			} );					
		}		

		// Insert dummy data into Family Details DataTable
		//$('#family_information_datatable').dataTable().fnAddData(qFamilyGridData);
		
		// Family Details Add New Record Button
		$('#add_button_family').click(function(){  
           $('#user_form_family_details')[0].reset();  
           $('.modal-title').text("Add User");  
           $('#action_family_details').val("Add");  
           //$('#user_uploaded_image').html('');  
		})
		
		// Family Details -- Perform Add OR Edit operation
		$(document).on('submit', '#user_form_family_details', function(event){  
			event.preventDefault();  
			
			var person_name = $('#um_fd_person_name').val();
			var fmobile_number = $('#um_fd_fmobile_number').val();
			var pimage_path = $('#um_fd_pimage_path').val();
			var age = $('#um_fd_age').val();
			var gender = $('#um_fd_gender').val();
			var occupation = $('#um_fd_occupation').val();
			var relationship = $('#um_fd_relationship').val();
			var house_no = $('#um_fd_house_no').val();
			var street_locality = $('#um_fd_street_locality').val();
			var place_tehsil = $('#um_fd_place_tehsil').val();
			var district_city = $('#um_fd_district_city').val();
			var pin_code = $('#um_fd_pin_code').val();
			var state_ut_province = $('#um_fd_state_ut_province').val();
			var country = $('#um_fd_country').val();
			var mobile_number = $('#um_fd_mobile_number').val();
			var userid = $('#um_fd_userid').val();
			var createddate = $('#um_fd_createddate').val();
			var zone = $('#um_fd_zone').val();  
			
			var extension = $('#um_fd_pimage_path').val().split('.').pop().toLowerCase();

			if(extension != '')  
			{  
				/*
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
				{  
					 alert("Invalid Image File");  
					 $('#um_fd_pimage_path').val('');  
					 return false;  
				}
				*/
			}       
			if(person_name != '' && fmobile_number != '')  
			{  
				var action = $('#action_family_details').val();
				var newRow = [];
				if (action == "Add"){
					var uID = getUniqueRowID(qFamilyGridData);
					newRow.push({ 
						"update_btn": '<button type="button" name="update" id='+ uID +' class="btn btn-warning btn-xs update">Update</button>',
						"delete_btn": '<button type="button" name="delete" id='+ uID +' class="btn btn-danger btn-xs delete">Delete</button>',
						"id" : uID,
						"slNo" : uID,
						"person_name" : person_name,
						"fmobile_number" : fmobile_number,
						"pimage_path" : pimage_path,
						"age" : age,
						"gender" : gender,
						"occupation" : occupation,
						"relationship" : relationship,
						"house_no" : house_no,
						"street_locality" : street_locality,
						"place_tehsil" : place_tehsil,
						"district_city" : district_city,
						"pin_code" : pin_code,
						"state_ut_province" : state_ut_province,
						"country" : country,
						"mobile_number" : mobile_number,
						"userid" : userid,
						"createddate" : createddate,
						"zone" : zone 
					});					
				}else{
					var uID = $('#um_fd_id').val();
					var parsedID = parseInt(uID);
					
					newRow.push({ 
						"update_btn": '<button type="button" name="update" id='+ parsedID +' class="btn btn-warning btn-xs update">Update</button>',
						"delete_btn": '<button type="button" name="delete" id='+ parsedID +' class="btn btn-danger btn-xs delete">Delete</button>',
						"id" : parsedID,
						"slNo" : uID,
						"person_name" : person_name,
						"fmobile_number" : fmobile_number,
						"pimage_path" : pimage_path,
						"age" : age,
						"gender" : gender,
						"occupation" : occupation,
						"relationship" : relationship,
						"house_no" : house_no,
						"street_locality" : street_locality,
						"place_tehsil" : place_tehsil,
						"district_city" : district_city,
						"pin_code" : pin_code,
						"state_ut_province" : state_ut_province,
						"country" : country,
						"mobile_number" : mobile_number,
						"userid" : userid,
						"createddate" : createddate,
						"zone" : zone 
					});
					
					var index = qFamilyGridData.findIndex(e => e.id === parsedID);
					$('#family_information_datatable').dataTable().fnDeleteRow(index);
					qFamilyGridData = qFamilyGridData.filter(e => e.id !== parsedID)
				}
				
				$('#user_form_family_details')[0].reset();  
				$('#userModal_family_details').modal('hide'); 
				$('#family_information_datatable').dataTable().fnAddData(newRow);				
				qFamilyGridData.push(newRow[0]);
			}  
			else  
			{  
				alert("Person_name & fmobile_number, both fields are required.");  
			}  
		});
		
		// Family Details -- Perform Update Operation
		$(document).on('click', '.update', function(){ 
			var uID = $(this).attr("id");
			var parsedID = parseInt(uID);
			var data = qFamilyGridData.filter(function(item) { return item.id === parsedID; });			
			
			$('#userModal_family_details').modal('show');
			
			$('#um_fd_person_name').val(data[0].person_name);
			$('#um_fd_fmobile_number').val(data[0].fmobile_number);
			$('#um_fd_pimage_path').val(data[0].pimage_path);
			$('#um_fd_age').val(data[0].age);
			$('#um_fd_gender').val(data[0].gender);
			$('#um_fd_occupation').val(data[0].occupation);
			$('#um_fd_relationship').val(data[0].relationship);
			$('#um_fd_house_no').val(data[0].house_no);
			$('#um_fd_street_locality').val(data[0].street_locality);
			$('#um_fd_place_tehsil').val(data[0].place_tehsil);
			$('#um_fd_district_city').val(data[0].district_city);
			$('#um_fd_pin_code').val(data[0].pin_code);
			$('#um_fd_state_ut_province').val(data[0].state_ut_province);
			$('#um_fd_country').val(data[0].country);
			$('#um_fd_mobile_number').val(data[0].mobile_number);
			$('#um_fd_userid').val(data[0].userid);
			$('#um_fd_createddate').val(data[0].createddate);
			$('#um_fd_zone').val(data[0].zone);
			$('#um_fd_id').val(parsedID);
			//$('#um_fd_userid').val(data[0].userid);
			//$('#um_fd_createddate').val(data[0].createddate);
			//$('#um_fd_zone').val(data[0].zone);
 
			$('.modal-title').text("Edit User");		
			
			//$('#um_fd_pimage_path').html(data.pimage_path);  
			$('#action_family_details').val("Edit");		   
		});
		
		// Family Details -- Perform Delete Operation
		$(document).on('click', '.delete', function(){  
			var rowID = $(this).attr("id");
			var parsedID = parseInt(rowID);
		   
			if(confirm("Are you sure you want to delete this?"))  
			{  
				var index = qFamilyGridData.findIndex(e => e.id === parsedID);
				$('#family_information_datatable').dataTable().fnDeleteRow(index);
				qFamilyGridData = qFamilyGridData.filter(e => e.id !== parsedID)
			}  
			else  
			{  
				return false;       
			}  
		});
		/////////////////////////////////////////////////
		// End Family Details ///////////////////////////
		
		
		
		/////////////////////////////////////////////////////
		// Start Medical History ////////////////////////////
		// Prepare Medical History DataTable
		if (oMedicalHistoryTable == null || oMedicalHistoryTable == "undefined"){
			oMedicalHistoryTable = $('#medical_history_datatable').dataTable( {
				"sScrollX": "100%",
				"sScrollXInner": "110%",				
				"initComplete": function () {
					$("#medical_history_datatable").on("click", "tr[role='row']", function(){
						//$("#medical_history_datatable tbody tr").removeClass('row_selected');        
						//$(this).addClass('row_selected');
						
						//var sMobileNo = $(this).children('td:first-child').text();							
					});
				},
				"columnDefs":[  
					{  
						"targets":[0, 1],  
						"orderable":false, 
						"searchable": false
					},
					{
						"targets": [2,8,9,10,11,12],
						"visible": false
					}  
				],
				"aoColumns": [
					{ "sTitle": "Edit", "mData": "update_btn", "sWidth": "10%" },
					{ "sTitle": "Delete", "mData": "delete_btn", "sWidth": "10%" },
					{ "sTitle": "Sl No", "mData": "slNo", "sWidth": "10%" },
					{ "sTitle": "Symptoms", "mData": "symptoms", "sWidth": "100px" },
					{ "sTitle": "Clinic", "mData": "clinic", "sWidth": "20%" },
					{ "sTitle": "DoctorConsulted", "mData": "doctorconsulted", "sWidth": "20%" },
					{ "sTitle": "VisitDate", "mData": "visit_date", "sWidth": "20%" },
					{ "sTitle": "DoctorRemarks", "mData": "doctor_remark", "sWidth": "20%" },
					{ "sTitle": "MobileNumber", "mData": "mobile_number", "sWidth": "20%" },						
					{ "sTitle": "ID", "mData": "id", "sWidth": "20%" },
					{ "sTitle": "User ID", "mData": "userid", "sWidth": "20%" },
					{ "sTitle": "Created DateTime", "mData": "createddate", "sWidth": "20%" },
					{ "sTitle": "Zone", "mData": "zone", "sWidth": "20%" }
				]
			} );					
		}
		
		// Insert dummy data into Medical History DataTable 
		//$('#medical_history_datatable').dataTable().fnAddData(qMedicalHistoryData);

		// Family Details Add New Record Button
		$('#add_button_medical_history').click(function(){  
           $('#user_form_medical_history')[0].reset();  
           $('.modal-title').text("Add User");  
           $('#action_medical_history').val("Add");  
           //$('#user_uploaded_image').html('');  
		})
		
		// Medical History -- Perform Add OR Edit operation
		$(document).on('submit', '#user_form_medical_history', function(event){  
			event.preventDefault();  
			
			//var id = $('#um_mh_id').val();
			var symptoms = $('#um_mh_symptoms').val();
			var clinic = $('#um_mh_clinic').val();
			var doctorconsulted = $('#um_mh_doctorconsulted').val();
			var visit_date = $('#um_mh_visit_date').val();
			var doctor_remark = $('#um_mh_doctor_remark').val();
			var mobile_number = $('#um_mh_mobile_number').val();
			var userid = $('#um_mh_userid').val();
			var createddate = $('#um_mh_createddate').val();
			var zone = $('#um_mh_zone').val();  
			
			if(symptoms != '' && clinic != '')  
			{  
				var action = $('#action_medical_history').val();
				var newRow = [];
				if (action == "Add"){
					var uID = getUniqueRowID(qMedicalHistoryData);
					newRow.push({ 
						"update_btn": '<button type="button" name="update_mh" id='+ uID +' class="btn btn-warning btn-xs update_mh">Update</button>',
						"delete_btn": '<button type="button" name="delete_mh" id='+ uID +' class="btn btn-danger btn-xs delete_mh">Delete</button>',
						"id" : uID,
						"slNo" : uID,
						"symptoms" : symptoms,
						"clinic" : clinic,
						"doctorconsulted" : doctorconsulted,
						"visit_date" : visit_date,
						"doctor_remark" : doctor_remark,
						"mobile_number" : mobile_number,						
						"userid" : userid,
						"createddate" : createddate,
						"zone" : zone 
					});					
				}else{
					var uID = $('#um_mh_id').val();
					var parsedID = parseInt(uID);
					
					newRow.push({ 
						"update_btn": '<button type="button" name="update_mh" id='+ parsedID +' class="btn btn-warning btn-xs update_mh">Update</button>',
						"delete_btn": '<button type="button" name="delete_mh" id='+ parsedID +' class="btn btn-danger btn-xs delete_mh">Delete</button>',
						"id" : parsedID,
						"slNo" : parsedID,
						"symptoms" : symptoms,
						"clinic" : clinic,
						"doctorconsulted" : doctorconsulted,
						"visit_date" : visit_date,
						"doctor_remark" : doctor_remark,
						"mobile_number" : mobile_number,						
						"userid" : userid,
						"createddate" : createddate,
						"zone" : zone  
					});
					
					var index = qMedicalHistoryData.findIndex(e => e.id === parsedID);
					$('#medical_history_datatable').dataTable().fnDeleteRow(index);
					qMedicalHistoryData = qMedicalHistoryData.filter(e => e.id !== parsedID)
				}
				
				$('#user_form_medical_history')[0].reset();  
				$('#userModal_medical_history').modal('hide'); 
				$('#medical_history_datatable').dataTable().fnAddData(newRow);				
				qMedicalHistoryData.push(newRow[0]);
			}  
			else  
			{  
				alert("Symptoms & Clinic, both fields are required.");  
			}  
		});
		
		// Medical History -- Perform Update Operation
		$(document).on('click', '.update_mh', function(){ 
			var uID = $(this).attr("id");
			var parsedID = parseInt(uID);
			var data = qMedicalHistoryData.filter(function(item) { return item.id === parsedID; });			
			
			$('#userModal_medical_history').modal('show');
			
			$('#um_mh_id').val(parsedID);
			$('#um_mh_symptoms').val(data[0].symptoms);
			$('#um_mh_clinic').val(data[0].clinic);
			$('#um_mh_doctorconsulted').val(data[0].doctorconsulted);
			$('#um_mh_visit_date').val(data[0].visit_date);
			$('#um_mh_doctor_remark').val(data[0].doctor_remark);
			$('#um_mh_mobile_number').val(data[0].mobile_number);
			$('#um_mh_userid').val(data[0].userid);
			$('#um_mh_createddate').val(data[0].createddate);
			$('#um_mh_zone').val(data[0].zone);
 
			$('.modal-title').text("Edit User");		
			
			//$('#um_fd_pimage_path').html(data.pimage_path);  
			$('#action_medical_history').val("Edit");		   
		});
		
		// Medical History -- Perform Delete Operation
		$(document).on('click', '.delete_mh', function(){  
			var rowID = $(this).attr("id");
			var parsedID = parseInt(rowID);
		   
			if(confirm("Are you sure you want to delete this?"))  
			{  
				var index = qMedicalHistoryData.findIndex(e => e.id === parsedID);
				$('#medical_history_datatable').dataTable().fnDeleteRow(index);
				qMedicalHistoryData = qMedicalHistoryData.filter(e => e.id !== parsedID)
			}  
			else  
			{  
				return false;       
			}  
		});
		/////////////////////////////////////////////////
		// End Medical History ///////////////////////////
		
		function getUniqueRowID(GridData){
			var id = 0;
			if (GridData.length > 0){
				id = GridData[GridData.length - 1]["id"];
				
				while(GridData.some(el => el.id === id)){
					id = id + 1;
				}
			}
			
			return id;
		}
	</script>