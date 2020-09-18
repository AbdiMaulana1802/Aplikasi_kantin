<?php

class Model_crud extends CI_Model
{
	public function tampil_id($table, $id)
	{
		return $this->db->get_where($table, $id);
	}

	public function tampil_order($field, $table, $order)
	{
		$this->db->order_by($field, $order);
		return $this->db->get($table);
	}


	public function tampil_keranjang()
	{
		$nama_makanan = $this->input->post('nama');
		$harga_makanan = $this->input->post('harga');
		$status_makanan = $this->input->post('status');



		$data = array(

			'id_makanan'     => '',
			'nama_makanan'   => $nama_makanan,
			'harga_makanan'  => $harga_makanan,
			'status_makanan' => $status_makanan,



		);

		$this->db->insert('makanan', $data);
		header("location:" . base_url() . 'c_penjualan/beli');
	}
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
}