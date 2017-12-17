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

    function get_album($userid, $name)
    {
        $data = array(
            'userid' => $userid,
            'name' => $name
        );
        $this->db->where($data);
        $query = $this->db->get('album');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function get_album_name($albumid)
    {
        $data = array(
            'albumid' => $albumid,
        );
        $this->db->where($data);
        $query = $this->db->get('album');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function add_album($userid, $name)
    {
        $this->db->select('max(albumid) as albumid');
        $albumid = $this->db->get('album')->row()->albumid+1;
        $data = array(
            'albumid' => $albumid,
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
        $albumid = $this->get_album($userid, $name);
        $data = array(
            'albumid' => $albumid,
        );
        $this->db->delete('photo', $data);

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

    function get_album_tags($albumid)
    {
        $this->db->where('albumid', $albumid);
        $query = $this->db->get('tag_album');
        return $query->result();
    }

    function add_tag_album($albumid, $tag)
    {
        $data = array(
            'albumid' => $albumid,
            'tag' => $tag
        );
        $this->db->insert('tag_album', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_tag_album($albumid, $tag)
    {
        $data = array(
            'albumid' => $albumid,
            'tag' => $tag
        );
        $this->db->delete('tag_album', $data);
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

    function get_photo($albumid, $name)
    {
        $data = array(
            'albumid' => $albumid,
            'name' => $name
        );
        $this->db->where($data);
        $query = $this->db->get('photo');
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }

    function add_photo($albumid, $photo_name)
    {
        $this->db->select('max(photoid) as photoid');
        $photoid = $this->db->get('photo')->row()->photoid+1;
        $data = array(
            'photoid' => $photoid,
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
        $data = array(
            'albumid' => $albumid,
            'name' => $name
        );
        $this->db->delete('photo', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function get_tag_photo($photoid)
    {
        $this->db->where('photoid', $photoid);
        $query = $this->db->get('tag_photo');
        return $query->result();
    }

    function add_tag_photo($photoid, $tag)
    {
        $data = array(
            'photoid' => $photoid,
            'tag' => $tag
        );
        $this->db->insert('tag_photo', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function delete_tag_photo($photoid, $tag)
    {
        $data = array(
            'photoid' => $photoid,
            'tag' => $tag
        );
        $this->db->delete('tag_photo', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }
}