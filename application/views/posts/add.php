<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Nilai</title>
	<!-- <link rel="stylesheet" type="text/css" href=<?php echo base_url()."/css/kumang.css"; ?>> -->
	<style type="text/css">
		
	td {
		padding: 10px;
	}

	</style>
</head>
<body>

	<?php 
	if (isset($_GET['error'])) {
		$error = $_GET['error'];
		echo "<div class='error'><h3>Error</h3>". $error ."</div>";
	}
	?>

	<h3>Tambah Data Nilai</h3>
	<form action="submit" method="POST" class="menu">
		<table border="1">
			
			<tr>
				<td>
					Id Post
				</td>
				<td>
					<input type="text" name="id_post">
				</td>
			</tr>
			<tr>
				<td>
					Tanggal
				</td>
				<td>
					<input type="text" name="tanggal">
				</td>
			</tr>
			<tr>
				<td>
					Id Kategori
				</td>
				<td>
					<select name="id_kategori">
						<option value="">Pilih Kategori</option>
						<?php 

						foreach ($id_kategoris as $id_kategori)
						{
							echo "<option value='".$id_kategori->IdKategori."'>".$id_kategori->IdKategori."</option>";
						}

						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Id User
				</td>
				<td>
					<select name="id_user">
						<option value="">Pilih User</option>
						<?php 

						foreach ($id_users as $id_user)
						{
							echo "<option value='".$id_user->IdUser."'>".$id_user->IdUser."</option>";
						}

						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					Judul
				</td>
				<td>
					<input type="textarea" name="judul">
				</td>
			</tr>
			<tr>
				<td>
					Isi Post
				</td>
				<td>
					<textarea name="isi_post"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					
				</td>
				<td>
					<button type="submit" class="btn btn-default">Tambah</button>
					<a class="btn btn-danger" href="../../">Batal</a>
				</td>
			</tr>

		</table>
	</form>
</body>
</html>