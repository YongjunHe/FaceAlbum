<?php
$config = array(
    'register' => array( // 用户注册表单的规则
        array(
            'field' => 'username',
            'label' => '用户名',
            'rules' => 'trim|required|callback_username_exists'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|required|min_length[4]|max_length[12]'
        ),
        array(
            'field' => 'email',
            'label' => '电子邮箱',
            'rules' => 'trim|required|valid_email|callback_email_exists'
        )
    ),
    'login' => array( // 登录表单的规则
        array(
            'field' => 'username',
            'label' => '用户名',
            'rules' => 'trim|required|callback_username_check'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|required|callback_password_check'
        )
    ),
    'settings' => array( // 用户设置规则
        array(
            'field' => 'username',
            'label' => '用户名',
            'rules' => 'trim|required|callback_username_check'
        ),
        array(
            'field' => 'password',
            'label' => '密码',
            'rules' => 'trim|required|min_length[4]|max_length[12]'
        ),
        array(
            'field' => 'email',
            'label' => '电子邮箱',
            'rules' => 'trim|required|valid_email'
        ),
        array(
            'field' => 'tel',
            'label' => '电话号码',
            'rules' => 'trim'
        ),
        array(
            'field' => 'age',
            'label' => '年龄',
            'rules' => 'trim'
        ),
        array(
            'field' => 'sex',
            'label' => '性别',
            'rules' => 'trim'
        ),
    ),
    'event' => array( // 活动设置规则
        array(
            'field' => 'eventid',
            'label' => '活动编号',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'title',
            'label' => '标题',
            'rules' => 'trim|required'
        ),
        array(
            'field' => 'content',
            'label' => '内容',
            'rules' => 'required'
        ),
        array(
            'field' => 'starttime',
            'label' => '开始时间',
            'rules' => 'trim'
        ),
        array(
            'field' => 'endtime',
            'label' => '结束时间',
            'rules' => 'trim'
        ),
    ),
);