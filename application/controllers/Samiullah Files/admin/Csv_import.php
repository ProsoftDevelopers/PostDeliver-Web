<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv_import extends CI_Controller {
 
 public function __construct()
 {
  parent::__construct();
  $this->load->model('Csv_import_model');
  $this->load->library('Csvimport');
 }

 function index()
 {
  $this->load->view('admin/csv_import');
 }

 function load_data()
 {
  $result = $this->Csv_import_model->select();
  $output = '
   <h3 align="center">Imported Movements Details</h3>
        <div class="table-responsive">
         <table class="table table-bordered table-striped">
          <tr>
           <th>Sr. No</th>
           <th>CDRProfileID</th>
           <th>CaseProfileID</th>
           <th>CDRPhoneNo</th>
           <th>CalledPhoneNo</th>
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
     <td>'.$row->CDRProfileID.'</td>
     <td>'.$row->CaseProfileID.'</td>
     <td>'.$row->CDRPhoneNo.'</td>
     <td>'.$row->CalledPhoneNo.'</td>
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

 function import()
 {
  $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
  foreach($file_data as $row)
  {
      $data[] = array(
           'CDRProfileID' => $row["CDRProfileID"],
          'CaseProfileID'  => $row["CaseProfileID"],
          'CDRPhoneNo'   => $row["CDRPhoneNo"],
          'CalledPhoneNo'   => $row["CalledPhoneNo"],
           'ChargedParty' => $row["ChargedParty"],
          'CallDate'  => $row["CallDate"],
          'CallTime'   => $row["CallTime"],
          'TypeofCall'   => $row["TypeofCall"],
           'Duration' => $row["Duration"],
          'CellSite'  => $row["CellSite"],
          'LastCellSite_A'   => $row["Country"],
          'FirstCellSite_B'   => $row["LastCellSite_A"],
           'LastCellSite_B' => $row["LastCellSite_B"],
          'IMEI'  => $row["IMEI"],
          'IMEI_B'   => $row["IMEI_B"],
          'IMSI_A'   => $row["IMSI_A"],
           'IMSI_B' => $row["IMSI_B"],
          'Category'  => $row["Category"],
          'OriginalCDRPhoneNo'   => $row["OriginalCDRPhoneNo"],
          'OriginalCalledPhoneNo'   => $row["OriginalCalledPhoneNo"],
           'SSICode_ColA'   => $row["SSICode_ColA"],
            'SSIDesc_ColA' => $row["SSIDesc_ColA"],
          'SSICode_ColB'  => $row["SSICode_ColB"],
          'SSIDesc_ColB'   => $row["SSIDesc_ColB"],
          'TypeOfCall_R'   => $row["TypeOfCall_R"],
           'PP_PO' => $row["PP_PO"],
          'SMSCenter'  => $row["SMSCenter"],
          'RoamerDetails'   => $row["RoamerDetails"],
          'Cnumber'   => $row["Cnumber"],
           'RowNumber' => $row["RowNumber"],
          'UserID'  => $row["UserID"],
          'ServiceProviderState_TowerState_A'   => $row["ServiceProviderState_TowerState_A"],
          'ServiceProviderMasterID_A'   => $row["ServiceProviderMasterID_A"],
           'CellIdAddress' => $row["CellIdAddress"],
          'ServiceProviderMasterID_B'  => $row["ServiceProviderMasterID_B"],
          'ServiceProviderState_TowerState_B'   => $row["ServiceProviderState_TowerState_B"],
          'SubName_A'   => $row["SubName_A"],
           'SubAddress_A' => $row["SubAddress_A"],
          'DOA_A'  => $row["DOA_A"],
          'TOA_A'   => $row["TOA_A"],
          'SubName_B'   => $row["SubName_B"],
           'SubAddress_B'   => $row["SubAddress_B"],
            'DOA_B'  => $row["DOA_B"],
          'TOA_B'   => $row["TOA_B"],
          'TowerName_A'   => $row["TowerName_A"],
           'TowerAddress_A'   => $row["TowerAddress_A"],
            'Latitude_A' => $row["Latitude_A"],
          'Longitude_A'  => $row["Longitude_A"],
          'TowerName_B'   => $row["TowerName_B"],
          'TowerAddress_B'   => $row["TowerAddress_B"],
           'Latitude_B' => $row["Latitude_B"],
          'Longitude_B'  => $row["Longitude_B"],
          'SPName_A'   => $row["SPName_A"],
          'SPCircle_State_A'   => $row["SPCircle_State_A"],
           'SPCountry_A' => $row["SPCountry_A"],
          'SPName_B'  => $row["SPName_B"],
          'SPCircle_State_B'   => $row["SPCircle_State_B"],
          'SPCountry_B'   => $row["SPCountry_B"],
           'SPPlace_A' => $row["SPPlace_A"],
          'SPPlace_B'  => $row["SPPlace_B"],
          'SPMID_A'   => $row["SPMID_A"],
          'SPMID_B'   => $row["SPMID_B"],
           'GMID' => $row["GMID"],
          'GMNAME'  => $row["GMNAME"],
          'Azimuth_A'   => $row["Azimuth_A"],
          'Azimuth_B'   => $row["Azimuth_B"],
           'Category_A'   => $row["Category_A"],
           'Category_B'   => $row["Category_B"],
          'AsOn_Date_A'   => $row["AsOn_Date_A"],
           'AsOn_Date_B'   => $row["AsOn_Date_B"]
   ); 
  
  }
  $this->Csv_import_model->insert($data);
 }
 
  
}
