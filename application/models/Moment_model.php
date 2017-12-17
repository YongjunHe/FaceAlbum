<?php

class Moment_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_news()
    {
        $this->db->select('user.username, friend_news.*');
        $this->db->from('friend_news');
        $this->db->join('user', 'user.userid = friend_news.authorid');
        $this->db->order_by('friend_news.star','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_friends_news($userid)
    {
        $this->db->select('user.username, friend_news.*');
        $this->db->from('friend_relation');
        $this->db->join('user', 'user.userid = friend_relation.friendid');
        $this->db->join('friend_news', 'friend_news.ownerid = friend_relation.friendid');
        $this->db->where('friend_relation.userid', $userid);
        $this->db->order_by('friend_news.updatetime','DESC');
        $query = $this->db->get();
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

    function get_by_phototag($tag)
    {
        $this->db->select('user.username, friend_news.*');
        $this->db->from('friend_news');
        $this->db->join('user', 'user.userid = friend_news.authorid');
        $this->db->join('photo', 'photo.albumid = friend_news.albumid');
        $this->db->join('tag_photo', 'photo.photoid = tag_photo.photoid');
        $this->db->where('tag_photo.tag', $tag);
        $this->db->order_by('friend_news.star','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_by_albumtag($tag)
    {
        $this->db->select('user.username, friend_news.*');
        $this->db->from('friend_news');
        $this->db->join('user', 'user.userid = friend_news.authorid');
        $this->db->join('tag_album', 'friend_news.albumid = tag_album.albumid');
        $this->db->where('tag_album.tag', $tag);
        $this->db->order_by('friend_news.star','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function add_news($userid, $content, $albumid, $photo_count)
    {
        $data = array(
            'authorid' => $userid,
            'content' => $content,
            'ownerid' => $userid,
            'albumid' => $albumid,
            'photo_count' => $photo_count,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time()),
            'star' => 0,
        );
        $this->db->insert('friend_news', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function share_news($newsid, $userid)
    {
        $news = $this->get_by_newsid($newsid);
        $data = array(
            'authorid' => $news->authorid,
            'content' => $news->content,
            'ownerid' => $userid,
            'albumid' => $news->albumid,
            'photo_count' => $news->photo_count,
            'star' => 0,
            'updatetime' => mdate('%Y %m %d - %h:%i %a', time()),
        );
        $this->db->insert('friend_news', $data);
        if ($this->db->affected_rows() > 0) {
            return TRUE;
        }
        return FALSE;
    }

    function star_news($newsid)
    {
        $news = $this->get_by_newsid($newsid);
        $data = array(
            'star' => $news->star + 1,
        );
        $this->db->where('newsid', $newsid);
        $this->db->update('friend_news', $data);
        if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }
}