<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">

<head>
	<title>My Blog</title>

	<!-- <link rel="stylesheet" type="text/css" href=<?php echo base_url()."/css/kumang.css"; ?>> -->
	<style type="text/css">
	td {
		padding: 8px;
	}

	.menu {
		margin: 10px;
	}

	.right {
		text-align: right;
	}

	.table {
		width: 100%;
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

	<div class="menu">
		<h3>My Blog</h3>
		<p class="right"><a class="right" href="post/add" class="btn btn-default">Tambah Post</a></p>
	</div>

	<div class="menu-left">
		
	</div>

	<table class="table table-stripped" border="1">
		<tr>
			<th>
				Id Post
			</th>
			<th>
				TglPost
			</th>
			<th>
				Judul
			</th>
			<th>
				Isi Post
			</th>
			<th>
				Kategori
			</th>
			<th>
				user
			</th>
			<th>
				aksi
			</th>
		</tr>

		<?php 
		foreach($posts as $post)
		{
			echo "<tr>";
			echo "<td>". $post->IdPost ."</td>";
			echo "<td>". $post->TglPost ."</td>";
			echo "<td>". $post->Judul ."</td>";
			echo "<td>". $post->IsiPost ."</td>";
			echo "<td>". $post->NamaKategori ."</td>";
			echo "<td>". $post->NamaUser ."</td>";
			echo "<td>";
			echo "<form action='post/delete' method='POST'><input type='hidden' name='id_post' value='". $post->IdPost ."'/><button class='btn btn-danger' type='submit'>Hapus</button></form>";
			echo "</td>";
			echo "</tr>";
		}

		if (count($posts) == 0) {
			echo "<td>-</td>";
			echo "<td>-</td>";
			echo "<td>-</td>";
			echo "<td>-</td>";
			echo "<td>-</td>";
			echo "<td>-</td>";
			echo "<td>-</td>";
		}

		?>

	</table>
</body>


</html>