<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

	// Function untuk mendapatkan data pembayaran user dengan berdasarkan status
	public function getPembayaranUser()
	{
		// Hasil Return Array
		return $this->db
		->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
		->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
		->where('penggunaan.id_pelanggan',$this->session->userdata('id_pelanggan'))
		->where('penggunaan.status',0)
		->or_where('penggunaan.status',1)
		->where('penggunaan.id_pelanggan',$this->session->userdata('id_pelanggan'))
		->or_where('penggunaan.status',2)
		->where('penggunaan.id_pelanggan',$this->session->userdata('id_pelanggan'))
		->order_by('status','asc')
		->get('penggunaan')->result();

	}

	// Function untuk menambahkan data setelah mengupload bukti
	public function uploadDB($id,$namaFile)
	{
		$object = array(
			'id_penggunaan' => $id,
		 	'tanggal_pembayaran' => date("Y-m-d"),
		 	'biaya_admin' => 2500,
		 	'total_bayar' => $this->input->post('total'),
		 	'bukti' => $namaFile);
		$query = $this->db->insert('pembayaran', $object);
		// Mengecek jika query berjalan
		if ($query) {
			// Update status penggunaan menjadi pending
			$objectPenggunaan = array('status' => 1);
			return $this->db
			->where('id_penggunaan',$id)
			->where('id_pelanggan',$this->session->userdata('id_pelanggan'))
			->update('penggunaan', $objectPenggunaan);
		} else{
			return FALSE;
		}
	}	

}

/* End of file M_Pembayaran.php */
/* Location: ./application/models/M_Pembayaran.php */
 ?>