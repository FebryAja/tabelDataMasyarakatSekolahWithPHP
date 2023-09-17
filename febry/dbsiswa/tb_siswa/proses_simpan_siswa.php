<?php
include '../koneksi/koneksi.php';

$id_siswa = $_POST['id_siswa'];
$nik_siswa = $_POST['nik_siswa'];
$nama_siswa = $_POST['nama_siswa'];
$tempat_lahir_siswa = $_POST['tempat_lahir_siswa'];
$tanggal_lahir_siswa = $_POST['tanggal_lahir_siswa'];
$jenis_kelamin_siswa = $_POST['jenis_kelamin_siswa'];
$golongan_darah_siswa = $_POST['golongan_darah_siswa'];
$alamat_siswa = $_POST['alamat_siswa'];
$agama_siswa = $_POST['agama_siswa'];
$status_perkawinan = $_POST['status_perkawinan'];
$pekerjaan = $_POST['pekerjaan'];
$kewarganegaraan_siswa = $_POST['kewarganegaraan_siswa'];

$result = mysqli_query($koneksi, "INSERT INTO tb_siswa VALUES('$id_siswa','$nik_siswa','$nama_siswa','$tempat_lahir_siswa','$tanggal_lahir_siswa','$jenis_kelamin_siswa','$golongan_darah_siswa','$alamat_siswa','$agama_siswa','$status_perkawinan','$pekerjaan','$kewarganegaraan_siswa')");

?>

<script language="JavaScript">
	alert('INPUT DATA SISWA BERHASIL!!!');
	document.location='index.php';
</script>