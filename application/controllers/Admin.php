 <?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Admin extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			// Cek Session Login
			if ($this->session->userdata('login')!=1 || $this->session->userdata('level')!=1) {
				redirect('login','refresh');
			}
			// Load Model Admin
			$this->load->model('M_Admin','a');
		}
		public function index()
		{
			$data['admin'] = $this->a->getAllAdmin();
			$data['level'] = $this->a->getLevel()->result();

			$data['menu']= array('','','active','','','');

			// Menampilkan View Pelanggan
			$data['judul'] = "Admin";
			$data['halaman'] = 'v_admin';
			$this->load->view('v_template', $data);
		}

		// Function untuk query hapus admin berdasarkan id admin
		public function hapusAdmin($id)
		{
			if ($this->a->deleteAdmin($id)) {
				// Menampilkan pesan jika sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data Admin</div>');
				redirect('admin','refresh');
			} 
		}
		// Function untuk query add admin
		public function addAdmin()
		{
			if ($this->a->addAdmin()) {
				// Menampilkan pesan jika sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambahkan Data Admin</div>');
				redirect('admin','refresh');
			}else{
				// Menampilkan pesan jika gagal
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username telah digunakan</div>');
				redirect('admin','refresh');
			}
		}
		// Function untuk update admin berdasarkan id admin
		public function updateAdmin($id)
		{
			if ($this->a->updateAdmin($id)) {
				// Menampilkan pesan jika sukses
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Update Data Admin</div>');
				redirect('admin','refresh');
			}
		}
	
	}
	
	/* End of file Admin.php */
	/* Location: ./application/controllers/Admin.php */
 ?>