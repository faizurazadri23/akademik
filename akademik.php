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
				Tambah Data Mahasiswa
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nomor Induk Mahasiswa</label>
						<input type="number" name="nim" required="" maxlength="10" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama Mahasiswa</label>
						<input type="text" name="fullname" class="form-control">
					</div>

                    <div class="form-group">
						<label>Tanggal Lahir</label>
						<input type="date" name="birthday" class="form-control">
					</div>

                    <div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control">
					</div>

                    <div class="form-group">
                        <label for="sel1">Pilih Jenis Kelamin:</label>
                        <select class="form-control" id="sel1" name="gender">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div> 

					<div class="form-group">
						<label>Alamat</label>
						<textarea class="form-control" name="address"></textarea>
					</div>

                    <!-- <div class="btn-toolbar">
                        <button type="button" id="btnSubmit" name="submit" class="btn btn-success">Simpan Data</button>
                        <button type="button" id="btnCancel" name="view" class="btn btn-default">Lihat Data</button>
                    </div> -->

					<button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>

                    <a class="btn btn-default" href="list.php" role="button">Lihat data</a>
				</form>

				<?php
				    include("koneksi.php");
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					//menampung data dari inputan
					$nim = $_POST['nim'];
					$fullname = $_POST['fullname'];
					$birthday = $_POST['birthday'];

                    $email = $_POST['email'];
					$gender = $_POST['gender'];
					$address = $_POST['address'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim,nama_mhs,tgl_lahir,email,jenis_kelamin,alamat) VALUES ('$nim', '$fullname', '$birthday', '$email', '$gender', '$address')") or die(mysqli_error($koneksi));

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='list.php';</script>";
				}
				?>
			</div>
		</div>
    </div>
</body> 
</html>
