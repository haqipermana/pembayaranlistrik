<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_History extends CI_Model {

	// Function Query getHistry dari tabel penggunaan dan juga pembayaran
	public function getHistoryAll()
	{
		// Hasil Return array
		return $this->db
		->join('penggunaan','penggunaan.id_penggunaan=pembayaran.id_penggunaan')
		->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
		->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
		->get('pembayaran')->result();
	}	

}

/* End of file M_History.php */
/* Location: ./application/models/M_History.php */
?>