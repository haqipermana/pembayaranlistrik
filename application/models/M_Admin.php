 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Admin extends CI_Model {
	// Function getAllAdmin untuk mendapatkan semua data admin dari database
	public function getAllAdmin()
	{
		// Hasil return array
		return $this->db
		->join('level','level.id_level=admin.id_level')
		->get('admin')->result();
	}
	// Function getAdminById untuk mendapatkan data detail admin berdasrkan id admin
	public function getAdminById($id)
	{
		// Hasil return object
		return $this->db
		->where('id_admin',$id)
		->get('admin')->row();
	}
	// Function getKevek untuj mendapatkan semua data level
	public function getLevel()
	{
		// Hasil return array
		return $this->db->get('level');
	}

	//Function addAdmin untuk menambakan data admin ke database 
	public function addAdmin()
	{
		// Cek data double dari database admin 
		$cek = $this->db
		->where('username',$this->input->post('username'))
		->get('admin');
		// Pengecekan data double
		if ($cek->num_rows()>0) {
			return FALSE;
		} else {
			// Query insert data admin ke database
			$object = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password'),
				'nama' => $this->input->post('nama'),
				'id_level' => $this->input->post('id_level'));
			// Hasil return true
			$this->db->insert('admin', $object);
			return TRUE;
		}
	}
	// Function updateAdmin untuk mengupdate data admin di database berdasarkan id admin
	public function updateAdmin()
	{
		// Query update data admin ke database
		$object = array(
			'username' => $this->input->post('username'),
			'nama' => $this->input->post('nama'),
			'id_level' => $this->input->post('id_level'));
		// Hasil return true
		return $this->db
		->where('id_admin',$this->input->post('id_admin'))
		->update('admin', $object);
	}

	// Function deleteAdmin untuk menhapus data admin di database berdasarkan id admin
	public function deleteAdmin($id)
	{
		// Hasil return true
		return $this->db
		->where('id_admin',$id)
		->delete('admin');
	}
}

/* End of file M_Pelanggan.php */
/* Location: ./application/models/M_Pelanggan.php */
 ?>