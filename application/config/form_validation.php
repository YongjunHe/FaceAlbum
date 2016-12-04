<?php
$config = array (
		'Account/login' => array ( // 登录表单的规则
				array (
						'field' => 'username',
						'label' => '用户名',
						'rules' => 'trim|required|callback_username_check' 
				),
				array (
						'field' => 'password',
						'label' => '密码',
						'rules' => 'trim|required|callback_password_check' 
				) 
		),
		'Account/register' => array ( // 用户注册表单的规则
				array (
						'field' => 'username',
						'label' => '用户名',
						'rules' => 'trim|required|callback_username_exists' 
				),
				array (
						'field' => 'password',
						'label' => '密码',
						'rules' => 'trim|required|min_length[4]|max_length[12]' 
				),
				array (
						'field' => 'email',
						'label' => '邮箱账号',
						'rules' => 'trim|required|valid_email|callback_email_exists' 
				) 
		),
		'Account/settings' => array ( // 用户设置规则
				array (
						'field' => 'password',
						'label' => '密码',
						'rules' => 'trim|required|min_length[4]|max_length[12]'
				),
				array (
						'field' => 'email',
						'label' => '电子邮箱',
						'rules' => 'trim|required|valid_email'
				),
				array (
						'field' => 'telnum',
						'label' => '手机号码',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'age',
						'label' => '年龄',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'height',
						'label' => '身高',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'weight',
						'label' => '体重',
						'rules' => 'trim|required'
				),
		), 
		'Health/plan' => array ( // 用户注册表单的规则
				array (
						'field' => 'content',
						'label' => '内容',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'starttime',
						'label' => '开始时间',
						'rules' => 'trim|required'
				),
				array (
						'field' => 'endtime',
						'label' => '结束时间',
						'rules' => 'trim|required'
				)
		),
);