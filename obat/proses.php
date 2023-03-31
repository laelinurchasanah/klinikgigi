<?php
require_once"../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
	$ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
	mysqli_query($con, "INSERT INTO tb_obat VALUES('$uuid', '$nama','$harga', '$ket')") or die(mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}
else if(isset($_POST['edit'])){
	$id = $_POST['id'];
	$nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
	$harga = trim(mysqli_real_escape_string($con, $_POST['harga']));
	$ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
	mysqli_query($con, "UPDATE tb_obat SET nama_obat = '$nama', harga='$harga', ket_obat = '$ket' WHERE id_obat = '$id'") or die(mysqli_error($con));
	echo "<script>window.location='data.php';</script>";
}