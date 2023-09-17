<?php
include '../koneksi/koneksi.php';

$id_karyawan = $_POST['id_karyawan'];
$nik_karyawan = $_POST['nik_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$tempat_lahir_karyawan = $_POST['tempat_lahir_karyawan'];
$tanggal_lahir_karyawan = $_POST['tanggal_lahir_karyawan'];
$jenis_kelamin_karyawan = $_POST['jenis_kelamin_karyawan'];
$golongan_darah_karyawan = $_POST['golongan_darah_karyawan'];
$alamat_karyawan = $_POST['alamat_karyawan'];
$agama_karyawan = $_POST['agama_karyawan'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan_karyawan = $_POST['kewarganegaraan_karyawan'];

$result = mysqli_query($koneksi, "INSERT INTO tb_karyawan VALUES('$id_karyawan','$nik_karyawan','$nama_karyawan','$tempat_lahir_karyawan','$tanggal_lahir_karyawan','$jenis_kelamin_karyawan','$golongan_darah_karyawan','$alamat_karyawan','$agama_karyawan','$status_perkawinan','$pekerjaan','$kewarganegaraan_karyawan')");

?>

<script language="JavaScript">
	alert('INPUT DATA KARYAWAN BERHASIL!!!');
	document.location='index.php';
</script>