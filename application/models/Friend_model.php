<?php
class Friend_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	/**
	 *
	 */
	function get_friends($userid) {
		$this->db->select('user.userid,user.username');
		$this->db->from('FriendRelation');
		$this->db->join('user', 'FriendRelation.friendid = user.userid');
		$this->db->where('FriendRelation.userid', $userid);
		$query = $this->db->get();
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
}