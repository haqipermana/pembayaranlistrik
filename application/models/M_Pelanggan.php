 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pelanggan extends CI_Model {
	// Function query getAllPelanggan
	public function getAllPelanggan()
	{
		// Hasil return array
		return $this->db
		->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
		->get('pelanggan')->result();
	}

	// Function getPelangganById untuk mendapatkan pelanggan berdasarkan id pelanggan
	public function getPelangganById($id)
	{
		// Hasil return object
		return $this->db
		->where('id_pelanggan',$id)
		->get('pelanggan')->row();
	}

	// Function getTarif
	public function getTarif()
	{
		// Hasil return array
		return $this->db->get('tarif')->result();
	}

	// Function addPelanggan untuk menambahkan data pelanggan ke database
	public function addPelanggan()
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
				'id_tarif' => $this->input->post('id_tarif'));
			// Hasil return true
			return $this->db->insert('pelanggan', $object);
		}
	}

	// Function updatePelanggan untuk mengupdate data pelanggan berdasarkan id pelanggan
	public function updatePelanggan($id)
	{
		$object = array(
			'username' => $this->input->post('username'),
			'nomor_kwh' => $this->input->post('nomor'),
			'nama_pelanggan' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'id_tarif' => $this->input->post('id_tarif'));
		// Hasil return true
		return $this->db
		->where('id_pelanggan',$id)
		->update('pelanggan', $object);
	}

	// Function menghapus pelanggan berdasarkan id
	public function deletePelanggan($id)
	{
		// Hasil Return true
		return $this->db
		->where('id_pelanggan',$id)
		->delete('pelanggan');
	}
}

/* End of file M_Pelanggan.php */
/* Location: ./application/models/M_Pelanggan.php */
 ?>