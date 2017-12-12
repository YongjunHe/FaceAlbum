<?php

class Moment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_news()
    {
        $query = $this->db->get('friend_news');
        return $query->result();
    }

    function get_by_newsid($newsid)
    {
        $this->db->where('newsid', $newsid);
        $query = $this->db->get('friend_news');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function add_news($userid, $content, $albumid, $photo_count)
    {
        $data = array(
            'authorid' => $userid,
            'content' => $content,
            'ownerid' => $userid,
            'albumid' => $albumid,
            'photo_count' => $photo_count,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->insert('friend_news', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function share_news($authorid, $ownerid, $content, $albumid, $photo_count)
    {
        $data = array(
            'authorid' => $authorid,
            'content' => $content,
            'ownerid' => $ownerid,
            'albumid' => $albumid,
            'photo_count' => $photo_count,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time())
        );
        $this->db->insert('friend_news', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
}