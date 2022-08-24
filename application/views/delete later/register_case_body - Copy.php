		
		
		
		<aside class="right-side">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Register Case
					<small>Register Case</small>
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
						  <h3 class="box-title">Enter Case Details</h3>
						  <!--
						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						  -->
						</div>						
						<div class="box-body">
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">ID</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<div class="col-md-6">
										<div class="form-group">
										  <label for="patient_id" class="col-sm-4 control-label">Patient ID</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="patient_id" placeholder="Patient ID">
										  </div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
										  <label for="patient_mobile_number" class="col-sm-4 control-label">Mobile Number</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="patient_mobile_number" placeholder="Mobile Number">
										  </div>
										</div>	
									</div>
									<div class="col-md-12">
										<div class="form-group">
										  <label for="patient_name" class="col-sm-4 control-label">Patient Name</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="patient_name" placeholder="Patient Name">
										  </div>
										</div>	
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="gender" class="col-sm-4 control-label">Gender</label>
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
										  <label for="age" class="col-sm-4 control-label">Age</label>
										  <div class="col-sm-12">
											<input type="number" class="form-control" id="age" placeholder="Age">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="occupation" class="col-sm-4 control-label">Occupation</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="occupation" placeholder="Occupation">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="marital_status" class="col-sm-4 control-label">Marital Status</label>
										  <div class="col-sm-12">
											<select id="marital_status" class="form-control">
											  <option>Unmarried</option>
											  <option>Married</option>
											</select>
										  </div>
									  </div>
									</div>
								</div>
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Quarantine Details</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">	
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="date_until_quarantine" class="col-sm-8 control-label">Date Until Quarantine</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="date_until_quarantine" placeholder="Date Until Quarantine">
										  </div>
									  </div>
									</div>
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="quarantine_type" class="col-sm-6 control-label">Quarantine Type</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="quarantine_type" placeholder="Quarantine Type">
										  </div>
									  </div>
									</div>
									<div class="col-md-4">
									  <div class="form-group">
										  <label for="symptoms" class="col-sm-6 control-label">Symptoms</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="symptoms" placeholder="Symptoms">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="latitude" class="col-sm-4 control-label">Latitude</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="latitude" placeholder="Latitude">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="longitude" class="col-sm-4 control-label">Longitude</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="longitude" placeholder="Longitude">
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="reason_for_quarantine" class="col-sm-8 control-label">Reason For Quarantine</label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="reason_for_quarantine" placeholder="Reason For Quarantine">-->
											<select id="reason_for_quarantine" class="form-control">
											  <option>Travel</option>
											  <option>In-Suspect Contact</option>
											</select>
										  </div>
									  </div>
									</div>
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="in_contact_suspect_type" class="col-sm-8 control-label">In Contact Suspect Type</label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="in_contact_suspect_type" placeholder="In Contact Suspect Type">-->											
											<select id="reason_for_quarantine" class="form-control">
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
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Address</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="house_number" class="col-sm-4 control-label">House Number</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="house_number" placeholder="House Number">
										  </div>
										</div>
										<div class="form-group">
										  <label for="street_locality" class="col-sm-4 control-label">Street/Locality</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="street_locality" placeholder="Street/Locality">
										  </div>
										</div>	
										<div class="form-group">
										  <label for="place_tehsil" class="col-sm-4 control-label">Place/Tehsil</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="place_tehsil" placeholder="Place/Tehsil">
										  </div>
										</div>
										<div class="form-group">
										  <label for="district_city" class="col-sm-4 control-label">District/City</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="district_city" placeholder="Street/Locality">
										  </div>
										</div>
										<div class="form-group">
										  <label for="pin_code" class="col-sm-4 control-label">Pin Code</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="pin_code" placeholder="Street/Locality">
										  </div>
										</div>
										<div class="form-group">
										  <label for="state_ut_locality" class="col-sm-4 control-label">State/UT/Province</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="state_ut_locality" placeholder="Street/Locality">
										  </div>
										</div>
										<div class="form-group">
										  <label for="country" class="col-sm-4 control-label">Country</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="country" placeholder="Country">
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Travel Details</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<div class="col-md-12">
										<div class="form-group">
										  <label for="is_foreign_return_foreigner" class="col-sm-4 control-label">Is Foreign Return/Foreiner</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="is_foreign_return_foreigner" placeholder="Is Foreign Return/Foreiner">
										  </div>
										</div>
										<div class="form-group">
										  <label for="date_of_arrival" class="col-sm-4 control-label">Date of Arrival</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="date_of_arrival" placeholder="Date of Arrival">
										  </div>
										</div>	
										<div class="form-group">
										  <label for="part_of_origin_of_journey" class="col-sm-4 control-label">Part of Origin of Journey</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="part_of_origin_of_journey" placeholder="Part of Origin of Journey">
										  </div>
										</div>
										<div class="form-group">
										  <label for="country_of_origin_of_journey" class="col-sm-4 control-label">Country of Origin of Journey</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="country_of_origin_of_journey" placeholder="Country of Origin of Journey">
										  </div>
										</div>
										<div class="form-group">
										  <label for="port_of_final_destination" class="col-sm-4 control-label">Port of Final Destination</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="port_of_final_destination" placeholder="Port of Final Destination">
										  </div>
										</div>
										<div class="form-group">
										  <label for="state_ut_locality" class="col-sm-4 control-label">Country of Destination of Journey</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="state_ut_locality" placeholder="Street/Locality">
										  </div>
										</div>
										<div class="form-group">
										  <label for="final_district_city" class="col-sm-4 control-label">Final District/City</label>
										  <div class="col-sm-12">
											<input type="text" class="form-control" id="final_district_city" placeholder="Final District/City">
										  </div>
										</div>
									</div>
								</div>
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Category/Status</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<div class="col-md-6">
									  <div class="form-group">
										  <label for="category" class="col-sm-4 control-label">Category</label>
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
										  <label for="status" class="col-sm-4 control-label">Status</label>
										  <div class="col-sm-12">
											<!--<input type="text" class="form-control" id="status" placeholder="Status">-->
											<select id="category" class="form-control">
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
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Family Information</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<table id="family_information_datatable" class="table table-bordered table-hover">										
									</table>
								</div>
							</div>
							<div class="box">
								<div class="box-header with-border">
									<h3 class="box-title">Medical History</h3>
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>										
										<!--<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
									</div>
								</div>
								<div class="box-body">
									<table id="medical_history_datatable" class="table table-bordered table-hover">										
									</table>
								</div>
							</div>
						</div>						  
						<!-- /.box-body -->
						<div class="box-footer">
						  <button type="submit" class="btn btn-primary" id="btn_save">Save Information</button>
					    </div>
						<div id="get_violators_loader" class="overlay" style="display: none;">
						  <i class="fa fa-refresh fa-spin"></i>
						</div>
					  </div>
					  <!-- /.box -->
					</div>
				</div>

		<!--
		<script src="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"></script>
		<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
		-->
		
		<script src="plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
		
		
		
		<script>
			var oFamilyTable;
			var oMedicalHistoryTable;
			
			var editor; // use a global for the submit and return data rendering in the examples
			
			var qFamilyGridData = [];
			var qMedicalHistoryData = [];
			
			//$('#datetimepicker1').datetimepicker();
			
			qFamilyGridData.push([1, "Test1","","","","","","","","","","","","","","","","",""]);
			qFamilyGridData.push([2, "Test2","","","","","","","","","","","","","","","","",""]);
			
			if (oFamilyTable == null || oFamilyTable == "undefined"){
				oFamilyTable = $('#family_information_datatable').dataTable( {
					"aLengthMenu": [[5, 10], [5, 10]],
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
					"bAutoWidth": false,
					"responsive": true,
					"sScrollX": "100%",
					"sScrollXInner": "110%",
					"bScrollCollapse": true,
					"aaSorting":[[0, "desc"]],
					"bJQueryUI":true,
					 editing: true,
					//"aaData": qFamilyGridData,
					"initComplete": function () {
						$("#family_information_datatable").on("click", "tr[role='row']", function(){
							$("#family_information_datatable tbody tr").removeClass('row_selected');        
							$(this).addClass('row_selected');
							
							var sMobileNo = $(this).children('td:first-child').text();							
							//getMovements(sMobileNo);
						});
					},
					"aoColumns": [
						{
							data: null,
							defaultContent: '',
							className: 'select-checkbox',
							orderable: false
						},
						{ "sTitle": "Sl No", "sWidth": "10%" },
						{ "sTitle": "Person Name", "sWidth": "100px" },
						{ "sTitle": "FMobileNumber", "sWidth": "20%" },
						{ "sTitle": "Pimage/Path", "sWidth": "20%" },
						{ "sTitle": "Age", "sWidth": "20%" },
						{ "sTitle": "Gender", "sWidth": "20%" },
						{ "sTitle": "Occupation", "sWidth": "20%" },
						{ "sTitle": "Relationship", "sWidth": "20%" },
						{ "sTitle": "House Number", "sWidth": "20%" },
						{ "sTitle": "Street/Locality", "sWidth": "20%" },
						{ "sTitle": "Place/Tehsil", "sWidth": "20%" },
						{ "sTitle": "District/City", "sWidth": "20%" },
						{ "sTitle": "Pin", "sWidth": "20%" },
						{ "sTitle": "State/UT/Province", "sWidth": "20%" },
						{ "sTitle": "Country", "sWidth": "20%" },
						{ "sTitle": "Mobile Number", "sWidth": "20%" },
						{ "sTitle": "User ID", "sWidth": "20%", "bVisible": false },
						{ "sTitle": "Created DateTime", "sWidth": "20%", "bVisible": false },
						{ "sTitle": "Zone", "sWidth": "20%", "bVisible": false }
					],
					select: {
						style:    'os',
						selector: 'td:first-child'
					},
					buttons: [
						{ extend: "create", editor: editor },
						{ extend: "edit",   editor: editor },
						{ extend: "remove", editor: editor }
					]
				} );					
			}
			
			/* Apply the jEditable handlers to the table */
			oFamilyTable.$('td').editable( '../examples_support/editable_ajax.php', {
				"callback": function( sValue, y ) {
					var aPos = oFamilyTable.fnGetPosition( this );
					oFamilyTable.fnUpdate( sValue, aPos[0], aPos[1] );
				},
				"submitdata": function ( value, settings ) {
					return {
						"row_id": this.parentNode.getAttribute('id'),
						"column": oFamilyTable.fnGetPosition( this )[2]
					};
				},
				"height": "14px",
				"width": "100%"
			} );
			
			if (oMedicalHistoryTable == null || oMedicalHistoryTable == "undefined"){
				oMedicalHistoryTable = $('#medical_history_datatable').dataTable( {
					"aLengthMenu": [[5, 10], [5, 10]],
					"paging": true,
					"lengthChange": false,
					"searching": false,
					"ordering": true,
					"info": true,
					"autoWidth": false,
					"bAutoWidth": false,
					"responsive": true,
					"sScrollX": "100%",
					"sScrollXInner": "110%",
					"bScrollCollapse": true,
					"aaSorting":[[0, "desc"]],
					"bJQueryUI":true,
					//"aaData": qMedicalHistoryData,
					"initComplete": function () {
						$("#family_information_datatable").on("click", "tr[role='row']", function(){
							$("#family_information_datatable tbody tr").removeClass('row_selected');        
							$(this).addClass('row_selected');
							
							var sMobileNo = $(this).children('td:first-child').text();							
							//getMovements(sMobileNo);
						});
					},
					"aoColumns": [
						{ "sTitle": "Sl No", "sWidth": "10%" },
						{ "sTitle": "Symptoms", "sWidth": "100px" },
						{ "sTitle": "Clinic", "sWidth": "20%" },
						{ "sTitle": "DoctorConsulted", "sWidth": "20%" },
						{ "sTitle": "VisitDate", "sWidth": "20%" },
						{ "sTitle": "DoctorRemarks", "sWidth": "20%" },
						{ "sTitle": "MobileNumber", "sWidth": "20%" },						
						{ "sTitle": "User ID", "sWidth": "20%", "bVisible": false },
						{ "sTitle": "Created DateTime", "sWidth": "20%", "bVisible": false },
						{ "sTitle": "Zone", "sWidth": "20%", "bVisible": false }
					]
				} );					
			}
				
			$('#family_information_datatable').dataTable().fnAddData(qFamilyGridData);
			//$('#medical_history_datatable').dataTable().fnAddData(qMedicalHistoryData);
			
			/*
			$('#addRow').on( 'click', function () {
				t.row.add( [
					counter +'.1',
					counter +'.2',
					counter +'.3',
					counter +'.4',
					counter +'.5'
				] ).draw( false );
		 
				counter++;
			} );
		 
			// Automatically add a first row of data
			$('#addRow').click();
			*/
			
			/*
			editor = new $.fn.dataTable.Editor( {
				//ajax: "../php/staff.php",
				table: "#family_information_datatable",
				fields: [ {
						label: "First name:",
						name: "first_name"
					}, {
						label: "Last name:",
						name: "last_name"
					}, {
						label: "Position:",
						name: "position"
					}, {
						label: "Office:",
						name: "office"
					}, {
						label: "Extension:",
						name: "extn"
					}, {
						label: "Start date:",
						name: "start_date",
						type: "datetime"
					}, {
						label: "Salary:",
						name: "salary"
					}
				]
			} );
		 
			// Activate an inline edit on click of a table cell
			$('#family_information_datatable').on( 'click', 'tbody td:not(:first-child)', function (e) {
				editor.inline( this );
			} );
			*/
		 
			
		</script>
					
				<div class="row">
					<div class="col-md-6">

					</div><!-- ./col -->
				</div><!-- /.row -->
			</section>
	  </aside>