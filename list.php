<!DOCTYPE html>
<html>
<head> 
        <title>Akademik</title> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head> 
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<body>
	<div class="container col-md-6 mt-4">
		<h1>Data Mahasiswa</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				DATA Mahasiswa <a href="akademik.php" class="btn btn-sm btn-primary float-right">Tambah</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Induk Mahasiswa</th>
							<th>Nama</th>
							<th>Tanggal Lahir</th>
							<th>Email</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include('koneksi.php'); //memanggil file koneksi
							$data_mhs = mysqli_query($koneksi, "select * from mahasiswa") or die(mysqli_error($koneksi));
							//script untuk menampilkan data mahasiswa

							$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($data_mhs)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['nim']; //untuk menampilkan nim ?></td>
						<td><?= $row['nama_mhs']; ?></td>
						<td><?= $row['tgl_lahir']; ?></td>
                        <td><?= $row['email']; ?></td>
                                <?php
                                    $gender = "";
                                    if($row['jenis_kelamin']=="L"){
                                        $gender = "Laki-Laki";
                                    }else{
                                        $gender = "Perempuan";
                                    }
                                ?>
                        <td><?= $gender ?></td>
                        <td><?= $row['alamat']; ?></td>
						<td>
								<a href="edit.php?nim=<?= $row['nim']; ?>" class="btn btn-sm btn-warning">Edit</a>
								<a href="hapus.php?nim=<?= $row['nim']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
								
						</td>
					</tr>

						<?php $no++; } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>