<?php
class Health extends CI_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'health_model' );
		$this->load->helper ( 'url_helper' );
	}
	public function overview() {
		$this->load->view ( 'health/training');
	}
}