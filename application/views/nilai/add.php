<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data Nilai</title>
	<link rel="stylesheet" type="text/css" href=<?php echo base_url()."/css/kumang.css"; ?>>
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
		<table>
			
			<tr>
				<td>
					NIM Mahasiswa
				</td>
				<td>
					<select name="nim">
						<option value="">Pilih NIM</option>
						<?php 
						foreach ($nim as $n) {
							echo "<option value=". $n->NIM .">". $n->NIM ."</option>";
						}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					Kode Mata Kuliah
				</td>
				<td>
					<select name="kodemk" class="form-control">
						<option value="">Pilih MK</option>
						<?php 
						foreach ($kode_mk as $mk) {
							echo "<option value=". $mk->KodeMK .">". $mk->KodeMK ."</option>";
						}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td>
					Index
				</td>
				<td>
					<input type="text" name="nilai">
				</td>
			</tr>

			<tr>
				<td>
					<button type="submit" >Tambah</button>
				</td>
				<td>
					<a href="../../">Batal</a>
				</td>
			</tr>

		</table>
	</form>
</body>
</html>