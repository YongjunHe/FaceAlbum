<?php
class Friend extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'friend_model' );
		$this->load->model ( 'account_model' );
		$this->load->helper ( 'url_helper' );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
	}
	public function overview() {
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'friendid', '朋友id', 'required|callback_friendid_check' );
		
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		
		if ($this->form_validation->run () == TRUE) {
			$friendid = $this->input->post ( 'friendid' );
			$this->friend_model->add_friends ( $userid, $friendid );
			$this->friend_model->add_friends ( $friendid, $userid );
		}
		$data ['friends'] = $this->friend_model->get_friends ( $userid );
		$this->load->view ( 'friends/focus', $data );
	}
	public function friend_updates() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		$data ['updates'] = $this->friend_model->get_friend_updates ( $userid );
		$this->load->view ( 'friends/friend_updates' ,$data);
	}
	public function delete_friend() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		// 获取用户Id
		$friendid = $this->input->post ( 'Message' );
		if ($this->friend_model->delete_friends ( $userid, $friendid )) {
			if ($this->friend_model->delete_friends ( $friendid, $userid ))
				$data = '[{"result":"Successful deletion"}]';
		} else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	function friendid_check($friendid) {
		if ($this->account_model->get_by_userid ( $friendid )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'friendid_check', '用户不存在' );
			return FALSE;
		}
	}
	public function my_circle() {
		$this->load->library ( 'form_validation' );
		
		$this->form_validation->set_rules ( 'circleid', '圈子id', 'required' );
		
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		
		if ($this->form_validation->run () == TRUE) {
			$circleid = $this->input->post ( 'circleid' );
			$this->friend_model->join_circles ( $userid, $circleid );
		}
		$data ['circles'] = $this->friend_model->get_circles ( $userid );
		$this->load->view ( 'friends/my_circle', $data );
	}
	public function circle_topics() {
		$data ['topics'] = $this->friend_model->get_circle_topic ();
		$this->load->view ( 'friends/circle_topics', $data );
	}
	public function exit_circle() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		// 获取用户Id
		$circleid = $this->input->post ( 'Message' );
		if ($this->friend_model->exit_circles ( $userid, $circleid )) {
			$data = '[{"result":"Successful exitance"}]';
		} else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	function circleid_check($circleid) {
		if ($this->friend_model->get_by_circleid ( $circleid )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'friendid_check', '用户不存在' );
			return FALSE;
		}
	}
}