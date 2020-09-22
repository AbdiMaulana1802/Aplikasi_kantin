<?php

class canteen extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();

		$this->load->model('model_sistem');
		$this->load->library('form_validation');
	}

	// tampilan awal/home
	public function index()
	{
		$this->load->view('content/home');
		$this->load->view('templete_home/heder');
		$this->load->view('templete_home/foter');
	}

	// tampilan login
	public function login()
	{
		$this->load->view('content/login');
		$this->load->view('templete_login/header');
		$this->load->view('templete_login/footer');
	}

	//tampilan user
	public function user()
	{
		$this->load->view('content/user');
		$this->load->view('templete_user/header');
		$this->load->view('templete_user/footer');
	}

	// tampilan admin
	public function admin()
	{
		$this->load->view('content/admin');
		$this->load->view('templete_admin/header');
		$this->load->view('templete_admin/footer');
	}

	// data input
	public function data()
	{
		$this->load->view('content/data_input');
		$this->load->view('templete_user/header');
		$this->load->view('templete_user/footer');
	}

	//untuk cek login
	public function check_login()
	{

		$email    =    $this->input->post('email');
		$password =    $this->input->post('password');
		$where = array(
			'Email' => $email,
			'password' => $password
		);

		$cek = $this->model_sistem->cek_signin($where)->num_rows();

		if ($cek > 0) {
			$role = $this->model_sistem->cek_signin($where)->row(0)->level;
			if ($role == 'admin' || $role == 'petugas') {
				$current_role = $this->model_sistem->cek_signin($where)->row(0)->level;
				$current_id   = $this->model_sistem->cek_signin($where)->row(0)->id_admin;

				$data_session = array(
					'id_petugas'  => $current_id,
					'email'       => $email,
					'role'        => $current_role,
					'status'      => 'signin'

				);

				$this->session->set_userdata($data_session);

				if ($this->session->userdata('status') == 'signin') {
					header("Location:" . base_url() . 'canteen/admin');
				} else {
					header("Location:" . base_url() . '');
				}
			} else {
				$current_id = $this->model_sistem->cek_signin($where)->row(0)->email;

				$data_session = array(
					'id' => $current_id,
					'email' => $email,
					'role' => 'user',
					'status' => 'signin'

				);

				$this->session->set_userdata($data_session);
				if ($this->session->userdata('status') == 'signin') {
					header("Location:" . base_url() . 'canteen/data_user');
				} else {
					header("Location:" . base_url());
				}
			}
		} else {
			echo 'login gagal';
		}
	}


	// data tampil admin
	public function dataTampil()
	{
		$data['admin'] = $this->model_sistem->get_data();
		$data['data_admin'] = $this->model_sistem->count_data();
		$this->load->view('content/data_input', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	//data tampil user
	public function data_user()
	{
		$data['admin'] = $this->model_sistem->get_data();
		$data['data_admin'] = $this->model_sistem->count_data();
		$this->load->view('content/user', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	//data tampil order
	public function order()
	{

		$data['user'] = $this->model_sistem->get_user();
		$data['data_user'] = $this->model_sistem->count_user();
		$this->load->view('content/data_order', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	//data tampil keranjang
	public function keranjang1()
	{

		$data['user1'] = $this->model_sistem->get_user1();
		$data['data_user1'] = $this->model_sistem->count_user1();
		$this->load->view('content/keranjang', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	//data tampil data order di admin

	public function dataOrder()
	{
		$data['user'] = $this->model_sistem->get_user();
		$data['data_user'] = $this->model_sistem->count_user();
		$this->load->view('content/data_orderAdmin', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	//data tampil transaksi
	public function transaksi()
	{
		$data['user'] = $this->model_sistem->get_user();
		$data['data_user'] = $this->model_sistem->count_user();
		$this->load->view('content/transaksi', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}






	//simpan data laporan
	public function simpan_datalaporan()
	{
		$this->model_sistem->tampil_data();
	}

	// data keranjang user
	public function simpan_data()
	{
		$this->model_sistem->tambah();
	}
	public function simpan_datakeranjang()
	{
		$this->model_sistem->tambah_keranjang();
	}



	//untuk menghapus data makanan
	public function hapus($id)
	{
		$where = array('id_makanan' => $id);
		$this->model_sistem->hapus_data($where, 'makanan');
		redirect('canteen/dataTampil');
	}

	//untuk menghapus data keranjang
	public function hapuskeranjang($id)
	{
		$where = array('id_makanan' => $id);
		$this->model_sistem->hapus_datakeranjang($where, 'keranjang');
		redirect('canteen/keranjang1');
	}

	//untuk menghapus data order diadmin
	public function hapusOrder($id)
	{
		$where = array('id_order' => $id);
		$this->model_sistem->hapus_dataOrder($where, 'order_user');
		redirect('canteen/dataOrder');
	}

	// untuk mengedit data admin

	public function edit_admin($id)
	{
		$where = array('id_makanan' => $id);
		$data['canteen'] = $this->model_sistem->edit_dataAdmin($where, 'makanan')->result();

		$data['admin'] = $this->model_sistem->get_data();
		$data['data_admin'] = $this->model_sistem->count_data();
		$this->load->view('content/edit_dataAdmin', $data);
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
	}

	public function update_dataAdmin()
	{
		$this->model_sistem->update_admin();
	}






	public function pdf()
	{

		ob_start();
		$data['admin']      = $this->model_sistem->get_data();
		$data['data_admin'] = $this->model_sistem->count_data();
		$this->load->view('content/laporan_pdf', $data);

		$html = ob_get_contents();
		ob_end_clean();

		require './assets/html2pdf/autoload.php';

		$pdf = new \Spipu\Html2Pdf\Html2Pdf('p', 'A4', 'en');
		$pdf->WriteHTML($html);

		$pdf->Output('Data_BarangAdmin' . date('d-m-y') . '.pdf', 'D');
	}

	public function excel()
	{
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Data Admin.xls"');
		header('Cache-Control: max-age=0');
		$data['admin']      = $this->model_sistem->get_data();
		$data['data_admin'] = $this->model_sistem->count_data();
		$this->load->view('content/laporan_pdf', $data);
	}



	//logout

	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}