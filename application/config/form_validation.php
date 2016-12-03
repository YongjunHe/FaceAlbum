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
		) 
);