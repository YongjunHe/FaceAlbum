<?php

class Album_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_albums($userid)
    {
        $this->db->where('userid', $userid);
        $query = $this->db->get('album');
        return $query->result();
    }

    function add_album($userid, $name)
    {
        $data = array(
            'userid' => $userid,
            'name' => $name
        );
        $this->db->insert('album', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_album($userid, $name)
    {
        $data = array(
            'userid' => $userid,
            'name' => $name
        );
        $this->db->delete('album', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function get_tags($albumid)
    {
        $this->db->where('albumid', $albumid);
        $query = $this->db->get('tag');
        return $query->result();
    }

    function tag_album($albumid, $tag)
    {
        $data = array(
            'albumid' => $albumid,
            'tag' => $tag
        );
        $this->db->insert('tag', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function get_photos($albumid)
    {
        $this->db->where('albumid', $albumid);
        $query = $this->db->get('photo');
        return $query->result();
    }

    function add_photo($albumid, $photo_name)
    {
        $data = array(
            'albumid' => $albumid,
            'name' => $photo_name
        );
        $this->db->insert('photo', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_photo($albumid, $name)
    {

    }
}