<?php
include_once('../_header.php');
?>

<div class="box">
	<h1>Pegawai</h1>
	<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
	<h4>
		<small>Edit Data Pegawai</small>
		<div class="pull-right">
			<a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
		</div>
	</h4>
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<?php
			$id = @$_GET['id'];
			$sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai WHERE id_pegawai='$id'") or die(mysqli_error($con));
			$data = mysqli_fetch_array($sql_pegawai);
			?>
			<form action="proses.php" method="post">
				<div class="form-group">
					<label for="nama">Nama Pegawai</label>
					<input type="hidden" name="id" value="<?= $data['id_pegawai'] ?>">
					<input type="text" name="nama" id="nama" value="<?= $data['nama_pegawai'] ?>" class="form-control" required="" autofocus="">
				</div>
				<div class="form-group">
					<label for="jabatan">Jabatan</label>
					<input type="text" name="jabatan" id="jabatan" value="<?= $data['jabatan'] ?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="alamat">Alamat</label>
					<textarea name="alamat" id="alamat" class="form-control" required=""><?= $data['alamat'] ?></textarea>
				</div>
				<div class="form-group">
					<label for="telp">No Telepon</label>
					<input type="number" name="telp" id="telp" value="<?= $data['no_telp'] ?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" id="email" value="<?= $data['email'] ?>" class="form-control" required="">
				</div>
				<div class="form-group">
					<input type="submit" name="edit" value="Simpan" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

<?php include_once('../_footer.php'); ?>
