<?php

class Moment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Album_model', 'Account_model', 'Moment_model'));
        $this->load->helper(array(
            'form',
            'url',
            'date'
        ));
        $this->load->library(array(
            'form_validation',
            'session'
        ));
    }

    function overview()
    {
        if (!empty($this->session->userdata('username'))) {
            $news =  $this->Moment_model->get_news();
            $data = array("news" => $news);
            $this->load->view('templates/header');
            $this->load->view('moment/moment', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('account/login', 'auto');
        }
    }

    function upload()
    {
        $username = $this->session->userdata('username');
        $userid = $this->Account_model->get_by_username($username)->userid;
        $album_name = $this->input->post('album_name');
        $news_content = $this->input->post('news_content');
        $dir = APPPATH . "../static/pic/album/" . $username . "/" . $album_name;
        if (!file_exists($dir)) {
            mkdir($dir);
            $this->Album_model->add_album($userid, $album_name);
        }
        $albums = $this->Album_model->get_albums($userid);
        foreach ($albums as $row) {
            if ($row->name == $album_name) {
                $albumid = $row->albumid;
            }
        }

        $config['upload_path'] = "D:/xampp/htdocs/FaceAlbum/static/pic/album/" . $username . "/" . $album_name;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10*1024;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;
        $this->load->library('upload', $config);
        foreach ($_FILES as $key => $value) {
            $this->upload->do_upload($key);
            $this->Album_model->add_photo($albumid, $value['name']);
        }
        $this->Moment_model->add_news($userid, $news_content, $albumid, sizeof($_FILES));

        redirect('moment/overview', 'auto');
    }

    function search()
    {
        if (!empty($this->session->userdata('username'))) {
            $username = $this->session->userdata('username');
            $userid = $this->Account_model->get_by_username($username)->userid;
            $albums = $this->Album_model->get_albums($userid);
            if (!empty($this->uri->segment(3))) {
                $album_name = $this->uri->segment(3);
                foreach ($albums as $row) {
                    if ($row->name == $album_name) {
                        $albumid = $row->albumid;
                    }
                }
            } else {
                $album_name = $albums[0]->name;
                $albumid = $albums[0]->albumid;
            }
            $photos = $this->Album_model->get_photos($albumid);
            $tags = $this->Album_model->get_tags($albumid);
            $data = array("album_name" => $album_name, "albums" => $albums, "photos" => $photos,  "tags" => $tags);
            $this->load->view('templates/header');
            $this->load->view('moment/search', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('account/login', 'auto');
        }
    }
}