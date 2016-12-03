<?php
class Activity extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'activity_model' );
		$this->load->model ( 'account_model' );
		$this->load->helper ( 'url_helper' );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
	}
	public function overview() {
		$data ['activities'] = $this->activity_model->get_activity ();
		$data ['status'] = 'attend';
		$this->load->view ( 'activity/discovery', $data );
	}
	public function myActivity() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$participantid = $row->userid;
		$data ['activities'] = $this->activity_model->get_activityById ( $participantid );
		$data ['status'] = 'exit';
		$this->load->view ( 'activity/discovery', $data );
	}
	public function participate() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$participantid = $row->userid;
		// 获取用户Id
		$activityid = $this->input->post ( 'Message' );
		if ($this->activity_model->add_participant ($activityid, $participantid ))
			$data = '[{"result":"Successful participation"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;	
		// $data = $this->activity_model->get_activity ();
		// $this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( $data ) );
	}
	public function exitActivity() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$participantid = $row->userid;
		// 获取用户Id
		$activityid = $this->input->post ( 'Message' );
		if ($this->activity_model->delete_participant ($activityid, $participantid ))
			$data = '[{"result":"Exit successfully"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	public function createActivity() {
	}
	public function updateActivity() {
	}
	public function deleteActivity() {
	}
}