<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Examplesmodel extends CI_Model {

	public function fetch_country(){
		$this->db->order_by('name', 'asc');
		$query=$this->db->get('countries');
		return $query->result();
	}

	public function fetch_state($countryid){
		$this->db->where('country_id', $countryid);
		$this->db->order_by('name', 'ASC');
		$query=$this->db->get('states');
		$output='<option value="">Select State</option>';
		foreach ($query->result() as $row) {
			$output .=	'<option value="'.$row->id.'"> '.$row->name.' </option>';
        	# code...
		}
		return $output;
	}

		public function fetch_city($stateid){
		$this->db->where('state_id', $stateid);
		$this->db->order_by('name', 'ASC');
		$query=$this->db->get('cities');
		$output='<option value="">Select City</option>';
		foreach ($query->result() as $row) {
			$output .=	'<option value="'.$row->id.'"> '.$row->name.' </option>';
        	# code...
		}
		return $output;
	}



}

/* End of file Examplesmodel.php */
/* Location: ./application/models/Examplesmodel.php */