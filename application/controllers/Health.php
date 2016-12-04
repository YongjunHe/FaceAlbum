<?php
class Health extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'health_model' );
		$this->load->model ( 'account_model' );
		$this->load->helper ( 'url_helper' );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
	}
	public function overview() {
		$this->load->view ( 'health/training' );
	}
	public function health() {
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		$data ['advices'] = $this->health_model->get_advice ( $userid );
		$this->load->view ( 'health/health', $data );
	}
	public function plan() {
		$this->load->library ( 'form_validation' );
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		$username = $this->session->userdata ( 'username' );
		$row = $this->account_model->get_by_username ( $username );
		$userid = $row->userid;
		
		if ($this->form_validation->run () == TRUE) {
			$content = $this->input->post ( 'content' );
			$starttime = $this->input->post ( 'starttime' );
			$endtime = $this->input->post ( 'endtime' );
			$this->health_model->add_plans ( $userid, $content, $starttime, $endtime );
		}
		
		$data ['plans'] = $this->health_model->get_plan ( $userid );
		$this->load->view ( 'health/plan', $data );
	}
	public function delete_plan() {
		$planid = $this->input->post ( 'Message' );
		if ($this->health_model->delete_plans ( $planid )) {
			$data = '[{"result":"Successful deletion"}]';
		} else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
}