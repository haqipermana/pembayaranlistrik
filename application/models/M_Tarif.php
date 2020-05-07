<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tarif extends CI_Model {
	
	// Function query mendapatkan semua data dari tabel tarif
	public function getTarifAll()
	{
		// Hasil return array
		return $this->db->get('tarif')->result();
	}
	// Function query untuk menambahkan data tarif
	public function addTarif()
	{
		// Hasil return true
		$object = array(
			'daya' => $this->input->post('daya'),
			'tarifperkwh' => $this->input->post('tarif'));
		return $this->db->insert('tarif', $object);
	}
	// Function query mendapatkan tarif tertentu berdasarkan id tarif
	public function getTarifById($id)
	{
		// Hasil return object
		return $this->db
		->where('id_tarif', $id)
		->get('tarif')->row();
	}
	// Function query untuk mengupdate tarif tertentu berdasrkan id tarif
	public function updateTarif()
	{
		// Hasil return true
		$object = array(
			'daya' => $this->input->post('daya'),
			'tarifperkwh' => $this->input->post('tarif'));

		return $this->db
		->where('id_tarif',$this->input->post('id_tarif'))
		->update('tarif', $object);
	}
	// Function query untuk menghapus tarif tertentu berdasarkan id tarif
	public function deleteTarif($id)
	{
		return $this->db
		->where('id_tarif',$id)
		->delete('tarif');
	}
}

/* End of file M_Tarif.php */
/* Location: ./application/models/M_Tarif.php */ ?>