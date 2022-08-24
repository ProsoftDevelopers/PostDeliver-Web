<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_importq extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('Csv_importq_model');
  $this->load->library('Csvimport');
 }

 function index()
 {
  $this->load->view('admin/csv_importq');
 }

 function load_dataq()
 {
  $result = $this->Csv_importq_model->selectq();
  $output = '
   <h3 align="center">Imported Quarantine Details  </h3>
        <div class="table-responsive">
         <table class="table table-bordered table-striped">
          <tr>
           <th>Sr. No</th>
           <th>Date of Arrival</th>
           <th>Date until Quaratine</th>
           <th>Country</th>
           <th>Port</th>
          </tr>
  ';
  $count = 0;
  if($result->num_rows() > 0)
  {
   foreach($result->result() as $row)
   {
    $count = $count + 1;
    $output .= '
    <tr>
     <td>'.$count.'</td>
     <td>'.$row->date_of_arrival.'</td>
     <td>'.$row->date_until_quarantined.'</td>
     <td>'.$row->country_of_origin_of_journey.'</td>
     <td>'.$row->port_of_origin_of_journey.'</td>
    </tr>
    ';
   }
  }
  else
  {
   $output .= '
   <tr>
       <td colspan="5" align="center">Data not Available</td>
      </tr>
   ';
  }
  $output .= '</table></div>';
  echo $output;
 }

 function importq()
 {
  $file_data = $this->csvimport->get_array($_FILES["csv_fileq"]["tmp_name"]);
  foreach($file_data as $row)
  {
   $data[] = array(
           'date_of_arrival' => $row["Date of Arrival"],
          'date_until_quarantined'  => $row["Date until Quarantined"],
          'country_of_origin_of_journey'   => $row["Country of Origin of journey"],
          'port_of_origin_of_journey'   => $row["Port of Origin of journey"],
           'port_of_final_destination' => $row["Port of Final Destination"],
          'country_of_final_destination'  => $row["Country of Final Destination"],
          'address'   => $row["Address"],
          'district_city'   => $row["District/ City"],
           'state_ut_province' => $row["State/UT/Province"],
          'pin'  => $row["PIN"],
          'country'   => $row["Country"],
          'final_district_city'   => $row["Final District/ City"],
           'latitude' => $row["Latitude"],
          'longitude'  => $row["Longitude"],
          'traveller_patient_name'   => $row["Traveller/Patient Name"],
          'mobile_no'   => $row["Mobile Number"],
           'imei' => $row["IMEI"],
          'device_id'  => $row["DeviceID"],
          'last_latitude'   => $row["LastLatitude"],
          'last_longitude'   => $row["LastLongitude"],
           'gender'   => $row["Gender"]
   );
  }
 //echo $data;
  //die();
  $this->Csv_importq_model->insertq($data);
 }
 
  
}
