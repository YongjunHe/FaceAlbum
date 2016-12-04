<?php
class Health_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	function get_advice($userid) {
		$this->db->where ( 'userid', $userid );
		$query = $this->db->get ( 'advice' );
		return $query->result_array ();
	}
	function get_plan($userid) {
		$this->db->where ( 'userid', $userid );
		$query = $this->db->get ( 'plan' );
		return $query->result_array ();
	}
	function add_plans($userid, $content, $starttime, $endtime) {
		$data = array (
				'userid' => $userid,
				'content' => $content,
				'starttime' => $starttime,
				'endtime' => $endtime 
		);
		$this->db->insert ( 'plan', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function delete_plans($planid) {
		$data = array (
				'planid' => $planid 
		);
		$this->db->delete ( 'plan', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function get_data($userid) {
		$this->db->where ( 'userid', $userid );
		$query = $this->db->get ( 'SportsData' );
		return $query->result_array();
	}
}