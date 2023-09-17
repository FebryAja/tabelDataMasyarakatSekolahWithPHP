<?php

include "../koneksi/koneksi.php";

$id_siswa=$_POST['id_siswa'];
$nik_siswa=$_POST['nik_siswa'];
$nama_siswa=$_POST['nama_siswa'];
$tempat_lahir_siswa=$_POST['tempat_lahir_siswa'];
$tanggal_lahir_siswa=$_POST['tanggal_lahir_siswa'];
$jenis_kelamin_siswa=$_POST['jenis_kelamin_siswa'];
$golongan_darah_siswa=$_POST['golongan_darah_siswa'];
$alamat_siswa=$_POST['alamat_siswa'];
$agama_siswa=$_POST['agama_siswa'];
$status_perkawinan=$_POST['status_perkawinan'];
$pekerjaan=$_POST['pekerjaan'];
$kewarganegaraan_siswa=$_POST['kewarganegaraan_siswa'];

$query = mysqli_query($koneksi, "UPDATE tb_siswa SET nik='$nik_siswa', nama='$nama_siswa', tempat_lahir='$tempat_lahir_siswa', tanggal_lahir='$tanggal_lahir_siswa', jenis_kelamin='$jenis_kelamin_siswa', golongan_darah='$golongan_darah_siswa', alamat='$alamat_siswa', agama='$agama_siswa', status_perkawinan='$status_perkawinan', pekerjaan='$pekerjaan', kewarganegaraan='$kewarganegaraan_siswa' WHERE id_siswa='$id_siswa'");

?>
<script language="JavaScript">
    alert('EDIT DATA SISWA BERHASIL');
    document.location='index.php';
</script>