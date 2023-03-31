<?php
require_once"../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

if(isset($_POST['add'])){
	$uuid = Uuid::uuid4()->toString();
	$pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
	$tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
	$keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
	$dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
	$tindakan = trim(mysqli_real_escape_string($con, $_POST['tindakan']));
	

	// insert ke tb_rekammedis
	mysqli_query($con, "INSERT INTO tb_rekammedis VALUES('$uuid', '$pasien', '$tgl', '$keluhan', '$dokter', '$tindakan',)") or die(mysqli_error($con));

	

	echo "<script>alert('Data berhasil ditambahkan'); window.location='data.php';</script>";
}
else if(isset($_POST['edit'])){

	$id = $_POST['id'];
	$pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
	$tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
	$keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
	$dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
	$tindakan = trim(mysqli_real_escape_string($con, $_POST['tindakan']));

	//update ke tabel rekammedis
	mysqli_query($con, "UPDATE tb_rekammedis SET  id_pasien = '$pasien',tgl_periksa = '$tgl', keluhan = '$keluhan', id_dokter = '$dokter' WHERE id_rm = '$id'") or die(mysqli_error($con));

	// Membaca file yang sudah diupload
	$obj = PHPExcel_IOFactory::load($target_file);
	$all_data = $obj->getActiveSheet()->toArray(null, true, true, true);


	
	echo "<script>alert('Data berhasil diubah'); window.location='data.php';</script>";
}