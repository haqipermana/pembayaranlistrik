<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class M_Penggunaan extends CI_Model {
		
		// Function Query addPenggunaan untuk menambahkan data penggunaan
		public function addPenggunaan()
		{
			// Cek data penggunaan tahun dan bulan double
			$cek = $this->db
			->where('id_pelanggan',$this->input->post('id_pelanggan'))
			->where('bulan',$this->input->post('bulan'))
			->where('tahun',$this->input->post('tahun'))
			->get('penggunaan');
			if ($cek->num_rows()>0) {
				return FALSE;
			} else{
				// Query insert database penggunaan
				$object = array(
					'id_pelanggan' => $this->input->post('id_pelanggan'),
					'bulan' => $this->input->post('bulan'),
					'tahun' => $this->input->post('tahun'),
					'meter_awal'=> $this->input->post('mAwal'),
					'meter_akhir' => $this->input->post('mAkhir'),
					'status' => 0);
				return $this->db->insert('penggunaan', $object);
			}
		}
		// Function Query getPenggunaanDetail untuk menampilkan data penggunaan sesuai dengan id pelanggan
		public function getPenggunaanDetail($id)
		{
			return $this->db
			->join('pelanggan','pelanggan.id_pelanggan=penggunaan.id_pelanggan')
			->join('tarif','tarif.id_tarif=pelanggan.id_tarif')
			->where('penggunaan.id_pelanggan',$id)
			->get('penggunaan');
		}
	
	}
	
	/* End of file M_Penggunaan.php */
	/* Location: ./application/models/M_Penggunaan.php */
 ?>