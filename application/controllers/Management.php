<?php
class Management extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'management_model' );
		$this->load->helper ( 'url_helper' );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
	}
	public function overview() {
		$data ['users'] = $this->management_model->get_users ();
		$data ['activities'] = $this->management_model->get_activities ();
		$data ['circles'] = $this->management_model->get_circles ();
		$data ['topics'] = $this->management_model->get_topics ();
		$data ['news'] = $this->management_model->get_news ();
		$this->load->view ( 'management/list', $data );
	}
}