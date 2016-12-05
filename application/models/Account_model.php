<?php
class Account_model extends CI_Model {
	public function __construct() {
		$this->load->database ();
	}
	
	/**
	 * 添加用户session数据,设置用户在线状态
	 *
	 * @param string $username        	
	 */
	function login($username) {
		$data = array (
				'username' => $username,
				'logged_in' => TRUE 
		);
		$this->session->set_userdata ( $data ); // 添加session数据
	}
	
	/**
	 * 注销用户
	 *
	 * @return boolean
	 */
	function logout() {
		if ($this->session->userdata ( 'logged_in' ) === TRUE) {
			$this->session->sess_destroy (); // 销毁所有session的数据
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * 通过用户名获得用户记录
	 *
	 * @param string $username        	
	 */
	function get_by_username($username) {
		$this->db->where ( 'username', $username );
		$query = $this->db->get ( 'user' );
		// return $query->row(); //不判断获得什么直接返回
		if ($query->num_rows () == 1) {
			return $query->row ();
		} else {
			return FALSE;
		}
	}
	function get_by_userid($userid) {
		$this->db->where ( 'userid', $userid );
		$query = $this->db->get ( 'user' );
		// return $query->row(); //不判断获得什么直接返回
		if ($query->num_rows () == 1) {
			return $query->row ();
		} else {
			return FALSE;
		}
	}
	
	/**
	 * 用户名不存在时,返回false
	 * 用户名存在时，验证密码是否正确
	 */
	function password_check($username, $password) {
		if ($user = $this->get_by_username ( $username )) {
			return $user->password == $password ? TRUE : FALSE;
		}
		return FALSE; // 当用户名不存在时
	}
	
	/**
	 * 添加用户
	 */
	function add_user($username, $password, $email) {
		$data = array (
				'username' => $username,
				'password' => $password,
				'email' => $email 
		);
		$this->db->insert ( 'user', $data );
		if ($this->db->affected_rows () > 0) {
			$this->login ( $username );
			return TRUE;
		}
		return FALSE;
	}
	function update_user($username, $password, $email, $tel, $age, $height, $weight) {
		$data = array (
				'password' => md5 ( "HOBBY" . $password ),
				'email' => $email,
				'tel' => $tel,
				'age' => $age,
				'height' => $height,
				'weight' => $weight 
		);
		$this->db->where ( 'username', $username );
		$this->db->update ( 'user', $data );
		if ($this->db->affected_rows () > 0)
			return TRUE;
		return FALSE;
	}
	
	/**
	 * 检查邮箱账号是否存在.
	 *
	 * @param string $email        	
	 * @return boolean
	 */
	function email_exists($email) {
		$this->db->where ( 'email', $email );
		$query = $this->db->get ( 'user' );
		return $query->num_rows () ? TRUE : FALSE;
	}
}