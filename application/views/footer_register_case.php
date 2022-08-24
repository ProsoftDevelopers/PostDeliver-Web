			   <footer class="main-footer">
			<div class="float-right d-none d-sm-block">
			  <b><?php echo $this->lang->line('version') ?></b> 1.0.0
			</div>
			<strong><?php echo $this->lang->line('copyright') ?> &copy; 2019-2020 <a href="http://prosoftesolutions.com"><?php echo $this->lang->line('prosoft_full_name') ?></a>.</strong> <?php echo $this->lang->line('all_rights_reserved') ?>
		  </footer>

		  <!-- Control Sidebar -->
		  <aside class="control-sidebar control-sidebar-dark">
			<!-- Add Content Here -->
		  </aside>
		  <!-- /.control-sidebar -->
		</div>
	  <!-- ./wrapper -->
	  
    </body>
</html>
<div id="userModal_family_details" class="modal fade">  
	<div class="modal-dialog">  
		<form method="post" id="user_form_family_details">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title">Add Family Member</h4>  
				</div>  
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<!--<div class="form-group"><label for="um_fd_id" class="col-sm-4 control-label">id</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_id" placeholder="id"></div></div>-->
							<div class="form-group"><label for="um_fd_person_name" class="col-sm-4 control-label">Person Name</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_person_name" placeholder="Person Name"></div></div>
							<div class="form-group"><label for="um_fd_fmobile_number" class="col-sm-4 control-label">FMobile Number</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_fmobile_number" placeholder="FMobile Number"></div></div>
							<div class="form-group"><label for="um_fd_pimage_path" class="col-sm-4 control-label">PImage Path</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_pimage_path" placeholder="PImage Path"></div></div>
							<div class="form-group"><label for="um_fd_age" class="col-sm-4 control-label">Age</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_age" placeholder="Age"></div></div>
							<div class="form-group"><label for="um_fd_gender" class="col-sm-4 control-label">Gender</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_gender" placeholder="Gender"></div></div>
							<div class="form-group"><label for="um_fd_occupation" class="col-sm-4 control-label">Occupation</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_occupation" placeholder="Occupation"></div></div>
							<div class="form-group"><label for="um_fd_relationship" class="col-sm-4 control-label">Relationship</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_relationship" placeholder="Relationship"></div></div>
							<div class="form-group"><label for="um_fd_house_no" class="col-sm-4 control-label">House No</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_house_no" placeholder="House No"></div></div>
							<div class="form-group"><label for="um_fd_street_locality" class="col-sm-4 control-label">Street/Locality</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_street_locality" placeholder="Street/Locality"></div></div>
							<div class="form-group"><label for="um_fd_place_tehsil" class="col-sm-4 control-label">Place/Tehsil</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_place_tehsil" placeholder="Place/Tehsil"></div></div>
							<div class="form-group"><label for="um_fd_district_city" class="col-sm-4 control-label">District/City</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_district_city" placeholder="District/City"></div></div>
							<div class="form-group"><label for="um_fd_pin_code" class="col-sm-4 control-label">Pin Code</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_pin_code" placeholder="Pin Code"></div></div>
							<div class="form-group"><label for="um_fd_state_ut_province" class="col-sm-4 control-label">State/UT/Province</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_state_ut_province" placeholder="State/UT/Province"></div></div>
							<div class="form-group"><label for="um_fd_country" class="col-sm-4 control-label">Country</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_country" placeholder="Country"></div></div>
							<!--<div class="form-group"><label for="um_fd_mobile_number" class="col-sm-4 control-label">Mobile Number</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_mobile_number" placeholder="mobile_number"></div></div>-->
							<!--<div class="form-group"><label for="um_fd_userid" class="col-sm-4 control-label">userid</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_userid" placeholder="userid"></div></div>-->
							<!--<div class="form-group"><label for="um_fd_createddate" class="col-sm-4 control-label">createddate</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_createddate" placeholder="createddate"></div></div>-->
							<!--<div class="form-group"><label for="um_fd_zone" class="col-sm-4 control-label">zone</label><div class="col-sm-12"><input type="text" class="form-control" id="um_fd_zone" placeholder="zone"></div></div>-->
						</div>
					</div>
				</div>  
				<div class="modal-footer">  
					<input type="hidden" name="um_fd_id" id="um_fd_id" />
					<input type="hidden" name="um_fd_mobile_number" id="um_fd_mobile_number" />
					<input type="hidden" name="um_fd_userid" id="um_fd_userid" />
					<input type="hidden" name="um_fd_createddate" id="um_fd_createddate" />
					<input type="hidden" name="um_fd_zone" id="um_fd_zone" />
					<input type="submit" name="action_family_details" id="action_family_details" class="btn btn-success" value="Add" />  
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
				</div>
			</div>  
		</form>  
	</div>  
</div>
<div id="userModal_medical_history" class="modal fade">  
	<div class="modal-dialog">  
		<form method="post" id="user_form_medical_history">  
			<div class="modal-content">  
				<div class="modal-header">  
					<button type="button" class="close" data-dismiss="modal">&times;</button>  
					<h4 class="modal-title">Add Medical History</h4>  
				</div>  
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">							
							<!--<div class="form-group"><label for="um_mh_id" class="col-sm-4 control-label">id</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_id" placeholder="id"></div></div>-->
							<div class="form-group"><label for="um_mh_symptoms" class="col-sm-4 control-label">Symptoms</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_symptoms" placeholder="Symptoms"></div></div>
							<div class="form-group"><label for="um_mh_clinic" class="col-sm-4 control-label">Clinic</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_clinic" placeholder="Clinic"></div></div>
							<div class="form-group"><label for="um_mh_doctorconsulted" class="col-sm-4 control-label">Doctor Consulted</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_doctorconsulted" placeholder="Doctor Consulted"></div></div>
							<div class="form-group"><label for="um_mh_visit_date" class="col-sm-4 control-label">Visit Date</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_visit_date" placeholder="Visit Date"></div></div>
							<div class="form-group"><label for="um_mh_doctor_remark" class="col-sm-4 control-label">Doctor Remark</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_doctor_remark" placeholder="Doctor Remark"></div></div>
							<!--<div class="form-group"><label for="um_mh_mobile_number" class="col-sm-4 control-label">Mobile Number</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_mobile_number" placeholder="mobile_number"></div></div>-->
							<!--<div class="form-group"><label for="um_mh_userid" class="col-sm-4 control-label">userid</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_userid" placeholder="userid"></div></div>-->
							<!--<div class="form-group"><label for="um_mh_createddate" class="col-sm-4 control-label">createddate</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_createddate" placeholder="createddate"></div></div>-->
							<!--<div class="form-group"><label for="um_mh_zone" class="col-sm-4 control-label">zone</label><div class="col-sm-12"><input type="text" class="form-control" id="um_mh_zone" placeholder="zone"></div></div>-->
						</div>
					</div>
				</div>  
				<div class="modal-footer">  
					<input type="hidden" name="um_mh_id" id="um_mh_id" />
					<input type="hidden" name="um_mh_mobile_number" id="um_mh_mobile_number" />
					<input type="hidden" name="um_mh_userid" id="um_mh_userid" />
					<input type="hidden" name="um_mh_createddate" id="um_mh_createddate" />
					<input type="hidden" name="um_mh_zone" id="um_mh_zone" />
					<input type="submit" name="action_medical_history" id="action_medical_history" class="btn btn-success" value="Add" />  
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
				</div>
			</div>  
		</form>  
	</div>  
</div>
	  