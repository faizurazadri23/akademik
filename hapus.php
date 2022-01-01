<?php				
	include 'Class_crud.php'; //menghubungkan ke file koneksi untuk ke database

	$crud = new Crud();

	if(isset($_GET['nim'])){
		$nim = $_GET['nim']; //menampung nim

		$result = $crud->deleteData($nim);

		if($result){
			//alert dan redirect ke index.php
			echo "<script>alert('data berhasil dihapus.');window.location='index.php?page=akademik';</script>";
		}else{
			echo "<script>alert('data gagal dihapus.');</script>";
		}
	}
?>
