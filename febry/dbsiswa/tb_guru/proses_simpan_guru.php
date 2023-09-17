<?php
include '../koneksi/koneksi.php';

$id_guru = $_POST['id_guru'];
$nik_guru = $_POST['nik_guru'];
$nama_guru = $_POST['nama_guru'];
$tempat_lahir_guru = $_POST['tempat_lahir_guru'];
$tanggal_lahir_guru = $_POST['tanggal_lahir_guru'];
$jenis_kelamin_guru = $_POST['jenis_kelamin_guru'];
$golongan_darah_guru = $_POST['golongan_darah_guru'];
$alamat_guru = $_POST['alamat_guru'];
$agama_guru = $_POST['agama_guru'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan_guru = $_POST['kewarganegaraan_guru'];

$result = mysqli_query($koneksi, "INSERT INTO tb_guru VALUES('$id_guru','$nik_guru','$nama_guru','$tempat_lahir_guru','$tanggal_lahir_guru','$jenis_kelamin_guru','$golongan_darah_guru','$alamat_guru','$agama_guru','$status_perkawinan','$pekerjaan','$kewarganegaraan_guru')");

?>

<script language="JavaScript">
	alert('INPUT DATA GURU BERHASIL!!!');
	document.location='index.php';
</script>