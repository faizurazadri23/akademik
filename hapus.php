<?php				
			include 'koneksi.php'; //menghubungkan ke file koneksi untuk ke database
			$nim = $_GET['nim']; //menampung nim

			//query hapus
			$datas = mysqli_query($koneksi, "delete from mahasiswa where nim ='$nim'") or die(mysqli_error($koneksi));

			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='index.php?page=akademik';</script>";
	?>
