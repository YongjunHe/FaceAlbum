<?php
class Account extends CI_Controller {
	private $salt;
	public function __construct() {
		parent::__construct ();
		$this->load->model ( 'Account_model' );
		$this->load->helper ( array (
				'form',
				'url' 
		) );
		$this->load->library ( array (
				'form_validation',
				'session' 
		) );
		$this->salt = "HOBBY";
	}
	function overview() {
		$this->load->view ( 'account/homepage' );
	}
	function settings() {
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		$username = $this->session->userdata ( 'username' ); // 用户名
		$data ['userMsg'] = $this->Account_model->get_by_username ( $username );
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/personal_settings', $data );
		} else {
			$username = $this->session->userdata ( 'username' );
			$password = md5 ( $this->salt . $this->input->post ( 'password' ) );
			$email = $this->input->post ( 'email' );
			$tel = $this->input->post ( 'telnum' );
			$age = $this->input->post ( 'age' );
			$height = $this->input->post ( 'height' );
			$weight = $this->input->post ( 'weight' );
			if ($this->Account_model->update_user ( $username, $password, $email, $tel, $age, $height, $weight )) {
				$data ['message'] = "The information has now been set! You can go " . anchor ( 'account/overview', 'homepage' ) . '.';
			} else {
				$data ['message'] = "There was a problem when set your information. You can set " . anchor ( 'account/settings', 'here' ) . ' again.';
			}
			$this->load->view ( 'account/note', $data );
		}
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
	function login() {
		// 设置错误定界符
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		$this->_username = $this->input->post ( 'username' ); // 用户名
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/login' );
		} else {
			// 注册session,设定登录状态
			$this->Account_model->login ( $this->_username );
			
			$row = $this->Account_model->get_by_username ( $this->_username );
			$identity = $row->identity;
			if ($identity == "user")
				$data ['message'] = $this->session->userdata ( 'username' ) . ' You have logged in successfully! Now take a look at the ' . anchor ( 'account/overview', 'homepage' );
			else
				$data ['message'] = 'Adminstrator You have logged in successfully! Now take a look at the ' . anchor ( 'management/overview', 'System Management' );
			$this->load->view ( 'account/note', $data );
		}
	}
	
	// 登录表单验证时自定义的函数
	/**
	 * 提示用户名是不存在的登录
	 *
	 * @param string $username        	
	 * @return bool
	 */
	function username_check($username) {
		if ($this->Account_model->get_by_username ( $username )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'username_check', '用户名不存在' );
			return FALSE;
		}
	}
	/**
	 * 检查用户的密码正确性
	 */
	function password_check($password) {
		$password = md5 ( $this->salt . $password );
		if ($this->Account_model->password_check ( $this->_username, $password )) {
			return TRUE;
		} else {
			$this->form_validation->set_message ( 'password_check', '用户名或密码不正确' );
			return FALSE;
		}
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
	function register() {
		// 设置错误定界符
		$this->form_validation->set_error_delimiters ( '<span class="error">', '</span>' );
		
		if ($this->form_validation->run () == FALSE) {
			$this->load->view ( 'account/register' );
		} else {
			$username = $this->input->post ( 'username' );
			$password = md5 ( $this->salt . $this->input->post ( 'password' ) );
			$email = $this->input->post ( 'email' );
			if ($this->Account_model->add_user ( $username, $password, $email )) {
				$data ['message'] = "The user account has now been created! You can go " . anchor ( 'account/overview', 'here' ) . '.';
			} else {
				$data ['message'] = "There was a problem when adding your account. You can register " . anchor ( 'account/register', 'here' ) . ' again.';
			}
			$this->load->view ( 'account/note', $data );
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
	 *
	 * @param string $username        	
	 * @return boolean
	 */
	function username_exists($username) {
		if ($this->Account_model->get_by_username ( $username )) {
			$this->form_validation->set_message ( 'username_exists', '用户名已被占用' );
			return FALSE;
		}
		return TRUE;
	}
	function email_exists($email) {
		if ($this->Account_model->email_exists ( $email )) {
			$this->form_validation->set_message ( 'email_exists', '邮箱已被占用' );
			return FALSE;
		}
		return TRUE;
	}
	
	/**
	 * 用户退出
	 * 已经登录则退出，否则转到details
	 */
	function logout() {
		$data ['message'] = $this->session->userdata ( 'username' ) . ' You have logged out successfully! ';
		if ($this->Account_model->logout () == TRUE) {
			$this->load->view ( 'account/note', $data );
		} else {
		}
	}
}