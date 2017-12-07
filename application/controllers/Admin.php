<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Admin_model', 'Account_model'));
        $this->load->helper(array(
            'url',
            'date'
        ));
        $this->load->library(array(
            'form_validation',
            'session'
        ));
    }

    public function overview()
    {
        $data ['users'] = $this->Admin_model->get_users();
        $data ['events'] = $this->Admin_model->get_events();
        $this->load->view('templates/header');
        $this->load->view('admin/admin', $data);
        $this->load->view('templates/footer');
    }

    public function add_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $identity = $this->input->post('identity');
        $email = $this->input->post('email');
        $tel = $this->input->post('tel');
        $age = $this->input->post('age');
        $sex = $this->input->post('sex');
        if ($this->Admin_model->add_user($username, $password, $identity, $email, $tel, $age, $sex))
            $data = array("result" => True, "userid" => $this->Account_model->get_by_username($username)->userid, "updatetime" => $this->Account_model->get_by_username($username)->updatetime);
        else
            $data = array("result" => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function update_user()
    {
        $request = $this->input->post('request');
        $username = $request[1];
        $password = $request[2];
        $identity = $request[3];
        $email = $request[4];
        $tel = $request[5];
        $age = $request[6];
        $sex = $request[7];
        if ($this->Admin_model->update_user($username, $password, $identity, $email, $tel, $age, $sex))
            $data = array('result' => True);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function delete_user()
    {
        $userid = $this->input->post('userid');
        if ($this->Admin_model->delete_user($userid))
            $data = array("result" => True);
        else
            $data = array("result" => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function add_event()
    {
        $eventid = $this->input->post('eventid');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $membernum = $this->input->post('membernum');
        $authorid = $this->input->post('authorid');
        $starttime = $this->input->post('starttime');
        $endtime = $this->input->post('endtime');
        if ($this->Admin_model->add_event($eventid, $title, $content, $membernum, $authorid, $starttime, $endtime))
            $data = array("result" => True, "updatetime" => $this->Admin_model->get_events($eventid)->updatetime);
        else
            $data = array("result" => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function update_event()
    {
        $request = $this->input->post('request');
        $eventid = $request[0];
        $title = $request[1];
        $content = $request[2];
        $membernum = $request[3];
        $authorid = $request[4];
        $starttime = $request[5];
        $endtime = $request[6];
        if ($this->Admin_model->update_event($eventid, $title, $content, $membernum, $authorid, $starttime, $endtime))
            $data = array('result' => True);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function delete_event()
    {
        $eventid = $this->input->post('eventid');
        if ($this->Admin_model->delete_event($eventid))
            $data = array("result" => True);
        else
            $data = array("result" => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}