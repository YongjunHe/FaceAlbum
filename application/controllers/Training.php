<?php
require_once APPPATH . 'libraries/REST_Controller.php';
class Training extends REST_Controller {
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'health_model' );
		$this->load->helper ( 'url_helper' );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
	}
	public function index_get() {
		$userid = $this->get ( 'userid' );
		$data = $this->health_model->get_data ($userid);
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( $data ) );
	}
	
// 	public function index_get() {
// 		$data = array(
// 			'name'=>$this->get('name'),
// 			'age'=>$this->get('age'),
// 			'id'=>$this->get('id')
// 			);
// 		$this->response($data);
// 	}
// 	http://localhost/SportsWeb/index.php/Training?name=yanzi&age=25&id=4567

	public function index_post() {
		$userid =  $this->post ( 'Message' );
		$data = $this->health_model->get_data ($userid);
		$this->output->set_content_type ( 'application/json' )->set_output ( json_encode ( $data ) );
	}
	//
}