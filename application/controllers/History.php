 <?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class History extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			// Cek session jika sudah login atau level admin atau level manager
			if ($this->session->userdata('login')!=1 || ($this->session->userdata('level')!=1 && $this->session->userdata('level')!=2)) {
				redirect('login','refresh');
			}
			// Load model history
			$this->load->model('M_history','h');
		}
		public function index()
		{
			// Class untuk label
			$data['status'] = array('Belum Lunas','Pending','Lunas' );
			$data['label'] = array('danger','warning','success');

			// Array query history
			$data['history'] = $this->h->getHistoryAll();
			// Class Active sidebar
			$data['menu']= array('','','','','active','');

			// Menampilkan view history
			$data['halaman'] = 'v_history';
			$data['judul'] = 'History';
			$this->load->view('v_template', $data);
		}
		public function print()
			{
				// Class untuk label
				$data['status'] = array('Belum Lunas','Pending','Lunas' );
				$data['label'] = array('danger','warning','success');

				// Array query history
				$data['history'] = $this->h->getHistoryAll();
				$data['judul'] = 'Print Laporan';
				$this->load->view('v_printHistory', $data);
			}	
	
	}
	
	/* End of file History.php */
	/* Location: ./application/controllers/History.php */
 ?>