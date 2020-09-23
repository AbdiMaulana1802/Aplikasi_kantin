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
		$data = $this->db->get('order_user');
		return $data->result();
	}
	//untuk mengcount data dari database
	public function count_user()
	{
		$data = $this->db->get('order_user');
		return $data->num_rows();
	}

	//untuk get data keranjang
	public function get_user1()
	{
		$data = $this->db->get('keranjang');
		return $data->result();
	}
	//untuk mengcount data keranjang dari database
	public function count_user1()
	{

		$data = $this->db->get('keranjang');
		return $data->num_rows();
	}


	//untuk get data transaksi
	public function get_transaksi()
	{
		$data = $this->db->get('transaksi_user');
		return $data->result();
	}
	//untuk mengcount data transaksi dari database
	public function count_transaksi()
	{

		$data = $this->db->get('transaksi_user');
		return $data->num_rows();
	}




	public function get_barang()
	{
		$sql = "SELECT `id_makanan`, `nama_makanan`, `harga_makanan`, `status_makanan`, `jumlah_beli`(harga_makanan * jumlah_beli) AS total_harga FROM `keranjang` ORDER BY id_makanan;";
		return $this->db->query($sql);
	}

	public function hitungJumlahAsset()
	{
		$query = $this->db->get('keranjang');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
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
			'id_user'        => '',
			'keterangan'     => $keterangan,
			'status_order'    => $status_order,




		);

		$this->db->insert('order_user', $data);
		header("location:" . base_url() . 'canteen/order');
	}

	public function tambah_keranjang()
	{
		$nama_makanan = $this->input->post('nama');
		$harga_makanan = $this->input->post('harga');
		$status_makanan = $this->input->post('status');
		$jumlah_beli = $this->input->post('jumlah');

		$data = array(
			'id_makanan'     => '',
			'nama_makanan'   => $nama_makanan,
			'harga_makanan'  => $harga_makanan,
			'status_makanan' => $status_makanan,
			'jumlah_beli'    => $jumlah_beli,




		);
		$this->db->insert('keranjang', $data);
		header("location:" . base_url() . 'canteen/keranjang1');
	}

	// insert data transaksi
	public function simpan_transaksi()
	{
		$id_user         = $this->input->post('id_user');
		$id_order        = $this->input->post('id_order');
		$tanggal         = $this->input->post('tanggal');
		$total_harga     = $this->input->post('total_harga');

		$data = array(

			'id_transaksi'  	 => '',
			'id_user'       	 => $id_user,
			'id_order'           => $id_order,
			'tanggal_transaksi'  => $tanggal,
			'total_harga'   	 => $total_harga,
		);

		$this->db->insert('transaksi_user', $data);
		header("location:" . base_url() . 'canteen/transaksi');
	}








	// untuk menghapus data
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// untuk menghapus data keranjang
	public function hapus_datakeranjang($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// untuk menghapus data order di admin
	public function hapus_dataOrder($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	// untuk menghapus data order di admin
	public function hapus_datatransaksi($where, $table)
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
