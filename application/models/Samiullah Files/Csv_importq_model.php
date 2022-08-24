<?php
class Csv_importq_model extends CI_Model
{

 function selectq()
 {
  $this->db->order_by('id', 'DESC');
  $query = $this->db->get('tbl_quarantine');
  return $query;
 }

 function insertq($data)
 {
  //echo $data;
  //die();
  $this->db->insert_batch('tbl_quarantine', $data);
 }
}