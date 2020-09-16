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

	//untuk tampil data

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

	// untuk menghapus data
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
}