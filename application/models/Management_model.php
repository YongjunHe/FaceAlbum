<?php
class Management_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	// 用户增删改查
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
	function add_user($username, $password, $identity, $email) {
		$data = array (
				'username' => $username,
				'password' => md5 ( "HOBBY" . $password ),
				'identity' => $identity,
				'email' => $email 
		);
		$this->db->insert ( 'user', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function update_user($userid, $username, $password, $identity, $email) {
		$data = array (
				'username' => $username,
				'password' => md5 ( "HOBBY" . $password ),
				'identity' => $identity,
				'email' => $email 
		);
		$this->db->where ( 'userid', $userid );
		$this->db->update ( 'user', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function delete_user($userid) {
		$this->db->delete ( 'user', array (
				'userid' => $userid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	// 活动增删改查
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
	function add_activity($authorid, $content, $joiner, $memberlimit, $starttime, $endtime, $updatetime) {
		$data = array (
				'authorid' => $authorid,
				'content' => $content,
				'joiner' => 1,
				'memberlimit' => $memberlimit,
				'starttime' => $starttime,
				'endtime' => $endtime,
				'updatetime' => $updatetime 
		);
		$this->db->insert ( 'activity', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function delete_activity($activityid) {
		$this->db->delete ( 'activity', array (
				'activityid' => $activityid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function update_activity($activityid, $authorid, $content, $joiner, $memberlimit, $starttime, $endtime, $updatetime) {
		$data = array (
				'authorid' => $authorid,
				'content' => $content,
				'joiner' => $joiner,
				'memberlimit' => $memberlimit,
				'starttime' => $starttime,
				'endtime' => $endtime,
				'updatetime' => $updatetime 
		);
		$this->db->where ( 'activityid', $activityid );
		$this->db->update ( 'activity', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	// 圈子增删改查
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
	function add_circle($creatorid, $theme, $memberlimit) {
		$data = array (
				'creatorid' => $creatorid,
				'theme' => $theme,
				'memberlimit' => $memberlimit 
		);
		$this->db->insert ( 'circle', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function update_circle($circleid, $creatorid, $theme, $memberlimit) {
		$data = array (
				'creatorid' => $creatorid,
				'theme' => $theme,
				'memberlimit' => $memberlimit 
		);
		$this->db->where ( 'circleid', $circleid );
		$this->db->update ( 'circle', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function delete_circle($circleid) {
		$this->db->delete ( 'circle', array (
				'circleid' => $circleid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	// 话题增删改查
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
	function add_topic($circleid, $authorid, $content, $updatetime) {
		$data = array (
				'circleid' => $circleid,
				'authorid' => $authorid,
				'content' => $content,
				'updatetime' => $updatetime 
		);
		$this->db->insert ( 'CircleTopic', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function update_topic($topicid, $circleid, $authorid, $content, $updatetime) {
		$data = array (
				'circleid' => $circleid,
				'authorid' => $authorid,
				'content' => $content,
				'updatetime' => $updatetime 
		);
		$this->db->where ( 'topicid', $topicid );
		$this->db->update ( 'CircleTopic', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	function delete_topic($topicid) {
		$this->db->delete ( 'CircleTopic', array (
				'topicid' => $topicid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	// 动态删查
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
	function delete_news($newsid) {
		$this->db->delete ( 'FriendNews', array (
				'newsid' => $newsid 
		) );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
}