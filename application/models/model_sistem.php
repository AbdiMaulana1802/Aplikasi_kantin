<?php

class Model_sistem extends CI_Model
{

	// untuk cek login multiuser
	public function cek_signin($where)
	{
		$admin      =    $this->db->get_where("admin", $where);
		$user       =    $this->db->get_where("user", $where);

		if ($admin->result() == null) {
			return $user;
		} else {
			return $admin;
		}
	}

	//untuk mengget data dari database
	public function get_data()
	{
		$data = $this->db->get('makanan');
		return $data->result();
	}
	//untuk mengcount data dari database
	public function count_data()
	{
		$data = $this->db->get('makanan');
		return $data->num_rows();
	}

	//user
	public function get_user()
	{
		$data = $this->db->get('makanan');
		return $data->result();
	}
	//untuk mengcount data dari database
	public function count_user()
	{
		$data = $this->db->get('makanan');
		return $data->num_rows();
	}

	//untuk insert/tambah  data

	public function tampil_data()
	{
		$nama_makanan = $this->input->post('nama');
		$harga_makanan = $this->input->post('harga');
		$status_makanan = $this->input->post('status');

		$foto = $_FILES['Foto'];
		if ($foto = '') {
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$this->load->library('upload');
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('Foto')) {
				echo "gagal upload";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}

			$data = array(

				'id_makanan'     => '',
				'nama_makanan'   => $nama_makanan,
				'harga_makanan'  => $harga_makanan,
				'foto'           => $foto,
				'status_makanan' => $status_makanan,



			);

			$this->db->insert('makanan', $data);
			header("location:" . base_url() . 'canteen/dataTampil');
		}
	}

	public function tambah()
	{

		$no_meja       = $this->input->post('no_meja');
		$tanggal_order = $this->input->post('tanggal');
		$keterangan    = $this->input->post('keterangan');
		$status_order  = $this->input->post('status_order');


		$data = array(

			'id_order'     => '',
			'no_meja'        => $no_meja,
			'tanggal_order'  => $tanggal_order,
			'keterangan'     => $keterangan,
			'status_order'    => $status_order,




		);

		$this->db->insert('order_user', $data);
		header("location:" . base_url() . 'canteen/keranjang');
	}





	// untuk menghapus data
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// untuk mengedit data admin ke database
	public function edit_dataAdmin($where, $table)
	{
		return $this->db->get_where($table, $where);
	}


	// untuk mengupdate data admin sehabis di edit
	public function update_admin()
	{
		$foto = $_FILES['FOTO'];
		if ($foto = '') {
			// kosong
		} else {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'jpg|png|gif|jpeg';

			$this->load->library('upload');
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('FOTO')) {
				echo "gagal upload";
				die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}
		$data = array(
			'nama_makanan'   => $this->input->post('nama'),
			'harga_makanan'  => $this->input->post('harga'),
			'status_makanan' => $this->input->post('status'),
			'foto'           => $foto,

		);

		$where = array('id_makanan' => $this->input->post('id'),);

		$this->db->update('makanan', $data, $where);
		header("Location:" . base_url() . 'canteen/dataTampil');
	}
}