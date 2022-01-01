
	<div class="col-sm">
		<h1>Data Mahasiswa</h1>
		<div class="card">
			<div class="card-header bg-success text-white ">
				DATA Mahasiswa <a href="index.php?page=addakademik" class="btn btn-sm btn-primary float-right">Tambah</a>
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

                    <a class="btn btn-default" href="index.php?page=akademik" role="button">Lihat data</a>
				</form>

				<?php
				    include("Class_crud.php");
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					$crud = new Crud();

					$hasil = $crud->createData($_POST['nim'],$_POST['fullname'], $_POST['birthday'], $_POST['email'], $_POST['gender'],  $_POST['address']);

					if($hasil){
						echo "<script>alert('data berhasil disimpan.');window.location='index.php?page=akademik';</script>";
					}else{
						echo "<script>alert('data gagal disimpan.');</script>";
					}
					
				}
				?>
			</div>

			
		</div>
	</div>
