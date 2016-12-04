<?php
class Activity_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}

	function get_activityById($participantid) {
		$sql = "SELECT * FROM activityRelation t1 join activity t2 on 
				t1.activityid=t2.activityid where t1.participantid = ?";
		$query = $this->db->query ( $sql, array (
				$participantid 
		) );
		return $query->result_array ();
	}
	/**
	 * 添加活动
	 */
	function add_participant($activityid, $participantid) {
		$this->db->insert ( 'activityRelation', array (
				'activityid' => $activityid,
				'participantid' => $participantid
		) );
		$sql = "UPDATE activity SET joiner=joiner+1 WHERE activityid = ?";
		$this->db->query ( $sql, array (
				$activityid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	/**
	 * 添加活动
	 */
	function delete_participant($activityid, $participantid) {
		$this->db->delete ( 'activityRelation', array (
				'activityid' => $activityid,
				'participantid' => $participantid
		) );
		$sql = "UPDATE activity SET joiner=joiner-1 WHERE activityid = ?";
		$this->db->query ( $sql, array (
				$activityid
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	
	/**
	 * 增删改查
	 */
	function get_activity($activityid = FALSE) {
		if ($activityid === FALSE) {
			$query = $this->db->get ( 'activity' );
			return $query->result_array ();
		}
	
		$query = $this->db->get_where ( 'activity', array (
				'activityid' => $activityid
		) );
		return $query->row_array ();
	}
	
	function add_activity($authorid, $content, $memberlimit) {
		$this->db->insert ( 'activity', array (
				'authorid' => $authorid,
				'content' => $content,
				'memberlimit' => $memberlimit 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	
	function delete_activity($activityid) {
		$this->db->delete ( 'activity', array (
				'activity' => $activity,
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	
	function update_activity($activityid,$content){
		$sql = "UPDATE activity SET content= ? WHERE activityid = ?";
		$this->db->query ( $sql, array (
				$content,
				$activityid
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;		
	}
}