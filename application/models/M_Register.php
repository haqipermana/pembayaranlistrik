<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Register extends CI_Model {


	public function registrasi()
	{
		$cek = $this->db
		->where('nomor_kwh',$this->input->post('nomor'))
		->or_where('username',$this->input->post('username'))
		->get('pelanggan');
		
		if ($cek->num_rows()>0) {
			return FALSE;
		} else {
			$object = array(
				'username' => $this->input->post('username'),
				// Password hashing menggunakan md5
				'password' => md5($this->input->post('password')),
				'nomor_kwh' => $this->input->post('nomor'),
				'nama_pelanggan' => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'id_tarif' => $this->input->post('tarif'));
			// Hasil return true
			return $this->db->insert('pelanggan', $object);
	}	

}

}

/* End of file M_Register.php */
/* Location: ./application/models/M_Register.php */

 ?>