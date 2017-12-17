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
            $friend_news = $this->Moment_model->get_friends_news($this->session->userdata('userid'));
            $all_news = $this->Moment_model->get_news();
            foreach ($friend_news as $row) {
                $album_name = $this->Album_model->get_album_name($row->albumid)->name;
                $photo_name = $this->Album_model->get_photos($row->albumid)[0]->name;
                $address = "static/pic/album/".$row->username."/".$album_name."/".$photo_name;
                $row->address = $address;
            }
            foreach ($all_news as $row) {
                $album_name = $this->Album_model->get_album_name($row->albumid)->name;
                $photo_name = $this->Album_model->get_photos($row->albumid)[0]->name;
                $address = "static/pic/album/".$row->username."/".$album_name."/".$photo_name;
                $row->address = $address;
            }
            $data = array("friend_news" => $friend_news, "all_news" => $all_news);
            $this->load->view('templates/header');
            $this->load->view('moment/moment', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('account/login', 'auto');
        }
    }

    function search()
    {
        if (!empty($this->session->userdata('username'))) {
            $tag = $this->input->post('tag');
            $photo_news = $this->Moment_model->get_by_phototag($tag);
            $album_news = $this->Moment_model->get_by_albumtag($tag);
            foreach ($photo_news as $row) {
                $album_name = $this->Album_model->get_album_name($row->albumid)->name;
                $photo_name = $this->Album_model->get_photos($row->albumid)[0]->name;
                $address = "static/pic/album/".$row->username."/".$album_name."/".$photo_name;
                $row->address = $address;
            }
            foreach ($album_news as $row) {
                $album_name = $this->Album_model->get_album_name($row->albumid)->name;
                $photo_name = $this->Album_model->get_photos($row->albumid)[0]->name;
                $address = "static/pic/album/".$row->username."/".$album_name."/".$photo_name;
                $row->address = $address;
            }
            $data = array("photo_news" => $photo_news, "album_news" => $album_news,  "tag" =>$tag);
            $this->load->view('templates/header');
            $this->load->view('moment/search', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('account/login', 'auto');
        }
    }

    function upload()
    {
        $username = $this->session->userdata('username');
        $userid = $this->session->userdata('userid');
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
        $config['max_size'] = 10 * 1024;
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

    function share()
    {
        $newsid = $this->input->post('newsid');
        $userid = $this->session->userdata('userid');
        $this->Moment_model->share($newsid, $userid);
        redirect('moment/overview', 'auto');
    }

    function star(){
        $newsid = $this->input->post('newsid');
        $data['result'] = $this->Moment_model->star($newsid);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
    }
}