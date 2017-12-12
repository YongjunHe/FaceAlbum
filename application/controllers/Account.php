<?php

class Account extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Account_model', 'Friend_model'));
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
        $this->load->view('templates/header');
        $this->load->view('account/login');
        $this->load->view('templates/footer');
    }

    /**
     * 用户注册
     * 表单规则在配置文件:/config/form_validation.php
     * 'account/register'=>array( //用户注册表单的规则
     * array(
     * 'field'=>'username',
     * 'label'=>'用户名',
     * 'rules'=>'trim|required|xss_clean|callback_username_exists'
     * ),
     * array(
     * 'field'=>'password',
     * 'label'=>'密码',
     * 'rules'=>'trim|required|min_length[4]|max_length[12]
     * |matches[password_conf]|xss_clean'
     * ),
     * array(
     * 'field'=>'email',
     * 'label'=>'邮箱账号',
     * 'rules'=>'trim|required|xss_clean|valid_email|callback_email_exists'
     * )
     * )
     * 错误提示信息在文件：/system/language/english/form_validation_lang.php
     */
    function register()
    {
        // 设置错误定界符
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');

        if ($this->form_validation->run('register') == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('account/register');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            if ($this->Account_model->add_user($username, $password, $email)) {
                $dir = APPPATH . "../static/pic/album/" . $username;
                if (!file_exists($dir)) {
                    mkdir($dir);
                }
                $data ['userMsg'] = $this->Account_model->get_by_username($username);
                $this->Account_model->login($this->_username);
                $this->load->view('templates/header');
                $this->load->view('account/settings', $data);
                $this->load->view('templates/footer');
            } else {
                $this->load->view('templates/header');
                $this->load->view('account/register');
                $this->load->view('templates/footer');
            }
        }
    }
    /**
     * ======================================
     * 用于注册表单验证的函数
     * 1、username_exists()
     * 2、email_exists()
     * ======================================
     */
    /**
     * 验证用户名是否被占用。
     * 存在返回false, 否者返回true.
     */
    function username_exists($username)
    {
        if ($this->Account_model->get_by_username($username)) {
            $this->form_validation->set_message('username_exists', '用户名已被占用');
            return FALSE;
        }
        return TRUE;
    }

    /**
     * 验证邮箱是否被占用。
     * 存在返回false, 否者返回true.
     */
    function email_exists($email)
    {
        if ($this->Account_model->email_exists($email)) {
            $this->form_validation->set_message('email_exists', '邮箱已被占用');
            return FALSE;
        }
        return TRUE;
    }

    /**
     * 接收、验证登录表单
     * 表单规则在配置文件:/config/form_validation.php
     * 'account/login'=>array( //登录表单的规则
     * array(
     * 'field'=>'username',
     * 'label'=>'用户名',
     * 'rules'=>'trim|required|xss_clean|callback_username_check'
     * ),
     * array(
     * 'field'=>'password',
     * 'label'=>'密码',
     * 'rules'=>'trim|required|xss_clean|callback_password_check'
     * )
     * )
     * 错误提示信息在文件：/system/language/english/form_validation_lang.php
     */
    function login()
    {
        // 设置错误定界符
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        if (empty($this->session->userdata('username'))) {
            $this->_username = $this->input->post('username');
            if ($this->form_validation->run('login') == FALSE) {
                $this->load->view('templates/header');
                $this->load->view('account/login');
                $this->load->view('templates/footer');
            } else {
                // 注册session,设定登录状态
                $this->Account_model->login($this->_username);
                $row = $this->Account_model->get_by_username($this->_username);
                $identity = $row->identity;
                if ($identity == "admin") {
                    redirect('admin/overview', 'auto');
                } else {
                    redirect('account/settings', 'auto');
                }
            }
        } else {
            $this->Account_model->login($this->session->userdata('username'));
            $row = $this->Account_model->get_by_username($this->session->userdata('username'));
            $identity = $row->identity;
            if ($identity == "admin") {
                redirect('admin/overview', 'auto');
            } else {
                redirect('account/settings', 'auto');
            }
        }
    }
    /**
     * ======================================
     * 用于登录表单验证的函数
     * 1、username_check()
     * 2、password_check()
     * ======================================
     */

    /**
     * 提示用户名是否存在的登录
     */
    function username_check($username)
    {
        if ($this->Account_model->get_by_username($username)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('username_check', '用户名不存在');
            return FALSE;
        }
    }

    /**
     * 检查用户的密码正确性
     */
    function password_check($password)
    {
        if ($this->Account_model->password_check($this->_username, $password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('password_check', '密码不正确');
            return FALSE;
        }
    }

    /**
     * 用户退出
     * 已经登录则退出，否则转到details
     */
    function logout()
    {
        if ($this->Account_model->logout() == TRUE) {
            redirect('account/login', 'auto');
        } else {
            redirect('account/settings', 'auto');
        }
    }

    /**
     * 用户设置
     */
    function settings()
    {
        $this->form_validation->set_error_delimiters('<span class="error">', '</span>');
        $username = $this->session->userdata('username'); // 用户名

        if ($this->form_validation->run('settings') == FALSE) {
            $data ['userMsg'] = $this->Account_model->get_by_username($username);
            $data ['friends'] = $this->Friend_model->get_friends($data ['userMsg']->userid);
            $groups = array();
            foreach ($data['friends'] as $row) {
                $groups[$row->group] = 0;
            }
            foreach ($data['friends'] as $row) {
                $groups[$row->group] += 1;
            }
            $data ['groups'] = $groups;
            $this->load->view('templates/header');
            $this->load->view('account/settings', $data);
            $this->load->view('templates/footer');
        } else {
            $password = $this->input->post('password');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $age = $this->input->post('age');
            $sex = $this->input->post('sex');
            if ($this->Account_model->update_user($username, $password, $email, $tel, $age, $sex)) {
                $data ['message'] = "The information has now been set! You can go " . anchor('account/overview', 'homepage') . '.';
            } else {
                $data ['message'] = "There was a problem when set your information. You can set " . anchor('account/settings', 'here') . ' again.';
            }
            $this->load->view('account/note', $data);
        }
    }
}