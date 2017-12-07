<?php

class Admin_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->salt = "HOBBY";
    }

    function get_users()
    {
        $query = $this->db->get('user');
        return $query->result();
    }

    function add_user($username, $password, $identity, $email, $tel, $age, $sex)
    {
        $data = array(
            'username' => $username,
            'password' => md5($this->salt . $password),
            'identity' => $identity,
            'email' => $email,
            'tel' => $tel,
            'age' => $age,
            'sex' => $sex,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function update_user($username, $password, $identity, $email, $tel, $age, $sex)
    {
        $data = array(
            'password' => md5($this->salt . $password),
            'email' => $email,
            'identity' => $identity,
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

    function delete_user($userid)
    {
        $this->db->delete('user', array(
            'userid' => $userid
        ));
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    function get_events($eventid = FALSE)
    {
        if ($eventid === FALSE) {
            $query = $this->db->get('event');
            return $query->result();
        }

        $query = $this->db->get_where('event', array(
            'eventid' => $eventid
        ));
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function add_event($eventid, $title, $content, $membernum, $authorid, $starttime, $endtime)
    {
        $data = array(
            'eventid' => $eventid,
            'title' => $title,
            'content' => $content,
            'membernum' => $membernum,
            'authorid' => $authorid,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->insert('event', $data);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    function update_event($eventid, $title, $content, $membernum, $authorid, $starttime, $endtime)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'membernum' => $membernum,
            'authorid' => $authorid,
            'starttime' => $starttime,
            'endtime' => $endtime,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->where('eventid', $eventid);
        $this->db->update('event', $data);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }

    function delete_event($eventid)
    {
        $this->db->delete('event', array(
            'eventid' => $eventid
        ));
        $this->db->delete('event_relation', array(
            'eventid' => $eventid
        ));
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }
}