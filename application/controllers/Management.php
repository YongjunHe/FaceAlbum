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
	public function change_user() {
		$userid = $this->input->post ( 'userid' );
		$username = $this->input->post ( 'username' );
		$password = $this->input->post ( 'password' );
		$identity = $this->input->post ( 'identity' );
		$email = $this->input->post ( 'email' );
		if ($circleid == null)
			$this->management_model->add_user ( $username, $password, $identity, $email );
		else
			$this->management_model->update_user ( $userid, $username, $password, $identity, $email );
		redirect ( 'management/overview' );
	}
	public function delete_user() {
		// 获取用户Id
		$userid = $this->input->post ( 'Message' );
		if ($this->management_model->delete_user ( $userid ))
			$data = '[{"result":"Successful deletion"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	public function change_activity() {
		$activityid = $this->input->post ( 'activityid' );
		$authorid = $this->input->post ( 'authorid' );
		$content = $this->input->post ( 'content' );
		$joiner = $this->input->post ( 'joiner' );
		$memberlimit = $this->input->post ( 'memberlimit' );
		$starttime = $this->input->post ( 'starttime' );
		$endtime = $this->input->post ( 'endtime' );
		$updatetime = $this->input->post ( 'updatetime' );
		if ($activityid == null)
			$this->management_model->add_activity ( $authorid, $content, $joiner, $memberlimit, $starttime, $endtime, $updatetime );
		else
			$this->management_model->update_activity ( $activityid, $authorid, $content, $joiner, $memberlimit, $starttime, $endtime, $updatetime );
		redirect ( 'management/overview' );
	}
	public function delete_activity() {
		// 获取活动Id
		$activityid = $this->input->post ( 'Message' );
		if ($this->management_model->delete_activity ( $activityid ))
			$data = '[{"result":"Successful deletion"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	public function change_circle() {
		$circleid = $this->input->post ( 'circleid' );
		$creatorid = $this->input->post ( 'creatorid' );
		$theme = $this->input->post ( 'theme' );
		$memberlimit = $this->input->post ( 'memberlimit' );
		if ($circleid == null)
			$this->management_model->add_circle ( $creatorid, $theme, $memberlimit );
		else
			$this->management_model->update_circle ( $circleid, $creatorid, $theme, $memberlimit );
		redirect ( 'management/overview' );
	}
	public function delete_circle() {
		// 获取圈子Id
		$circleid = $this->input->post ( 'Message' );
		if ($this->management_model->delete_circle ( $circleid ))
			$data = '[{"result":"Successful deletion"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	public function change_topic() {
		$topicid = $this->input->post ( 'topicid' );
		$circleid = $this->input->post ( 'circleid' );
		$authorid = $this->input->post ( 'authorid' );
		$content = $this->input->post ( 'content' );
		$updatetime = $this->input->post ( 'updatetime' );
		if ($circleid == null)
			$this->management_model->add_topic ( $circleid, $authorid, $content, $updatetime );
		else
			$this->management_model->update_topic ( $topicid, $circleid, $authorid, $content, $updatetime );
		redirect ( 'management/overview' );
	}
	public function delete_topic() {
		// 获取用户Id
		$topicid = $this->input->post ( 'Message' );
		if ($this->management_model->delete_topic ( $topicid ))
			$data = '[{"result":"Successful deletion"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
	public function delete_news() {
		// 获取用户Id
		$newsid = $this->input->post ( 'Message' );
		if ($this->management_model->delete_news ( $newsid ))
			$data = '[{"result":"Successful deletion"}]';
		else
			$data = '[{"result":"Failure"}]';
		echo $data;
	}
}