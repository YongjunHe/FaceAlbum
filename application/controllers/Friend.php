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
		
		$this->form_validation->set_rules ( 'friendid', '朋友id', 'required' );
		
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
		$this->load->view ( 'friends/friend_updates' );
	}
	public function my_circle() {
		$this->load->view ( 'friends/my_circle' );
	}
	public function circle_updates() {
		$this->load->view ( 'friends/circle_updates' );
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
	function userid_check($str) {
		if ($this->Account_model->get_by_userid ( $str )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'userid_check', '用户不存在' );
			return FALSE;
		}
	}
}