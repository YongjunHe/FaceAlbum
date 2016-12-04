<?php
class Management_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	function get_users($userid = FALSE) {
		if ($userid === FALSE) {
			$query = $this->db->get ( 'user' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'user', array (
				'userid' => $userid
		) );
		return $query->row_array ();
	}
	function get_activities($activityid = FALSE) {
		if ($activityid === FALSE) {
			$query = $this->db->get ( 'activity' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'activity', array (
				'activityid' => $activityid
		) );
		return $query->row_array ();
	}
	
	function get_circles($circleid = FALSE) {
		if ($circleid === FALSE) {
			$query = $this->db->get ( 'circle' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'circle', array (
				'circleid' => $circleid
		) );
		return $query->row_array ();
	}
	
	function get_topics($topicid = FALSE) {
		if ($topicid === FALSE) {
			$query = $this->db->get ( 'CircleTopic' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'CircleTopic', array (
				'topicid' => $topicid
		) );
		return $query->row_array ();
	}
	
	function get_news($newsid = FALSE) {
		if ($newsid === FALSE) {
			$query = $this->db->get ( 'FriendNews' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'FriendNews', array (
				'newsid' => $newsid
		) );
		return $query->row_array ();
	}
}