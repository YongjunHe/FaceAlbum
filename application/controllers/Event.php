<?php

class Event extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Event_model', 'Account_model', 'Admin_model'));
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
        $data ['events'] = $this->Admin_model->get_events();
        if (!empty($this->session->userdata('username'))) {
            $username = $this->session->userdata('username');
            $userid = $this->Account_model->get_by_username($username)->userid;
            $data ['my_events'] = $this->Event_model->get_by_memberid($userid);
        }
        $this->load->view('templates/header');
        $this->load->view('event/event', $data);
        $this->load->view('templates/footer');
    }

    public function attend()
    {
        $data = array("result" => False);
        if (!empty($this->session->userdata('username'))) {
            $eventid = $this->input->post('eventid');
            $username = $this->session->userdata('username');
            $userid = $this->Account_model->get_by_username($username)->userid;
            if ($this->Event_model->add_member($eventid, $userid))
                $data = array("result" => True);
        }
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function quit()
    {
        $data = array("result" => False);
        if (!empty($this->session->userdata('username'))) {
            $eventid = $this->input->post('eventid');
            $username = $this->session->userdata('username');
            $userid = $this->Account_model->get_by_username($username)->userid;
            if ($this->Event_model->delete_member($eventid, $userid))
                $data = array("result" => True);
        }
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    public function modify()
    {
        // 设置错误定界符
        if (empty($this->session->userdata('username'))) {
            redirect('account/login', 'auto');
        }else{
            $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
            if ($this->form_validation->run('event') == TRUE) {
                $eventid = $this->input->post('eventid');
                $title = $this->input->post('title');
                $content = $this->input->post('content');
                $starttime = $this->input->post('starttime');
                $endtime = $this->input->post('endtime');
                if($event = $this->Admin_model->get_events($eventid)){
                    $this->Admin_model->update_event($eventid, $title, $content, $event->membernum, $event->authorid, $starttime, $endtime);
                }else{
                    $username = $this->session->userdata('username');
                    $userid = $this->Account_model->get_by_username($username)->userid;
                    $this->Admin_model->add_event($eventid, $title, $content, 1, $userid, $starttime, $endtime);
                    $this->Event_model->add_member($eventid, $userid);
                }
            }
            redirect('event/overview', 'auto');
        }
    }
}