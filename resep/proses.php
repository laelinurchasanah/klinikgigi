<?php
require_once"../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
	$alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
	$telp = trim(mysqli_real_escape_string($con, $_POST['telp']));
	$email = trim(mysqli_real_escape_string($con, $_POST['email']));
	mysqli_query($con, "INSERT INTO tb_dokter VALUES('$uuid', '$nama', '$spesialis', '$alamat', '$telp','$email')") or die(mysqli_error($con));
	echo "<script>alert('Data berhasil ditambahkan');window.location='data.php';</script>";
}
else if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$spesialis = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
	$alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
	$email = trim(mysqli_real_escape_string($con, $_POST['email']));

	mysqli_query($con, "UPDATE tb_dokter SET nama_dokter='$nama', spesialis='$spesialis', alamat='$alamat', no_telp='$telp', email='$email' WHERE id_dokter='$id'") or die(mysqli_error($con));
	echo "<script>alert('Data berhasil diubah');window.location='data.php';</script>";
}