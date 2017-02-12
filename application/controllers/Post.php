<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

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
		// $sql		= "SELECT Mahasiswa.NIM, Mahasiswa.NamaMhs, MataKuliah.KodeMK, MataKuliah.NamaMK, Nilai.Nilai, Nilai.id FROM Nilai LEFT JOIN Mahasiswa ON Nilai.NIM = Mahasiswa.NIM LEFT JOIN MataKuliah ON Nilai.KodeMK = MataKuliah.KodeMK";
		// $query 		= $this->db->query($sql);
		// $result 	= $query->result();

		$sql 		= "SELECT Post1.IdPost, Post1.TglPost, Post1.Judul, Post1.IsiPost, Kategori.NamaKategori, User.NamaUser FROM Post1 LEFT JOIN Kategori ON Kategori.IdKategori = Post1.IdKategori LEFT JOIN User ON User.IdUser = Post1.IdUser";
		$query 		= $this->db->query($sql);
		$result 	= $query->result();

		$data 		= array(
			'posts' 	=> $result
			);

		$this->load->view('posts/list', $data);
	}

	public function add()
	{
		$sql 			= "SELECT Kategori.IdKategori FROM Kategori;";
		$query 			= $this->db->query($sql);
		$id_kategoris 	= $query->result();

		$sql 			= "SELECT User.IdUser FROM User;";
		$query 			= $this->db->query($sql);
		$id_users 		= $query->result();

		$data 			= array(
			'id_kategoris' 	=> $id_kategoris,
			'id_users' 		=> $id_users
			);

		$this->load->view('posts/add', $data);
	}

	public function submit()
	{

		$id_post 		= $this->input->post('id_post');
		$tgl_post 		= $this->input->post('tanggal');
		$id_kategori 	= $this->input->post('id_kategori');
		$id_user 		= $this->input->post('id_user');
		$judul 			= $this->input->post('judul');
		$isi_post 		= $this->input->post('isi_post');

		if ($id_kategori == NULL || $id_kategori == '' || $id_user == NULL || $id_user == '' || $id_post == '' || $id_post == NULL) {
			$message = 'Mohon isi semuanya';
			redirect('post/add?error='.$message);
			return;
		}

		$sql 			= "INSERT INTO Post1 (IdPost, TglPost, IdKategori, IdUser, Judul, IsiPost) VALUES (?, ?, ?, ?, ?, ?);";

		if (! $this->db->query($sql, array($id_post, $tgl_post, $id_kategori, $id_user, $judul, $isi_post)))
		{
			$error = $this->db->error();
			$message = $error['message'];
			redirect(base_url().'post/add?error='.$message);
		} else {
			redirect('/', 'refresh');
		}
	}

	public function delete()
	{
		$id_post 	= $this->input->post('id_post');

		$sql 		= "DELETE FROM Post1 WHERE IdPost = ?";
		if (! $this->db->query($sql, array($id_post)))
		{
			$error = $this->db->error();
			$message = $error['message'];
			redirect('/?error='.$message, 'refresh');
		} else {
			redirect('/', 'refresh');
		}	
	}
}
