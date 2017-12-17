<?php

class Album extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Album_model', 'Account_model'));
        $this->load->helper(array(
            'download',
            'url',
            'file'
        ));
        $this->load->library(array(
            'session'
        ));
    }

    function overview()
    {
        if (!empty($this->session->userdata('username'))) {
            $userid = $this->session->userdata('userid');
            $albums = $this->Album_model->get_albums($userid);
            if (!empty($this->uri->segment(3))) {
                $album_name = $this->uri->segment(3);
                $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;
            } else {
                $album_name = $albums[0]->name;
                $albumid = $albums[0]->albumid;
            }
            $photos = $this->Album_model->get_photos($albumid);
            $tags = $this->Album_model->get_album_tags($albumid);
            $data = array("album_name" => $album_name, "albums" => $albums, "photos" => $photos, "tags" => $tags);
            $this->load->view('templates/header');
            $this->load->view('album/album', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('account/login', 'auto');
        }
    }

    function others_album(){
        $username = $this->uri->segment(3);
        $userid = $this->Account_model->get_by_username($username)->userid;
        $albums = $this->Album_model->get_albums($userid);
        $album_name = $albums[0]->name;
        $albumid = $albums[0]->albumid;
        $photos = $this->Album_model->get_photos($albumid);
        $tags = $this->Album_model->get_album_tags($albumid);
        $data = array("album_name" => $album_name, "albums" => $albums, "photos" => $photos, "tags" => $tags, 'username' => $username);
        $this->load->view('templates/header');
        $this->load->view('album/others_album', $data);
        $this->load->view('templates/footer');
    }

    function download()
    {
        $album_name = $this->uri->segment(3);
        $photo_id = $this->uri->segment(4);
        $data = file_get_contents(APPPATH . "../static/pic/album/" . $this->session->userdata('username') . "/" . $album_name . "/" . $photo_id);
        force_download($photo_id, $data);
    }

    function delete_photo()
    {
        $album_name = $this->input->post('album_name');
        $photo_name = $this->input->post('photo_name');

        $userid = $this->session->userdata('userid');
        $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;

        $address = APPPATH . "../static/pic/album/" . $this->session->userdata('username') . '/' . $album_name . '/' . $photo_name;
        $data = array("result" => unlink($address));
        if ($data['result']) {
            $this->Album_model->delete_photo($albumid, $photo_name);
        }
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function get_tag_photo()
    {
        $photo_name = $this->input->post('photo_name');
        $album_name = $this->input->post('album_name');

        $userid = $this->session->userdata('userid');
        $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;
        $photoid = $this->Album_model->get_photo($albumid, $photo_name)->photoid;
        $photo_tags = $this->Album_model->get_tag_photo($photoid);
        $data = array("photo_tags" => $photo_tags);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function add_tag_photo()
    {
        $photo_name = $this->input->post('photo_name');
        $album_name = $this->input->post('album_name');
        $tag_name = $this->input->post('tag_name');

        $userid = $this->session->userdata('userid');
        $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;
        $photoid = $this->Album_model->get_photo($albumid, $photo_name);

        $data = array("result" => $this->Album_model->add_tag_photo($photoid, $tag_name));
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function delete_tag_photo()
    {
        $photo_name = $this->input->post('photo_name');
        $album_name = $this->input->post('album_name');
        $tag_name = $this->input->post('tag_name');

        $userid = $this->session->userdata('userid');
        $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;
        $photoid = $this->Album_model->get_photo($albumid, $photo_name);

        $data = array("result" => $this->Album_model->delete_tag_photo($photoid, $tag_name));
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function add_album()
    {
        $username = $this->session->userdata('username');
        $album_name = $this->input->post('album_name');
        $dir = APPPATH . "../static/pic/album/" . $username . "/" . $album_name;
        if (!file_exists($dir)) {
            mkdir($dir);
            $data = array("result" => True);
        } else {
            $data = array("result" => False);
        }
        $userid = $this->session->userdata('userid');
        $this->Album_model->add_album($userid, $album_name);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }

    function delete_album()
    {
        $username = $this->session->userdata('username');
        $album_name = $this->uri->segment(3);
        $dir = APPPATH . "../static/pic/album/" . $username . "/" . $album_name . "/";
        delete_files($dir, TRUE);

        $userid = $this->session->userdata('userid');
        $this->Album_model->delete_album($userid, $album_name);

        redirect('album/overview', 'auto');
    }

    function tag_album()
    {
        $album_name = $this->input->post('album_name');
        $tag_name = $this->input->post('tag_name');

        $userid = $this->session->userdata('userid');
        $albumid = $this->Album_model->get_album($userid, $album_name)->albumid;

        if ($this->input->post('flag')) {
            $data = array("result" => $this->Album_model->add_tag_album($albumid, $tag_name));
        } else {
            $data = array("result" => $this->Album_model->delete_tag_album($albumid, $tag_name));
        }
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}