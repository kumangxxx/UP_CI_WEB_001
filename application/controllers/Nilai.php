<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$sql		= "SELECT Mahasiswa.NIM, Mahasiswa.NamaMhs, MataKuliah.KodeMK, MataKuliah.NamaMK, Nilai.Nilai, Nilai.id FROM Nilai LEFT JOIN Mahasiswa ON Nilai.NIM = Mahasiswa.NIM LEFT JOIN MataKuliah ON Nilai.KodeMK = MataKuliah.KodeMK";
		$query 		= $this->db->query($sql);
		$result 	= $query->result();

		$data 		= array(
			'nilais' 	=> $result
			);

		$this->load->view('nilai/list', $data);
	}

	public function add()
	{
		$sql 		= "SELECT MataKuliah.KodeMK FROM MataKuliah;";
		$query 		= $this->db->query($sql);
		$kode_mk 	= $query->result();

		$sql 		= "SELECT Mahasiswa.NIM FROM Mahasiswa;";
		$query 		= $this->db->query($sql);
		$nim 		= $query->result();

		$data 		= array(
			'kode_mk' 	=> $kode_mk,
			'nim' 		=> $nim
			);

		$this->load->view('nilai/add', $data);
	}

	public function submit()
	{
		$nim 		= $this->input->post('nim');
		$kode_mk 	= $this->input->post('kodemk');
		$nilai 		= $this->input->post('nilai');

		$sql 		= "INSERT INTO Nilai (NIM, KodeMK, Nilai) VALUES (?, ?, ?);";

		if (! $this->db->query($sql, array($nim, $kode_mk, $nilai)))
		{
			$error = $this->db->error();
			$message = $error['message'];
			redirect(base_url().'nilai/add?error='.$message);
		} else {
			redirect('/', 'refresh');
		}
	}

	public function delete()
	{
		$id_nilai 	= $this->input->post('id_nilai');

		$sql 		= "DELETE FROM Nilai WHERE id = ?";
		if (! $this->db->query($sql, array($id_nilai)))
		{
			$error = $this->db->error();
			$message = $error['message'];
			redirect('/?error='.$message, 'refresh');
		} else {
			redirect('/', 'refresh');
		}	
	}
}
