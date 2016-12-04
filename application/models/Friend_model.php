<?php
class Friend_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	/**
	 */
	function get_friends($userid) {
		$this->db->select ( 'user.userid,user.username' );
		$this->db->from ( 'FriendRelation' );
		$this->db->join ( 'user', 'FriendRelation.friendid = user.userid' );
		$this->db->where ( 'FriendRelation.userid', $userid );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function add_friends($userid, $friendid) {
		$data = array (
				'userid' => $userid,
				'friendid' => $friendid 
		);
		$this->db->insert ( 'FriendRelation', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function delete_friends($userid, $friendid) {
		$data = array (
				'userid' => $userid,
				'friendid' => $friendid 
		);
		$this->db->delete ( 'FriendRelation', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function get_friend_updates($userid) {
		$this->db->select ( 'FriendNews.*' );
		$this->db->from ( 'FriendRelation' );
		$this->db->join ( 'user', 'FriendRelation.friendid = user.userid' );
		$this->db->join ( 'FriendNews', 'FriendRelation.friendid = FriendNews.authorid' );
		$this->db->where ( 'FriendRelation.userid', $userid );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function get_circles($userid) {
		$this->db->select ( 'Circle.*' );
		$this->db->from ( 'CircleRelation' );
		$this->db->join ( 'Circle', 'CircleRelation.circleid = Circle.circleid' );
		$this->db->where ( 'CircleRelation.userid', $userid );
		$query = $this->db->get ();
		return $query->result_array ();
	}
	function join_circles($userid, $circleid) {
		$data = array (
				'userid' => $userid,
				'circleid' => $circleid 
		);
		$this->db->insert ( 'circleRelation', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function exit_circles($userid, $circleid) {
		$data = array (
				'userid' => $userid,
				'circleid' => $circleid 
		);
		$this->db->delete ( 'circleRelation', $data );
		if ($this->db->affected_rows () > 0) {
			return TRUE;
		}
		return FALSE;
	}
	function get_by_circleid($circleid) {
		$this->db->where ( 'circleid', $circleid );
		$query = $this->db->get ( 'Circle' );
		// return $query->row(); //不判断获得什么直接返回
		if ($query->num_rows () == 1) {
			return $query->row ();
		} else {
			return FALSE;
		}
	}
	function get_circle_topic($circleid = FALSE) {
		if ($circleid === FALSE) {
			$query = $this->db->get ( 'CircleTopic' );
			return $query->result_array ();
		}
		
		$query = $this->db->get_where ( 'CircleTopic', array (
				'circleid' => $circleid 
		) );
		return $query->row_array ();
	}
}