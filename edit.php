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
				    include('koneksi.php');

                    $nim = $_GET['nim']; 
                    
                    //menampilkan barang berdasarkan id
                    $data = mysqli_query($koneksi, "select * from mahasiswa where nim = '$nim'");
                    $row = mysqli_fetch_assoc($data);

				?>

				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nomor Induk Mahasiswa</label>
						<input type="number" name="nim" required="" maxlength="10" disabled class="form-control" value="<?= $row['nim']; ?>">
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
				    include("koneksi.php");
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nim = $row['nim'];
					$fullname = $_POST['fullname'];
					$birthday = $_POST['birthday'];

                    $email = $_POST['email'];
					$gender = $_POST['gender'];
					$address = $_POST['address'];

					mysqli_query($koneksi, "update mahasiswa set nama_mhs='$fullname', tgl_lahir='$birthday', email='$email', jenis_kelamin='$gender', alamat='$address' where nim ='$nim'") or die(mysqli_error($koneksi));

					//redirect ke halaman index.php
					echo "<script>alert('data berhasil diupdate.');window.location='list.php';</script>";
				}
				?>
				
			</div>
		</div>
    </div>
</body> 
</html>
