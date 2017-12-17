<?php

class Friend extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Friend_model', 'Account_model'));
        $this->load->helper(array(
            'url',
        ));
        $this->load->library(array(
            'form_validation',
            'session'
        ));
    }

    public function add_friend()
    {
        $userid = $this->session->userdata('userid');
        $friendid = $this->input->post('friendid');
        $group = $this->input->post('group');
        if ($this->Friend_model->add_friend($userid, $friendid, $group))
            $data = array('result' => True);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function delete_friend()
    {
        $userid = $this->session->userdata('userid');
        $friendname = $this->input->post('friend_name');
        $friendid = $this->Account_model->get_by_username($friendname)->userid;
        if ($this->Friend_model->delete_friend($userid, $friendid))
            $data = array('result' => True);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function search_friend()
    {
        $friendname = $this->input->post('friend_name');
        if ($user = $this->Account_model->get_by_username($friendname))
            $data = array('result' => True, 'userid' => $user->userid, 'username' => $user->username);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function update_friend()
    {
        $userid = $this->session->userdata('userid');
        $friendname = $this->input->post('friend_name');
        $friendid = $this->Account_model->get_by_username($friendname)->userid;
        $group = $this->input->post('group');
        if ($user = $this->Friend_model->update_friend($userid, $friendid, $group))
            $data = array('result' => True);
        else
            $data = array('result' => False);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function get_notifications()
    {
        $userid = $this->session->userdata('userid');
        $notifications =  $this->Friend_model->get_friend_updates($userid);
        $data = array('notifications' => $notifications);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}