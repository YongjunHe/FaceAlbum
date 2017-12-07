<?php

class Event_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_by_memberid($memberid)
    {
        $sql = "SELECT * FROM event_relation t1 join event t2 on 
				t1.eventid=t2.eventid where t1.memberid = ?";
        $query = $this->db->query($sql, array(
            $memberid
        ));
        return $query->result();
    }

    function add_member($eventid, $memberid)
    {
        $this->db->insert('event_relation', array(
            'eventid' => $eventid,
            'memberid' => $memberid
        ));
        if ($this->db->affected_rows() > 0) {
            $sql = "UPDATE event SET membernum = membernum + 1 WHERE eventid = ?";
            $this->db->query($sql, array(
                $eventid
            ));
            return TRUE;
        }
        return FALSE;
    }

    function delete_member($eventid, $memberid)
    {
        $this->db->delete('event_relation', array(
            'eventid' => $eventid,
            'memberid' => $memberid
        ));
        if ($this->db->affected_rows() > 0) {
            $sql = "UPDATE event SET membernum = membernum-1 WHERE eventid = ?";
            $this->db->query($sql, array(
                $eventid
            ));
            return TRUE;
        }
        return FALSE;
    }
}