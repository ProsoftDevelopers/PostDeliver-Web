<?php
class Search extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
	
	function patient_search($s_text)
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "SELECT patient_id, person_name, mobile_number, age, gender
				FROM patient_master
				WHERE patient_id LIKE '%". $s_text ."%' OR person_name LIKE '%". $s_text ."%' OR mobile_number LIKE '%". $s_text ."%'
			";
			
		$query = $this->db->query($qry);
		/* if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		} */
		
		return $query;
	}

	function cdr_search($s_text)
	{
		//$domain_id = $this->session->userdata('domain_id');
	
		$qry = "SELECT cdrprofileid, caseprofileid, cdrphoneno, calledphoneno, chargedparty
				FROM cdrhistory
				WHERE cdrprofileid LIKE '%". $s_text ."%' OR caseprofileid LIKE '%". $s_text ."%' OR cdrphoneno LIKE '%". $s_text ."%'
				 OR calledphoneno LIKE '%". $s_text ."%' OR chargedparty LIKE '%". $s_text ."%'
			";
			
		$query = $this->db->query($qry);
		/* if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		} */
		
		return $query;
	}
}	
?>