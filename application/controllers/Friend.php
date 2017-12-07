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
        $username = $this->session->userdata('username');
        $userid = $this->Account_model->get_by_username($username)->userid;
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
        $username = $this->session->userdata('username');
        $userid = $this->Account_model->get_by_username($username)->userid;
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
        $username = $this->session->userdata('username');
        $userid = $this->Account_model->get_by_username($username)->userid;
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

    public function friend_updates()
    {
        $username = $this->session->userdata('username');
        $userid = $this->Account_model->get_by_username($username)->userid;

        $data ['updates'] = $this->friend_model->get_friend_updates($userid);
        $this->load->view('friends/friend_updates', $data);
    }

    function friendid_check($friendid)
    {
        if ($this->account_model->get_by_userid($friendid)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('friendid_check', 'ÓÃ»§²»´æÔÚ');
            return FALSE;
        }
    }
}