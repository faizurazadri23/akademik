<html> 
    <head> 
        <title>Akademik</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head> 

<body> 
<div class="container col-md-6 mt-4">
		<h1>Sistem Akademik</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Edit Data Mahasiswa
			</div>
			<div class="card-body">

                <?php
				    include('Class_crud.php');

                    $nim = $_GET['nim'];

					$crud = new Crud();

					//menampilkan barang berdasarkan id
					$row = $crud->get_by_id($nim);
                    
				?>

				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nomor Induk Mahasiswa</label>
						<input type="number" name="nim" required="" maxlength="10" class="form-control" value="<?= $row['nim']; ?>">
					</div>
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="fullname" class="form-control" value="<?= $row['nama_mhs']; ?>">
					</div>

                    <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="birthday" class="form-control" value="<?= $row['tgl_lahir']; ?>">
					</div>

                    <div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" value="<?= $row['email']; ?>">
					</div>

                    <div class="form-group">
                        <label for="sel1">Pilih Jenis Kelamin:</label>
                        <select class="form-control" id="sel1" name="gender">
                            <option value="L" <?=$row['jenis_kelamin'] == 'L' ? ' selected="selected"' : '';?>>Laki-Laki</option>
                            <option value="P" <?=$row['jenis_kelamin'] == 'P' ? ' selected="selected"' : '';?>>Perempuan</option>
                        </select>
                    </div> 

					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="address"><?= $row['alamat'] ?></textarea>
                </div>

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>

                    <a class="btn btn-default" href="list.php" role="button">Lihat data</a>
				</form>


                <?php
				    
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					

					$hasil = $crud->updateData($_POST['nim'],$_POST['fullname'], $_POST['birthday'], $_POST['email'], $_POST['gender'],  $_POST['address']);

					if($hasil){
						echo "<script>alert('data berhasil diubah.');window.location='index.php?page=akademik';</script>";
					}else{
						echo "<script>alert('data gagal diubah.');</script>";
					}
					
				}
				?>
				
			</div>
		</div>
    </div>
</body> 
</html>
