<?php

class c_penjualan extends CI_Controller
{
	public function __construct()
	{
		Parent::__construct();

		$this->load->model('model_sistem');
		$this->load->model('model_crud');
	}

	public function index()
	{
		$this->load->view('');
		$this->load->view('');
		$this->load->view('');
	}

	public function beli()
	{
		$data['user'] = $this->model_crud->get_user();
		$data['data_user'] = $this->model_crud->count_user();
		$this->load->view('content/data_keranjang');
		$this->load->view('templete_data/header');
		$this->load->view('templete_data/footer');
		// $this->load->model('model_sistem');
		// $this->load->model('model_crud');

		// $where['id_makanan'] = $id;
		// $makanan = $this->model_crud->tampil_id('makanan', $where)->row();

		// $field['id_makanan'] = $id;
		// $field['nama_makanan'];
		// $field['harga_makanan'];
		// $field['status_makanan'];
		// $this->model_sistem->tampil_data('makanan', $field);
		// redirect(base_url() . 'canteen/data_user');

	}
}