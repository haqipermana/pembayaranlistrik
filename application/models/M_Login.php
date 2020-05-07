<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {
	
	//Function untuk query login admin
	public function getLoginAdmin()
	{
		return $this->db
		->where('username',$this->input->post('username'))
		->where('password',$this->input->post('password'))
		->get('admin');
	}
	// Function untuk query login pelanggan dengan password yang telah di-hash md5
	public function getLoginPelanggan()
	{
		return $this->db
		->where('username',$this->input->post('username'))
		->where('password',md5($this->input->post('password')))
		->get('pelanggan');
	}
}

/* End of file M_Login.php */
/* Location: ./application/models/M_Login.php */
?>