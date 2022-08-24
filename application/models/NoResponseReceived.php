<?php
class NoResponseReceived extends CI_Model {

    function __construct()
    {
        //parent::__construct();
    }
		
	function get_no_response_received_report($no_of_hours)
	{
		$sql = "SELECT * FROM 
				(
					SELECT 
						DENSE_RANK() OVER (PARTITION BY mobile_number ORDER BY qtimestamp DESC) rn,
						mobile_number,
						qtimestamp AS LastUpdate,
						DATEDIFF(HOUR, qtimestamp, CURRENT_TIMESTAMP)AS DateDiff
					FROM quarantine_history
				 )x WHERE rn = 1 and DateDiff > ". $no_of_hours ."";
						
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) 
		{
			return $query;
		}
		else
		{
			return 0;
		}
	}
}	
?>