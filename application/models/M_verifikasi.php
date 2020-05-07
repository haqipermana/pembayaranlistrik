<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_verifikasi extends CI_Model {

	// Function query untuk mendapatkan data verifikasi dari tabel pembayaran berstatus pending
	public function getVerifikasiPending()
	{
		return $this->db
		->join('penggunaan','penggunaan.id_penggunaan=pembayaran.id_penggunaan')
		->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
		->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
		->where('status',1)
		->get('pembayaran')->result();
	}
	// Function query untuk mengupdate status
	public function gantiStatus($id,$status,$idpmb)
	{

		$object = array('status' => $status);
		// Jika status menjadi tidak lunas, data pembayaran akan dihapus
		if ($status == 0) {
			$this->db
			->where('id_penggunaan',$id)
			->where('id_pembayaran',$idpmb)
			->delete('pembayaran');
		}
		// Hasil return true
		return $this->db
		->where('id_penggunaan',$id)
		->update('penggunaan', $object);
	}

}

/* End of file M_verifikasi.php */
/* Location: ./application/models/M_verifikasi.php */ ?>