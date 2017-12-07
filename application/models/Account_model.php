<?php

class Account_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->salt = "HOBBY";
    }

    function login($username)
    {
        $data = array(
            'username' => $username,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($data);
    }

    function logout()
    {
        if ($this->session->userdata('logged_in') === TRUE) {
            $this->session->sess_destroy();
            return TRUE;
        }
        return FALSE;
    }

    function get_by_username($username)
    {
        $this->db->where('username', $username);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function get_by_userid($userid)
    {
        $this->db->where('userid', $userid);
        $query = $this->db->get('user');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function password_check($username, $password)
    {
        if ($user = $this->get_by_username($username)) {
            return $user->password == md5($this->salt . $password) ? TRUE : FALSE;
        }
        return FALSE;
    }

    function add_user($username, $password, $email)
    {
        $data = array(
            'username' => $username,
            'password' => md5($this->salt . $password),
            'identity' => 'user',
            'email' => $email,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function update_user($username, $password, $email, $tel, $age, $sex)
    {
        $data = array(
            'password' => md5($this->salt . $password),
            'email' => $email,
            'tel' => $tel,
            'age' => $age,
            'sex' => $sex,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->where('username', $username);
        $this->db->update('user', $data);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    function email_exists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user');
        return $query->num_rows() ? TRUE : FALSE;
    }
}