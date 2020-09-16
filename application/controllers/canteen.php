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
		$this->load->view('templete_user/header');
		$this->load->view('templete_user/footer');
	}

	// data input
	public function data()
	{
		$this->load->view('content/data_input');
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
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



	//simpan data laporan
	public function simpan_datalaporan()
	{
		$this->model_sistem->tampil_data();
	}

	//untuk menghapus data
	public function hapus($id)
	{
		$where = array('id_makanan' => $id);
		$this->model_sistem->hapus_data($where, 'makanan');
		redirect('canteen/dataTampil');
	}




	//logout

	public function signout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}